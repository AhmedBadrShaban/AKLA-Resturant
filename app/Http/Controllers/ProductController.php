<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Cart;
use App\Models\Meal;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Session;

class   ProductController extends Controller
{
    public function getIndex()
    {
        $products=Product::all();
        return view('shop.index',['product'=>$products]);
    }
    public function getAddToCart(Request $request,$id){
        $product=Meal::find($id);
        $oldCart=Session::has('cart') ? Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->add($product,$product->id);
        $request->session()->put('cart',$cart);
        dd($request->session()->get('cart'));
        return redirect()->route('Product.index');
    }
    public function getCart($id){

        if (Auth::check()){
            Cart::create([
                'user_id'=>Auth::id(),
                'meal_id'=>$id,
            ]);
            // Order::create([
            //     'user_id'=>Auth::id(),
            //     'meal_id'=>$id,
            //     'comment'=>'',
            //     'rate'=>0.00
            // ]);                
            $AA=Bank::where('userid',Auth::id())->first();
            $meal=Meal::where('id',$id)->get()->first();
            if($AA)
            {
                $AA->update([
                    'totalPrice'=>$meal->price+$AA->totalPrice,
                ]);

            }
            else
            {
                Bank::create([
                    'totalPrice'=>$meal->price,
                    'userid'=>Auth::id(),
                    'name'=>Auth::user()->name
                ]);
            }
            return redirect()->back()->with('status','added successfully');
        }else return redirect('login');
    }

    public function MyCart()
    {
        $count = Cart::get()->count();
        $carts = DB::table('carts')
            ->select('meal_id')
            ->where('user_id',Auth::id())
            ->distinct()
            ->get();
        return view('shopping-cart',['cards'=>$carts]);
    }


    public function product_del($id){
        $meals = Cart::where('user_id',Auth::id())->where('meal_id',$id)->get();

        foreach ($meals as $meal)
        {
            $pricetemp=Meal::where('id',$id)->get()->first();
            $temp=Bank::where('userid',Auth::id())->get()->first();
            $temp->update([
            'totalPrice'=>$temp->totalPrice - $pricetemp->price
            ]);
            $meal->delete();
        }
        return redirect()->back()->with('status','Removed successfully');
    }

}
