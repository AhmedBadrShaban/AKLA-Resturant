<?php

namespace App\Http\Controllers;
use App\Models\contact_details;
class HomeController extends Controller
{
     public function index(){
      $contacts =contact_details::all();
       return view('frontend.home' , compact('contacts'));
   }
}
