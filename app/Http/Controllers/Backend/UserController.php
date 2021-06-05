<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
  public function index(){
  	$users = User::all();
  	return view('backend.pages.users.index', compact('users'));
  }

	public function create(){
	  return view('backend.pages.users.create');
	}

	public function store(Request $request)
	{

    $this->validate($request, [
      'usertype'  => 'required',
      'name'  => 'required',
      'email'  => 'required',
      'password'  => 'required|min:6',      
    ],
    [
      'usertype.required'  => 'Please provide a usertype',
      'name.required'  => 'Please provide name',
      'email.required'  => 'Please provide a email',
      'password.required'  => 'Please provide minimum 6 character password',      
    ]);
    $user = new User();
    $user->usertype = $request->usertype;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->save();
    return redirect()->route('user.view')->with('success','Data inserted successfully');
	}

	public function edit($id)
	{
  	$user = User::find($id);
  	if (!is_null($user)) {
  	  return view('backend.pages.users.edit', compact('user'));
  	}else {
  	  return redirect()->route('user.view');
  	}
	}

  public function update(Request $request, $id)
  {
    $this->validate($request, [
      'usertype'  => 'required',
      'name'  => 'required',
      'email'  => 'required',   
    ],
    [
      'usertype.required'  => 'Please provide a usertype',
      'name.required'  => 'Please provide name',
      'email.required'  => 'Please provide a email',      
    ]);

  	$user = User::find($id);
  	$user->usertype = $request->usertype;
  	$user->name = $request->name;
  	$user->email = $request->email;
    $user->save();
    return redirect()->route('user.view')->with('success','Data updated successfully');
  }

  public function delete($id)
  {
    $user = User::find($id);
    if (!is_null($user)) {
      $user->delete();
    }
    return back();
  }		
}
