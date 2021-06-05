<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;
use Auth;
class UnitsController extends Controller
{
	public function index(){
		$units = Unit::all();
		return view('backend.pages.units.index', compact('units'));
	}

	public function create(){
	  return view('backend.pages.units.create');
	}

	public function store(Request $request)
	{
	    $unit = new Unit();
	    $unit->name = $request->name;
	    $unit->created_by = Auth::user()->id;
	    $unit->save();
	    return redirect()->route('unit.view')->with('success','Data inserted successfully');
	}

	public function edit($id)
	{
	  	$unit = Unit::find($id);
	  	if (!is_null($unit)) {
	  	  return view('backend.pages.units.edit', compact('unit'));
	  	}else {
	  	  return redirect()->route('unit.view');
	  	}
	}

	public function update(Request $request, $id)
	{
		$unit = Unit::find($id);
	    $unit->name = $request->name;
	    $unit->updated_by = Auth::user()->id;
		$unit->save();
		return redirect()->route('unit.view')->with('success','Data updated successfully');
	}

	public function delete($id)
	{
		$unit = Unit::find($id);
		if (!is_null($unit)) {
		  $unit->delete();
		}
		return back();
	}		
}
