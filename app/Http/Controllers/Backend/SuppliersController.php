<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Auth;
class SuppliersController extends Controller
{
	public function index(){
		$suppliers = Supplier::all();
		return view('backend.pages.suppliers.index', compact('suppliers'));
	}

	public function create(){
	  return view('backend.pages.suppliers.create');
	}

	public function store(Request $request)
	{
	    $supplier = new Supplier();
	    $supplier->name = $request->name;
	    $supplier->mobile_no = $request->mobile_no;
	    $supplier->email = $request->email;
	    $supplier->address = $request->address;
	    $supplier->created_by = Auth::user()->id;
	    $supplier->save();
	    return redirect()->route('supplier.view')->with('success','Data inserted successfully');
	}

	public function edit($id)
	{
	  	$supplier = Supplier::find($id);
	  	if (!is_null($supplier)) {
	  	  return view('backend.pages.suppliers.edit', compact('supplier'));
	  	}else {
	  	  return redirect()->route('supplier.view');
	  	}
	}

	public function update(Request $request, $id)
	{
		$supplier = supplier::find($id);
	    $supplier->name = $request->name;
	    $supplier->mobile_no = $request->mobile_no;
	    $supplier->email = $request->email;
	    $supplier->address = $request->address;
	    $supplier->updated_by = Auth::user()->id;
		$supplier->save();
		return redirect()->route('supplier.view')->with('success','Data updated successfully');
	}

	public function delete($id)
	{
		$supplier = supplier::find($id);
		if (!is_null($supplier)) {
		  $supplier->delete();
		}
		return back();
	}		
}
