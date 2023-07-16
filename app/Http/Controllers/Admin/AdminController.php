<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Admin;
use App\Models\contact_details;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
     public function index(){
         return view('admin.index');

     }
     public function edit_contacts_info()
     {
         $contacts =contact_details::all();
         return view('admin.edit_contacts_info' , compact('contacts'));
     }
     public function  edit_about()
     {
         $contacts =contact_details::all();
         return view('admin.edit_about' , compact('contacts'));
     }
     public function update($id){
        $contacts =contact_details::find($id);
        return view('admin.update_details' , compact('contacts'));
     }
     public function edit(Request $request , $id)
     {
        $contacts =contact_details::find($id);
        $contacts->email =$request->input('email');
        $contacts->address =$request->input('address');
        $contacts->phone_number =$request->input('phone');
        $contacts->facebook_url =$request->input('facebook');
        $contacts->insta_url =$request->input('instagram');
        $contacts->whatsapp_url =$request->input('whatsapp');
        $contacts->update();
        return redirect('admin/details')->with('status' , 'Data Updated Succssefully!'); 
     }
     public function update_about($id){
        $about =contact_details::find($id);
        return view('admin.update_about' , compact('about'));
     }
     public function about(Request $request , $id)
     {
        $about =contact_details::find($id);
        $about->about =$request->input('about');
        $about->update();
        return redirect('admin/about')->with('status' , 'About Updated Succssefully!'); 
     }
     public function allusers()
     {
         $users =User::all();
         return view('admin.allusers' , compact('users'));
     }
     public function suspend($id)
     {
        $users =User::find($id);
        $users->delete();
        return redirect('admin/alluser')->with('status' , "User Suspended Successfully.");
     }
     public function getOrders()
     {
         return view('admin.orders');
 
     }

}
