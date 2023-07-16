<?php

namespace App\Http\Controllers\Front;

use Gloudemans\Shoppingcart\Cart;


class ShopComponent
{
    public function store($product_id,$product_name,$product_price){
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\model\product');
        session()->flash('success_message','added successfully');
        return redirect()->route('product.cart');
    }

}
