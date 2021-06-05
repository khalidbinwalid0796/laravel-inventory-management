<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Unit;
use App\Models\Category;
use PDF;
class StocksController extends Controller
{
	public function stockReport(){
		$stocks = Product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->get();
		return view('backend.pages.stocks.stock_report', compact('stocks'));
	}

	public function stockReportPdf(){
		$stocks = Product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->get();
		$pdf = PDF::loadView('backend.pages.stocks.stock_report_pdf', compact('stocks'));
		return $pdf->stream('invoice.pdf');
	}

	public function supplierProductWise(){
		$data['suppliers'] = Supplier::all();
		$data['categories'] = Category::all();
		return view('backend.pages.stocks.supplier_product_wise_report',$data);
	}

	public function supplierWisePdf(Request $request){
		$data['suppliers'] = Product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->where('supplier_id',$request->supplier_id)->get();
		$pdf = PDF::loadView('backend.pages.stocks.supplier_wise_report_pdf', $data);
		return $pdf->stream('invoice.pdf');
	}

	public function productWisePdf(Request $request){
		$data['product'] = Product::where('category_id',$request->category_id)->where('id',$request->product_id)->first();
		$pdf = PDF::loadView('backend.pages.stocks.product_wise_report_pdf', $data);
		return $pdf->stream('invoice.pdf');
	}	
}
