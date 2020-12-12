<?php

namespace App\Http\Controllers;

use App\Product;
use App\StationaryType;
use App\UserTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function getCartPage(){ //buat nampilin page Cart dan menampilkan detail produk-produk yang telah dimasukkan user kedalam Cart
        $userId = Auth::id();
        $cart = Session()->get($userId.'cart');
        $cartDetail = json_decode(json_encode($cart), FALSE);
        return view('cart',compact('cartDetail'));
    }

    public function deleteCart($id){ //buat delete produk dalam Cart user
        $userId = Auth::id();
        $cart = Session()->get($userId.'cart');
        unset($cart[$id]);
        Session()->put($userId.'cart',$cart);
 
        return redirect('/cart');
    }

    public function getUpdateCartPage($id){ //buat update produk yang ada dalam Cart user
        $userId = Auth::id();
        $cart = Session()->get($userId.'cart');
        $quantity = $cart[$id]["quantity"];
        $productDetail = Product::find($id);
        $typeId = $productDetail->typeId;
        $getStationaryType = StationaryType::find($typeId);
        
        return view('updateCart',compact('productDetail','quantity','getStationaryType'));
    }

    public function checkOut(){ //buat hapus produk yang ada dalam Cart dan memasukkannya kedalam database yang menandakan user telah melakukan transaksi(table : user_transactions)
        $userId = Auth::id();
        $cart = Session()->get($userId.'cart');
        foreach ($cart as $item) {
            $transaction = new UserTransaction();    
            $transaction->userId = $userId;
            $transaction->productId = $item["id"];
            $transaction->productQuantity = $item["quantity"];
            $transaction->transactionDate = date('Y-m-d H:i:s');
            $transaction->save();

            $product = Product::find($item["id"]);
            $product->stock = $product->stock - $item["quantity"];
            $product->update();

            Session()->forget($userId.'cart');
        }
        return redirect('/home')->with('status','Checkout Successfully');
    }
}
