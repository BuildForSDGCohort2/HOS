<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Spatie\Permission\Traits\assignRole;
Use Alert;

class ProfileController extends Controller
{
    public function showprofile(){
    	$user = User::findorfail(auth()->user()->id);
    	return view('UserProfile.profile',['userinfo'=> $user]);
    }


    public function add_user(){
    	$user = User::all();
      # dd($user);
    	return view('user.add_user',['users'=> $user]);
    }


    public function save_user(Request $request){

    	$this->validate($request,[
    		'fname' => 'required',
    		'email' => 'required|email',
    		'mobilenumber' => 'required|max:10|min:10',
    		'gender' => 'required',
    		'dateofbirth' => 'required',
    		'npassword' => 'required|confirmed|min:8',
    	]);


    	$data = [
    		'name' => $request->input('fname'),
    		'email' => $request->input('email'),
    		'phone' => $request->input('mobilenumber'),
    		'gender' => $request->input('gender'),
    		'dateofbirth' => $request->input('dateofbirth'),
    		'password' => Hash::make($request->input('npassword'))
       	];



       	$user = new User($data);
       	$user->save();



        if ($request->input('role') == 0) {
           $user->assignRole('ADMIN');
        }

        if ($request->input('role') == 1) {
           $user->assignRole('OPD UNIT');
        }

        if ($request->input('role') == 2) {
          # cod
          $user->assignRole('DOCTOR');
        }

        if ($request->input('role') == 3) {
          # cod
          $user->assignRole('PHARMACY');
        }

        if ($request->input('role') == 4) {
          # cod
          $user->assignRole('CASHIER');
        }

        if ($request->input('role') == 5) {
          # cod
          $user->assignRole('LABORATORY');
        }


       	//assign user to a rolw

       	//check if there is an image field
       	if ($request->has('uploadfle')) {
       		$user->profile_photo_path = $request->file('img')
       									->store('profileimage','public');
       		$user->save();
       	}


       	//send email to user after registeration

       	return Redirect()->back()->with('message','User Added Successfully!');


    }


    public function all_user(){
    	$user = User::all();
    	return view('user.all_users',['users'=> $user]);
    }



    public function view_user(Request $request){
    	$user = User::findorfail($request->post('cid'));

    	$result = [];
    	$result['email'] = $user->email;
    	$result['phone'] = $user->phone;
    	$result['image'] = $user->profile_photo_path;
    	$result['name'] = $user->name;


      echo'
            <div class="card card-widget widget-user">
              <div class="widget-user-header bg-info">
                <h3 class="widget-user-username">'.$user->name.'</h3>
                <h5 class="widget-user-desc "></h5>
              </div>
              <div class="widget-user-image">';
              if ($user->profile_photo_path) {
                echo'<img class="img-circle elevation-2" src="'.asset('storage').'/'.$user->profile_photo_path.'" alt="User Avatar" width="128" height="128">';
              }else{
                echo'<img class="img-circle elevation-2" src="../dist/img/user1-128x128.jpg" alt="User Avatar">';
              }

              echo'
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header text-dark">Gender</h5>
                      <span class="description-text text-dark text-lowercase">'.$user->gender.'</span>
                    </div>
                  </div>
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header text-dark">Phone</h5>
                      <span class="description-text text-dark text-lowercase">'.$user->phone.'</span>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header text-dark">Email</h5>
                      <span class="description-text text-dark text-lowercase">'.$user->email.'</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      ';


    }





}
