<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Unit;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Purchase;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Payment;
use App\Models\PaymentDetail;
use Auth;
use DB;
use PDF;
class InvoicesController extends Controller
{
	public function index(){
		$invoices = Invoice::orderBy('date', 'desc')->orderBy('id', 'desc')->where('status','1')
		->get();
		return view('backend.pages.invoices.index', compact('invoices'));
	}

	public function create(){
		$data['categories'] = Category::all();
		$invoices = Invoice::orderBy('id', 'desc')->first()->invoice_no;
		if($invoices == null){
			$firstReg = '0';
			$data['invoice_no'] = $firstReg+1; 
		}else{
			//$invoices = Invoice::orderBy('id', 'desc')->first()->invoice_no;
			$data['invoice_no'] = $invoices+1;
		}
		$data['customers'] = Customer::all();
		$data['date'] = date('Y-m-d');
	  	return view('backend.pages.invoices.create',$data);
	}
	public function store(Request $request)
	{
		if($request->category_id == null){
	    	return redirect()->back()->with('error','Sorry! You do not select any product');		
		}else{
			if($request->paid_ammount>$request->estimated_ammount){
				return redirect()->back()->with('error','Sorry! Paid amount is maximum than total amount');
			}else{
				$invoice = new Invoice();
				$invoice->invoice_no = $request->invoice_no;
			    $invoice->date = date('Y-m-d', strtotime($request->date));
			    $invoice->description = $request->description;
			    $invoice->status = '0';
			    $invoice->created_by = Auth::user()->id;
			    DB::transaction(function() use($request,$invoice){
			    	if($invoice->save()){
			    		$count_category = count($request->category_id);
			    		for($i=0;$i<$count_category;$i++){
			    			$invoice_detail = new InvoiceDetail();
							$invoice_detail->date = date('Y-m-d', strtotime($request->date));
						    $invoice_detail->invoice_id = $invoice->id;
						    $invoice_detail->category_id = $request->category_id[$i];
						    $invoice_detail->product_id = $request->product_id[$i];
						    $invoice_detail->selling_qty = $request->selling_qty[$i];
						    $invoice_detail->unit_price = $request->unit_price[$i];
						    $invoice_detail->selling_price = $request->selling_price[$i];
						    $invoice_detail->status = '0';
						    $invoice_detail->save();
			    		}
			    		if($request->customer_id == '0'){
			    			$customer = new Customer();
			    			$customer->name = $request->name;
			    			$customer->mobile_no = $request->mobile_no;
			    			$customer->address = $request->address;
			    			$customer->save();
			    			$customer_id = $customer->id;
			    		}else{
			    			$customer_id = $request->customer_id;
			    		}
			    		$payment = new Payment();
			    		$payment_detail = new PaymentDetail();
		    			$payment->invoice_id = $invoice->id;
		    			$payment->customer_id = $customer_id;
		    			$payment->paid_status = $request->paid_status;
		    			$payment->discount_amount = $request->discount_amount;		    			
		    			$payment->total_amount = $request->estimated_amount;
		    			if($request->paid_status=='full_paid'){
			    			$payment->paid_amount = $request->estimated_amount;
			    			$payment->due_amount = '0';
			    			$payment_detail->current_paid_amount = $request->estimated_amount;
		    			}elseif($request->paid_status=='full_due'){
			    			$payment->paid_amount = '0';
			    			$payment->due_amount = $request->estimated_amount;
			    			$payment_detail->current_paid_amount = '0';		    		
		    			}elseif($request->paid_status=='partial_paid'){
			    			$payment->paid_amount = $request->paid_amount;
			    			$payment->due_amount = $request->estimated_amount-$request->paid_amount;
			    			$payment_detail->current_paid_amount = $request->paid_amount;		
			    		}
			    		$payment->save();
			    		$payment_detail->invoice_id = $invoice->id;
			    		$payment_detail->date = date('Y-m-d', strtotime($request->date));
			    		$payment_detail->save();
			    	}
			    }); 
			}
		}
	    return redirect()->route('invoice.pending')->with('success','Data inserted successfully');
	}	

