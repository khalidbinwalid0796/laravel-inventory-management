<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\PaymentDetail;
use Auth;
use PDF;
class CustomersController extends Controller
{
	public function index(){
		$customers = Customer::all();
		return view('backend.pages.customers.index', compact('customers'));
	}

	public function create(){
	  return view('backend.pages.customers.create');
	}

	public function store(Request $request)
	{
	    $customer = new Customer();
	    $customer->name = $request->name;
	    $customer->mobile_no = $request->mobile_no;
	    $customer->email = $request->email;
	    $customer->address = $request->address;
	    $customer->created_by = Auth::user()->id;
	    $customer->save();
	    return redirect()->route('customer.view')->with('success','Data inserted successfully');
	}

	public function edit($id)
	{
	  	$customer = Customer::find($id);
	  	if (!is_null($customer)) {
	  	  return view('backend.pages.customers.edit', compact('customer'));
	  	}else {
	  	  return redirect()->route('customer.view');
	  	}
	}

	public function update(Request $request, $id)
	{
		$customer = Customer::find($id);
	    $customer->name = $request->name;
	    $customer->mobile_no = $request->mobile_no;
	    $customer->email = $request->email;
	    $customer->address = $request->address;
	    $customer->updated_by = Auth::user()->id;
		$customer->save();
		return redirect()->route('customer.view')->with('success','Data updated successfully');
	}

	public function delete($id)
	{
		$customer = Customer::find($id);
		if (!is_null($customer)) {
		  $customer->delete();
		}
		return back();
	}

	public function Credit(){
		$crcustomer = Payment::whereIn('paid_status',['full_due','partial_paid'])->get();
		return view('backend.pages.customers.credit', compact('crcustomer'));
	}

	public function creditPdf(){
		$data['crcustomer'] = Payment::whereIn('paid_status',['full_due','partial_paid'])->get();
		$pdf = PDF::loadView('backend.pages.customers.credit_pdf', $data);
		return $pdf->stream('invoice.pdf');			
	}

	public function editInvoice($invoice_id){
		$payment = Payment::where('invoice_id',$invoice_id)->first();
		return view('backend.pages.customers.edit_invoice', compact('payment'));		
	}

	public function updateInvoice(Request $request,$invoice_id){
		if($request->new_paid_amount<$request->paid_amount){
			return redirect()->back()->with('error','sorry! you have paid maximum value');
		}else{
			$payment = Payment::where('invoice_id',$invoice_id)->first();
			$payment_details = new PaymentDetail();
			$payment->paid_status = $request->paid_status;
			if($request->paid_status=='full_paid'){
    			$payment->paid_amount = Payment::where('invoice_id',$invoice_id)->first()['paid_amount']+$request->new_paid_amount;
    			$payment->due_amount = '0';
    			$payment_details->current_paid_amount = $request->new_paid_amount;
			}elseif($request->paid_status=='partial_paid'){
    			$payment->paid_amount = Payment::where('invoice_id',$invoice_id)->first()['paid_amount']+$request->paid_amount;
    			$payment->due_amount = Payment::where('invoice_id',$invoice_id)->first()['due_amount']-$request->paid_amount;
    			$payment_details->current_paid_amount = $request->paid_amount;		
    		}
    		$payment->save();
    		$payment_details->invoice_id = $invoice_id;
    		$payment_details->date = date('Y-m-d', strtotime($request->date));
    		$payment_details->save();
    		return redirect()->route('customer.credit')->with('success','Invoice updated successfully');			
		}
	}

	public function invoiceDetailsPdf($invoice_id){
		$data['payment'] = Payment::where('invoice_id',$invoice_id)->first();
		$pdf = PDF::loadView('backend.pages.customers.invoice_detail_pdf', $data);
		return $pdf->stream('invoice.pdf');
	}

	public function paidCustomer(){
		$pdcustomer = Payment::where('paid_status','!=','full_due')->get();
		return view('backend.pages.customers.paid', compact('pdcustomer'));		
	}

	public function paidCustomerPdf(){
		$data['pdcustomer'] = Payment::where('paid_status','!=','full_due')->get();
		$pdf = PDF::loadView('backend.pages.customers.paid_pdf', $data);
		return $pdf->stream('invoice.pdf');		
	}

	public function customerWiseReport(){
		$customers = Customer::all();
		return view('backend.pages.customers.customer_wise_report', compact('customers'));
	}

	public function customerWiseCredit(Request $request){
		$data['allData'] = Payment::where('customer_id',$request->customer_id)
			->whereIn('paid_status',['full_due','partial_paid'])->get();
		$pdf = PDF::loadView('backend.pages.customers.customer_wise_credit_pdf', $data);
		return $pdf->stream('invoice.pdf');			
	}

	public function customerWisePaid(Request $request){
		$data['allData'] = Payment::where('customer_id',$request->customer_id)->where('paid_status','!=','full_due')->get();
		$pdf = PDF::loadView('backend.pages.customers.customer_wise_paid_pdf', $data);
		return $pdf->stream('invoice.pdf');				
	}		
}
