<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meal;

class APIController extends Controller
{
    //
    

    public function showMeal($id=null){
        
        return $id?Meal::where('id',$id)->firstOrFail():
       Meal::all();
    }

    public function store(Request $request){
        $meal =  new Meal();

        $meal->title       =  request('title');
        $meal->description =  request('description');
        $meal->price       =  request('price');
        $meal ->type       =  request('type');
         
        if($request -> hasFile('photo')){
           
            $fileNameWithExt = $request->file('photo')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('photo')->storeAs('uploads/', $fileNameToStore);
            $meal->photo = 'uploads/'.$fileNameToStore;
        }

        $result = $meal -> save();
        if($result){
            return ["Result"=>"success"];
        }
        else{
            return ["Result"=>"failed"];
        }
        
    }

    public function storeType(Request $request){

        $type              =  new Type();

        $type->type_name   =  request('type_name');
        
        $result = $type -> save();
        if($result){
            return ["Result"=>"success"];
        }
        else{
            return ["Result"=>"failed"];
        }
    }



    public function update(Request $request){
        
        $meal                = Meal::find($request->id);
        $meal -> title       = $request->title;
        $meal -> price       = $request->price;
        $meal -> description = $request->description;
        $meal -> type        = $request->type;

        if($request -> hasFile('photo')){
            $meal ->photo = request('photo')->store('uploads');
        }

        $result = $meal -> save();
        if($result){
            return ["Result"=>"success"];
        }
        else{
            return ["Result"=>"failed"];
        }
    }

    public function destroy($id)
    {
        $meal =Meal::find($id);
        $result =$meal->delete();
        if($result){
            return ["Result"=>"success"];
        }
        else{
            return ["Result"=>"failed"];
        }
    }

    public function destroyType($id)
    {
        $type   = Type::find($id);
        $result = $type->delete();
        if($result){
            return ["Result"=>"success"];
        }
        else{
            return ["Result"=>"failed"];
        }
    }
    
    public function getOrders($user_id)
    {
        return User::find($user_id)->orders;
    }


    public function feedback(Request $request,$id,User $user){
        $order = Order::where('id',$id)->firstOrFail();
        $attributes = request()->validate([
            'comment'=> ['string', 'required'],
            'rate' =>['numeric', 'required', 'max:5'],
        ]);
        $result = $order -> update($attributes);
        if($result){
            return ["Result"=>"success"];
        }
        else{
            return ["Result"=>"failed"];
        }
    }
}