	public function delete($id)
	{
		$invoice = Invoice::find($id);
		if (!is_null($invoice)) {
		  $invoice->delete();
		}
		InvoiceDetail::where('invoice_id',$invoice->id)->delete();
		Payment::where('invoice_id',$invoice->id)->delete();
		PaymentDetail::where('invoice_id',$invoice->id)->delete();
		return redirect()->route('invoice.pending')->with('success','Data deleted successfully');
	}

	public function pending(){
		$invoices = Invoice::orderBy('date', 'desc')->orderBy('id', 'desc')->where('status','0')
		->get();
		return view('backend.pages.invoices.pending', compact('invoices'));
	}

	public function approve($id){
		// For showing Multiple rows 
		$invoice = Invoice::with(['invoice_details'])->find($id);
		return view('backend.pages.invoices.approve', compact('invoice'));
	}

	public function approveStore(Request $request,$id){
	/*
	Using sql query-----
		$invoice_details = DB::table('invoice_details')->where('invoice_id',$id)->get();
		    foreach ($invoice_details as $row) {
			$product = Product::where('id',$row->product_id)->first();
			if($product->quantity < $row->selling_qty){
				return redirect()->back()->with('success','Sorry! You approve maximum value');
			}

        }

		$invoice_details = DB::table('invoice_details')->where('invoice_id',$id)->get();
		    foreach ($invoice_details as $row) {

            DB::table('products')
            ->where('id',$row->product_id)
            ->update(['quantity' => DB::raw('quantity -'.$row->selling_qty)]);

            DB::table('invoice_details')
            ->where('product_id',$row->product_id)
            ->update(['status' => 1]);
        }
        DB::table('invoices')->where('id',$id)->update(['status'=>1,'approved_by'=>Auth::user()->id]);

	    return redirect()->route('invoice.pending')->with('success','Invoice successfully approved');
	*/

        $count_sqty = count($request->selling_qty);
            for($i=0;$i<$count_sqty;$i++){
			$invoice_details = InvoiceDetail::where('id',$request->selling_qty[$i])->first();
			$product = Product::where('id',$invoice_details->product_id)->first();
			if($product->quantity < $invoice_details->selling_qty){
				return redirect()->back()->with('success','Sorry! You approve maximum value');
			}
        }

		$invoice = Invoice::find($id);
		$invoice->approved_by = Auth::user()->id;
		$invoice->status = '1';
		DB::transaction(function() use($request,$invoice,$id){
        $count_sqty = count($request->selling_qty);
            for($i=0;$i<$count_sqty;$i++){
				$invoice_details = InvoiceDetail::where('id',$request->selling_qty[$i])->first();
				$invoice_details->status = '1';
				$invoice_details->save();
				$product = Product::where('id',$invoice_details->product_id)->first();
				$product->quantity = ((float)$product->quantity)-((float)$invoice_details->selling_qty);
				$product->save();
				}
			$invoice->save();
		});
	    return redirect()->route('invoice.pending')->with('success','Invoice successfully approved');		
	}

	public function printInvoiceList(){
		$invoices = Invoice::orderBy('date', 'desc')->orderBy('id', 'desc')->where('status','1')
		->get();
		return view('backend.pages.invoices.invoice_list', compact('invoices'));		
	}

	public function printInvoice($id){
		$invoice = Invoice::with(['invoice_details'])->find($id);
		
		//return view('backend.pages.orders.invoice', compact('order'));

		$pdf = PDF::loadView('backend.pages.invoices.invoice', compact('invoice'));
		return $pdf->stream('invoice.pdf');
		//return $pdf->download('invoice.pdf')		
	}

	public function dailyReport(){

		return view('backend.pages.invoices.daily_invoice_report');
	}

	public function dailyReportPdf(Request $request){
		$sdate = date('Y-m-d', strtotime($request->start_date));
		$edate = date('Y-m-d', strtotime($request->end_date));
		$data['invoices'] = Invoice::whereBetween('date',[$sdate,$edate])->where('status','1')->get();
		$data['start_date'] = date('Y-m-d', strtotime($request->start_date));
		$data['end_date'] = date('Y-m-d', strtotime($request->end_date));
		$pdf = PDF::loadView('backend.pages.invoices.daily_invoice_report_pdf', $data);
		return $pdf->stream('invoice.pdf');
	}
}