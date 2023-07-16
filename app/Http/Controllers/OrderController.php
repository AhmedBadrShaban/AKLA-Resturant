<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bank;
use App\Models\Order;
use App\Models\Delivery;
use App\Models\Meal;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Session;

class OrderController extends Controller
{
    public function details()
    {
        $Delivery = Delivery::where('id', '=', Auth::id())->first();
        if ($Delivery === null) {
            return view('add-order-info');
        }
        else
        {
            return view('edit-delivery-details' , compact('Delivery'));
            // view('checkout');
        }    
    }
    public function update($id){
        $Delivery = Delivery::where('id', '=',$id)->first();
        return view('update-delivery-details' , compact('Delivery'));
     }
     public function edit(Request $request , $id)
     {
        $Delivery = Delivery::where('id', '=',$id)->first();
        $Delivery->city =$request->input('city');
        $Delivery->district =$request->input('district');
        $Delivery->street =$request->input('street');
        $Delivery->building_number =$request->input('building_number');
        $Delivery->department_number =$request->input('department_number');
        $Delivery->phone_number =$request->input('phone_number');
        $Delivery->Popular_Mark =$request->input('Popular_Mark');
        $Delivery->update();
        return redirect('check-out')->with('status' , 'Data Updated Succssefully!'); 
     }

    public function checkout()
    {
    
            return view('checkout');
     }
    public function store(Request $request)
    {
        $order = new Delivery;
        $order->id = Auth::id();
        $order->city = $request->city;
        $order->district = $request->district;
        $order->street = $request->street;
        $order->building_number = $request->building_number;
        $order->department_number = $request->department_number;
        $order->phone_number = $request->phone_number;
        $order->Popular_Mark = $request->Popular_Mark;
        $order->delivery_time = $request->delivery_time;
        $order->save();
        return redirect('check-out')->with('status', 'Your Delivary Details Updated');
    }
    public function sendOrder($id){

        if (Auth::check()){
            $orders = Cart::where('user_id', $id)->get();
            
            foreach ($orders as $order) {
                Order::create([
                    'user_id'=>$id,
                    'meal_id'=>$order->meal_id,
                    'comment'=>'',
                    'rate'=>0.00
                ]);
             }
             $meals = Cart::where('user_id',$id)->get();
             foreach ($meals as $meal)
             {
                 $meal->delete();
             }         
             return redirect()->back()->with('status',' Order added successfully');
        }else return redirect('login');
    }
    public function orderDone($id){
             $orders = Order::where('user_id', $id)->where('status' , "active")->get();
            foreach ($orders as $order) {
                 $order->status = "done";
                 $order->update();
            }
            $carts = Bank::where('userid',$id)->get();
            foreach ($carts as $cart) {
                $cart->totalPrice =0.00;
                $cart->update();
           }

            return redirect()->back()->with('status','Order Marked Done!');
     }
     public function orderdelivery($id){
        $details = Delivery::where('id', $id)->get();
        return view('admin.order_details' , compact('details'));
     }

     
}