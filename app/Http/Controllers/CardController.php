<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
        $productID = $request->product_id;
        $productSize = $request->size;
        $productQty = $request->qty ?? 1;

        $urun = Product::find($productID);
        if(!$urun) {
            return back()->withError('Ürün Bulunamadı.');
        }
        $cardItem = session('cart',[]);

        if(array_key_exists($productID,$cardItem)) {
            $cardItem[$productID]['qty'] += $productQty;
        }
        else {
            $cardItem[$productID] = [
                'image'=>$urun->image,
                'name'=>$urun->name,
                'price'=>$urun->price,
                'qty'=>$productQty,
                'size'=>$productSize
            ];
        }

        session(['cart'=>$cardItem]);

        return back()->withSuccess('Ürün Sepete eklendi');
    }

    public function remove(Request $request) {
        // return $request->all();
        $productID = $request->product_id;
        $cardItem = session('cart',[]);

        if(array_key_exists($productID,$cardItem)) {
            unset($cardItem[$productID]); //kaldırır
        }
        session(['cart'=>$cardItem]);
        return back()->withSuccess('Başarıyla kaldırıldı');
    }
}

