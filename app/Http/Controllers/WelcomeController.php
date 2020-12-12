<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function getWelcomePage(){  //buat nampilin page Welcome beserta 4 produk terlaris (kalo ada)
        $getBestSeller = DB::table('stationary_types')
        ->join('products','typeId','=','stationary_types.id')
        ->join('user_transactions','productId','=','products.id')
        ->select('stationary_types.name','stationary_types.id','stationary_types.image',DB::raw('SUM(user_transactions.productQuantity) as totalQuantity'))
        ->groupBy('stationary_types.name','stationary_types.id','stationary_types.image')
        ->orderby('totalQuantity','DESC')
        ->limit(4)
        ->get();

        return view('welcome',compact('getBestSeller'));
    }
    
    public function getMainProduct($stationary_type_id){ //buat nampilin stationary sesuai stationary_type yang diklik pada page Welcome
        $productList = Product::where('typeId',$stationary_type_id)->paginate(5);
        return view('mainProduct',compact('productList'));
    }

    public function getProductbySearch(Request $request){ //buat nampilin hasil searching sesuai keyword yang diinput user (keyword akan dicocokkan dengan nama product)
        $productList = Product::where('name','like',"%{$request->keyword}%")->paginate(5);
        return view('mainProduct',['productList' => $productList]);
    }

}
