<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
 use Illuminate\Http\Request;
use Validator;
use App\Models\about;
//use App\Http\Resources\OrderResource;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = about::latest()->get();
        return response()->json([about::collection($data), 'about fetched.']);
    }


     public function store(Request $request){

     }
}
