<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShippingArea;
use Carbon\Carbon;

class ShippingAreaController extends Controller
{

	public function DivisionView(){
		$divisions = ShippingArea::orderBy('id','DESC')->get();
		return view('backend.ship.division.view_division',compact('divisions'));

	}


public function DivisionStore(Request $request){

    	$request->validate([
    		'division_name' => 'required',   	 

    	]);


		ShippingArea::insert([

		'division_name' => $request->division_name,
		'created_at' => Carbon::now(),

    	]);

	    $notification = array(
			'message' => 'Division Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } // end method 

	public function DivisionEdit($id){

		$divisions = ShippingArea::findOrFail($id);
		   return view('backend.ship.division.edit_division',compact('divisions'));
		  }
	  
	  
	  
		  public function DivisionUpdate(Request $request,$id){
	  
			ShippingArea::findOrFail($id)->update([
	  
			  'division_name' => $request->division_name,
			  'created_at' => Carbon::now(),
	  
			  ]);
	  
			  $notification = array(
				  'message' => 'Division Updated Successfully',
				  'alert-type' => 'info'
			  );
	  
			  return redirect()->route('manage-division')->with($notification);
	  
	  
		  } // end mehtod 
	  
	  
		  public function DivisionDelete($id){
	  
			ShippingArea::findOrFail($id)->delete();
	  
			  $notification = array(
				  'message' => 'Division Deleted Successfully',
				  'alert-type' => 'info'
			  );
	  
			  return redirect()->back()->with($notification);
	  
		  } // end method 
	  










}
