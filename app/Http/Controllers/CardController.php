<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CardController extends Controller
{
    public function basket() {
        // session => verileri DB kaydetmeden cerezlerde tutar, ödeme dediğinde DB atacak
        $cardItem = session('cart',[]);
        $totalPrice=0;

        foreach ($cardItem as $card) {
            $totalPrice += $card['price']*$card['qty'];
        }

        return view('frontend.pages.basket',compact('cardItem','totalPrice'));
    }

    public function add(Request $request) {
        return $request->all();
    }

    public function remove() {

    }
}

