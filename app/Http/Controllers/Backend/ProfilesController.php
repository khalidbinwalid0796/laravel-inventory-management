<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class ProfilesController extends Controller
{
    public function index(){
    	$id = Auth::user()->id;
    	$user = User::find($id);
    	return view('backend.pages.users.profiles.index', compact('user'));
    }

    public function edit()
	{
    	$id = Auth::user()->id;
    	$user = User::find($id);
		if (!is_null($user)) {
		  return view('backend.pages.users.profiles.edit', compact('user'));
		}else {
		  return redirect()->route('profile.view');
		}
	}
    public function update(Request $request)
    {

		$user = User::find(Auth::user()->id);
		$user->name = $request->name;
		$user->email = $request->email;
		$user->mobile = $request->mobile;
		$user->address = $request->address;
		$user->gender = $request->gender;
		if($request->file('image')){
			$file = $request->file('image');
			@unlink(public_path('upload/user_images/'.$user->image));
			$filename = date('YmdHi').$file->getClientOriginalName();
			$file->move(public_path('upload/user_images'),$filename);
			$user['image']=$filename;
		}		
	    $user->save();
	      return redirect()->route('profile.view')->with('success','Data updated successfully');
    }	
    public function passwordEdit(){
    	return view('backend.pages.users.password.edit');
    }  
	public function passwordUpdate(Request $request){
		if(Auth::attempt(['id'=>Auth::user()->id, 'password'=>$request->current_password])){
			$user = User::find(Auth::user()->id);
			$user->password = bcrypt($request->new_password);
			$user->save();
			return redirect()->route('profile.view')->with('success','Data updated successfully');
		}else{
			return redirect()->back()->with('success','Data not updated successfully');
		}
	}      
}
