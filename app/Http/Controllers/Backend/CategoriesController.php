<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
class CategoriesController extends Controller
{
	public function index(){
		$categories = Category::all();
		return view('backend.pages.categories.index', compact('categories'));
	}

	public function create(){
	  return view('backend.pages.categories.create');
	}

	public function store(Request $request)
	{
	    $category = new Category();
	    $category->name = $request->name;
	    $category->created_by = Auth::user()->id;
	    $category->save();
	    return redirect()->route('category.view')->with('success','Data inserted successfully');
	}

	public function edit($id)
	{
	  	$category = Category::find($id);
	  	if (!is_null($category)) {
	  	  return view('backend.pages.categories.edit', compact('category'));
	  	}else {
	  	  return redirect()->route('category.view');
	  	}
	}

	public function update(Request $request, $id)
	{
		$category = Category::find($id);
	    $category->name = $request->name;
	    $category->updated_by = Auth::user()->id;
		$category->save();
		return redirect()->route('category.view')->with('success','Data updated successfully');
	}

	public function delete($id)
	{
		$category = Category::find($id);
		if (!is_null($category)) {
		  $category->delete();
		}
		return back();
	}	
}
