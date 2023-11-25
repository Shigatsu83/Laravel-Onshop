<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartList(){
        $cartItems = \Cart::getContent();
        return view('cart', compact('cartItems'));
    }

    public function addToCart(Request $request){
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);
        session()->flash('succes', 'added to cart!');
        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request){
        \Cart::update(
            $request->id,
            [
                'quantity' =>  [
                    'relative' => false,
                    'value => $request->quantity'
                ],
            ]
        );
    }

    public function removeCart(Request $request){
        \Cart::remove($request->id);
        session()->flash('succes', 'item removed!');

        return redirect()->route('cart.list');
    }

    public function clearAllCart(){
        \Cart::clear();
        session()->flash('success', 'All item cleared!');
        return redirect()->route('cart.list');
    }
}
