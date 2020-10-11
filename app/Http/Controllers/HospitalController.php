<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HospitalController extends Controller
{
    public function newpatient(){
    	//get refid
    	$ref_id = DB::table('patients')->max('Ref');

    	if ($ref_id) {
			$max = substr($ref_id, 4);
	    	$number = $max + 1;
	    	$code = "REFF".$number;
		}else{
			$code = "REFF100";
		}

		//your record
		$patient = Patient::where('nurse_id',auth()->user()->id)->get();

    	return view('user.addpatient',['reffid'=>$code, 'patients'=> $patient]);
    }



    public function savepatient(Request $request){

    	$this->validate($request,[
    		'refnumber'=> 'required',
    		'patientid'=> 'required',
    		'fullname'=> 'required',
    		'mobilenumber'=> 'required|min:10|max:10',
    		'gender'=> 'required',
    		'tempearture'=> 'required',
    		'height'=> 'required',
    		'weight'=> 'required',
    		'bp'=> 'required',
    		'age'=> 'required',
    		'issue'=> 'required',
    		'room'=> 'required'
       	]);

       	$data = [
       		'Ref' => $request->input('refnumber'),
       		'cardid' => $request->input('patientid'),
       		'fullname' => $request->input('fullname'),
       		'contact' => $request->input('mobilenumber'),
       		'gender' => $request->input('gender'),
       		'temperature' => $request->input('tempearture'),
       		'height' => $request->input('height'),
       		'PWeight' => $request->input('weight'),
       		'Bp' => $request->input('bp'),
       		'Age' => $request->input('age'),
       		'room' => $request->input('room'),
       		'Reason' => $request->input('issue'),
       		'nursename' => auth()->user()->name,
       		'nurse_id' => auth()->user()->id
       	];


       	if ($request->has('hiddenid')) {

       		$pateient = Patient::findorfail($request->input('hiddenid'))->update($data);
       		 return Redirect()->route('new-patient')->with('message','Record Updated Successfully'); 
       	}else{
       		$pateient = new Patient($data);
    	    $pateient->save();

    	   return Redirect()->back()->with('message','Record Added Successfully'); 
       	}

    	
    	


    }



    public function editpatient($id){
    	$patient = Patient::findorfail($id);
    	return view('user.edit_patient',['patient'=> $patient]);
    }



    public function deletepatient($id){
    	$patient = Patient::findorfail($id)->delete();
    	return Redirect()->route('new-patient')->with('message','Record Deleted Successfully'); 
    }


    public function allpatient(){
    	$patient = Patient::latest()->get();
    	return view('user.allpatient',['patients'=> $patient]);
    }





/*
		Doctors here

*/

	public function searchpatient(){
		return view('user.search');
	}


	public function searchuser(Request $request){
		$ref = $request->input('refid');
		$patient = Patient::where('Ref',$ref)->first();
		if ($patient) {
			return Redirect()->route('getinfo',['ref'=>$patient->Ref]);
		}

		return Redirect()->back()->with('error','Reference ID Dont Exist');
	}


	public function getinfo($ref){

		$patient = Patient::where('Ref',$ref)->first();
		// dd($patient);
		return view('user.patient_info',['row'=> $patient]);
	}



	public function save_doctor(Request $request){

		$this->validate($request,[
			'drugs'=> 'required'
		]);

		$id = $request->input('hiddenid');

		$data = [
			'Prescibe'=> $request->input('drugs'),
			'DoctorsName' => auth()->user()->name,
			'doc_id' => auth()->user()->id
		];


		$patient = Patient::findorfail($id)->update($data);

		return Redirect()->back()->with('message','Details Updated Successfully!');
	}


	public function getinfoall($cardid){
		$patient = Patient::where('cardid',$cardid)->latest()->get();
		return view('user.previouspat_info',['allinfo'=> $patient]);

	}



	public function allpaientsdoc(){
		$patient = Patient::latest()->get();
    	return view('user.allpatentsdoc',['patients'=> $patient]);
	}








	/*

	Laboratory Script

	*/

	public function labsearch(){
		return view('user.labsearch');
	}

	public function labsearchuser(Request $request){
		$ref = $request->input('refid');
		$patient = Patient::where('Ref',$ref)->first();
		if ($patient) {
			return Redirect()->route('labgetinfo',['ref'=>$patient->Ref]);
		}

		return Redirect()->back()->with('error','Reference ID Dont Exist');
	}


	public function labgetinfo($ref){
		$patient = Patient::where('Ref',$ref)->first();
		return view('user.patlabinfo',['row'=> $patient]);
	}


	public function savebloodtest(Request $request){

		$this->validate($request,[
			'bloodgrp'=> 'required',
			'sickling'=> 'required',
			'hbdenote'=> 'required',
			'hivstatus'=> 'required',
			'hypertb'=> 'required'
		]);

		$data = [
			'bloodgrp' => $request->input('bloodgrp'),
			'sicking' => $request->input('sickling'),
			'hbgenotype' => $request->input('hbdenote'),
			'Hivst' => $request->input('hivstatus'),
			'hypertS' => $request->input('hypertb'),
			'Pharmacist' => auth()->user()->name,
			'phar_id' => auth()->user()->id,
		];

		$id = $request->input('hiddenid');

		$patient = Patient::findorfail($id);

		if ($patient) {
			$bloodcost = $patient->Btc;
			if ($bloodcost) {
				$patient->update($data);
				return Redirect()->back()->with('message','Blood Test Results Recorded Successfully!');
			}else{
				return Redirect()->back()->with('error','Patient Has Not Paid For the blood Test fees');
			}
			
		}
		
	}


	public function saveurinetest(Request $request){

		$this->validate($request,[
			'color'=> 'required',
			'appearance'=> 'required',
			'ph'=> 'required',
			'protein'=> 'required',
			'glucose'=> 'required',
			'clinitest'=> 'required',
			'ketones'=> 'required',
			'bilirub'=> 'required',
			'blood'=> 'required',
			'nitri'=> 'required',
			'wbc'=> 'required',
			'rbc'=> 'required'
		]);

		$data = [
			'Ucolor' => $request->input('color'),
			'Uappera' => $request->input('appearance'),
			'Ph' => $request->input('ph'),
			'Uprote' => $request->input('protein'),
			'Ugluc' => $request->input('glucose'),
			'UcliniT' => $request->input('clinitest'),
			'UKet' => $request->input('ketones'),
			'Ubili' => $request->input('bilirub'),
			'Ublod' => $request->input('blood'),
			'Unitri' => $request->input('nitri'),
			'Uwbc' => $request->input('wbc'),
			'Urbc' => $request->input('rbc'),
			'Pharmacist' => auth()->user()->name,
			'phar_id' => auth()->user()->id,
		];

		$id = $request->input('hiddenid');

		$patient = Patient::findorfail($id);
		
		if ($patient) {
			$bloodcost = $patient->Utc;
			if ($bloodcost) {
				$patient->update($data);
				return Redirect()->back()->with('message','Urine Test Results Recorded Successfully!');
			}else{
				return Redirect()->back()->with('error','Patient Has Not Paid For the Urine Test fees');
			}
			
		}

	}


	public function allpaientslab(){
		$patient = Patient::latest()->get();
    	return view('user.allpaientslab',['patients'=> $patient]);
	}



	/*

	Pharmacy Script


	*/




	public function pharsearch(){
		return view('user.pharsearch');
	}


	public function parsearchuser(Request $request){
		$ref = $request->input('refid');

		$patient = Patient::where('Ref',$ref)->first();
		if ($patient) {
			return Redirect()->route('phargetinfo',['ref'=>$patient->Ref]);
		}

		return Redirect()->back()->with('error','Reference ID Dont Exist');
	}


	public function phargetinfo($ref){
		$patient = Patient::where('Ref',$ref)->first();
		return view('user.patpharinfo',['row'=> $patient]);
	}


	public function allpaientsphar(){
		$patient = Patient::latest()->get();
    	return view('user.allpaientsphar',['patients'=> $patient]);
	}


	public function druggiven(Request $request){

		$data = [
			'phar_id' => auth()->user()->id,
			'Pharmacist' => auth()->user()->name
		];

		$id = $request->input('hiddenid');

		$patient = Patient::findorfail($id)->update($data);

		return Redirect()->back()
		->with('message','Details Updated Successfully!');
	}




	/*Cashier
	*/

	public function cashiersearch(){
		return view('user.cashiersearch');
	}

	public function cashsearchuser(Request $request){
		$ref = $request->input('refid');

		$patient = Patient::where('Ref',$ref)->first();
		if ($patient) {
			return Redirect()->route('cashgetinfo',['ref'=>$patient->Ref]);
		}

		return Redirect()->back()->with('error','Reference ID Dont Exist');
	}


	public function cashgetinfo($ref){
		$patient = Patient::where('Ref',$ref)->first();
		return view('user.cashgetinfo',['row'=> $patient]);
	}



	public function cashsave(Request $request){

		$total = $request->input('btc') + $request->input('utc') + $request->input('dtc');

		$data = [
			'Btc' => $request->input('btc'),
			'Utc' => $request->input('utc'),
			'Dc' => $request->input('dtc'),
			'Grndtotal' => $total,
			'Cashier' => auth()->user()->name,
			'cash_id' => auth()->user()->id
		];

		$id = $request->input('hiddenid');

		$patient = Patient::findorfail($id)->update($data);

		return Redirect()->back()
		->with('message','Payment Recorded Successfully!');
	}














}
