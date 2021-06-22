<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Unit;
use App\Models\Category;
use Auth;
class ProductsController extends Controller
{
	public function index(){
		$products = Product::orderBy('id', 'asc')->paginate(5);
		return view('backend.pages.products.index', compact('products'));
	}

	public function create(){
		$data['suppliers'] = Supplier::all();
		$data['units'] = Unit::all();
		$data['categories'] = Category::all();
	  return view('backend.pages.products.create',$data);
	}

	public function store(Request $request)
	{
	    $product = new Product();
	    $product->supplier_id = $request->supplier_id;
	    $product->unit_id = $request->unit_id;
	    $product->category_id = $request->category_id;
	    $product->name = $request->name;
	    $product->quantity = '0';
	    $product->created_by = Auth::user()->id;
	    $product->save();
	    return redirect()->route('product.view')->with('success','Data inserted successfully');
	}
	public function edit($id)
	{
		$data['product'] = Product::find($id);
		$data['suppliers'] = Supplier::all();
		$data['units'] = Unit::all();
		$data['categories'] = Category::all();
	  	if (!is_null($data['product'])) {
	  	  return view('backend.pages.products.edit', $data);
	  	}else {
	  	  return redirect()->route('product.view');
	  	}
	}

	public function update(Request $request, $id)
	{
		$product = Product::find($id);
	    $product->supplier_id = $request->supplier_id;
	    $product->unit_id = $request->unit_id;
	    $product->category_id = $request->category_id;
	    $product->name = $request->name;

	    $product->updated_by = Auth::user()->id;
		$product->save();
		return redirect()->route('product.view')->with('success','Data updated successfully');
	}

	public function delete($id)
	{
		$product = Product::find($id);
		if (!is_null($product)) {
		  $product->delete();
		}
		return back();
	}		
}
