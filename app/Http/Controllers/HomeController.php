<?php

namespace App\Http\Controllers;

use App\Product;
use App\StationaryType;
use App\UserTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function getHomePage (){ //buat nampilin page Home beserta list semua produk dalam website
        $auth = Auth::check();
        $productList = Product::paginate(5);
        return view('home',compact('productList','auth'));
    }

    public function logout(){ //buat logout untuk user dan diredirect ke page Login
        Auth::logout();
        return redirect('/login');
    }

    public function getProductbySearch(Request $request){ //buat nampilin hasil searching sesuai keyword yang diinput user (keyword akan dicocokkan dengan nama product)
        $auth = Auth::check();
        $productList = Product::where('name','like',"%{$request->keyword}%")->paginate(5);
        return view('home',compact('productList','auth'));
    }

    public function getProductDetail($id){ //buat nampilin page Detail yang berisi detail suatu produk sesuai dengan produk yang diklik
        $auth = Auth::check();
        $productDetail = Product::find($id);
        $typeId = $productDetail->typeId;
        $getStationaryType = StationaryType::find($typeId);
        return view('viewProduct',compact('productDetail','auth','getStationaryType'));
    }

    public function goEditPage($id){ //buat nampilin page EditProduct 
        $auth = Auth::check();
        $productDetail = Product::find($id);
        return view('editProduct',compact('productDetail','auth'));
    }

    public function editProductDetail(Request $request, $id){ //berisi validasi inputan dan buat melakukan editProduct yang akan mengupdate semua data produk yang diklik sesuai inputan admin
        $this->validate($request,[
            'name' => 'required|unique:products|min:5',
            'description' => 'required|min:10',
            'price' => 'required|integer|min:5001',
            'stock' => 'required|integer|min:1'
        ]);
        
        $productDetail = Product::find($id);
        $productDetail->name = $request->name;
        $productDetail->description = $request->description;
        $productDetail->price = $request->price;
        $productDetail->stock = $request->stock;
        $productDetail->update();
        return redirect('/home')->with('status','Stationary Data Updated');
    }

    public function deleteProduct($id){ //buat menghapus product sesuai dengan product yang diklik
        $productDetail = Product::find($id);
        $productDetail->delete();

        return redirect('/home');
    }

    public function getAddProductPage(){ //buat nampilin page AddProduct dan list semua stationary_type
        $stationaryType = StationaryType::select('name')->get();
        return view('addProduct',compact('stationaryType'));
    }

    public function addProduct(Request $request){ //buat validasi inputan dan untuk menambahkan produk baru kedalam database sesuai inputan admin
        $auth = Auth::check();
        $this->validate($request,[
            'name' => 'required|unique:products|min:5',
            'description' => 'required|min:10',
            'stationary_type' => 'required',
            'price' => 'required|integer|min:5001',
            'stock' => 'required|integer|min:1',
            'image' => 'required|mimes:jpeg,jpg,png'
        ]);
        $image_path = $request->file('image')->store('Image','public');

        $typeId = StationaryType::select('id')->where('name',$request->stationary_type)->get();

        $newProduct = new Product();    
        $newProduct->name = $request->name;
        $newProduct->image = $image_path;
        $newProduct->typeId = $typeId[0]->id;
        $newProduct->stock = $request->stock;
        $newProduct->price = $request->price;
        $newProduct->description = $request->description;
        $newProduct->save();
        
        return redirect('/home')->with('status','Product Added Successfully');
    }

    public function getEditTypePage(){ //buat nampilin page EditStationaryType dan list semua stationary_type yang ada di database
        $stationaryType = StationaryType::select('id','name')->get();

        return view('editStationaryType',compact('stationaryType'));
    }
    
    public function deleteStationaryType($id){ //buat hapus stationary_type dari databse sesuai stationary_type yang diklik
        $stationaryType = StationaryType::find($id);
        $stationaryType->delete();
        return redirect('/home')->with('status','Stationary Type Deleted');
    }

    public function updateStationaryType(Request $request, $id){ //berisi validasi inputan dan buat update data stationary_type sesuai yang diinput admin
        $this->validate($request,[
            'name' => 'required'
        ]);

        $stationaryType = StationaryType::find($id);
        $stationaryType->name = $request->name;
        $stationaryType->update();
        return redirect('/home')->with('status','Stationary Type Updated');
    }

    public function getAddTypePage(){ //buat nampilin page AddStationaryType dan list semua stationary_type yang ada dalam database
        $stationaryType = StationaryType::select('name')->get();
        
        return view('addStationaryType',compact('stationaryType'));
    }

    public function addStationaryType(Request $request){ //buat validasi inputan dan memasukkan data stationary_type yang baru (dari inputan admin) kedalam database untuk membuat stationary_type yang baru
        $this->validate($request,[
            'name' => 'required|unique:stationary_types',
            'image' => 'required|mimes:jpeg,jpg,png'
        ]);

        $image_path = $request->file('image')->store('Image','public');

        $stationaryType = new StationaryType();    
        $stationaryType->name = $request->name;
        $stationaryType->image = $image_path;
        $stationaryType->save();

        return redirect('/home')->with('status','Stationary Type Added');
    }

    public function passItemtoCart(Request $request, $id){ //buat validasi inputan dan memasukkan produk kedalam page Cart sesuai inputan user menggunakan Session
        $this->validate($request,[
            'quantity' => 'required|integer|min:1'
        ]);
        $userId = Auth::id();

        $cartDetail = Session()->get($userId.'cart');

        $productDetail = Product::find($id);
        $quantity = $request->quantity;
        $total = $productDetail->price * $quantity;
        
        $cartDetail[$id] = [
            "id" => $id,
            "name" => $productDetail->name,
            "price" => $productDetail->price,
            "quantity" => $quantity,
            "total" => $total
        ];

        Session()->put($userId.'cart',$cartDetail);

        return redirect('/cart')->with('message','Item Successfully Added to Cart');
    }

    public function getHistory(){ //buat menampilkan page HistoryTransaction dari user dan menampilkan semua detail transaksi yang pernah dilakukan user tersebut
        $userId = Auth::id();
        $transactions = UserTransaction::all()->where('userId',$userId)->groupBy('transactionDate');
        $transactionDate = UserTransaction::select('transactionDate')->where('userId',$userId)->distinct()->get();
        $total = 0;
        foreach($transactions as $transaction){
            foreach ($transaction as $item) {
            $productId = $item->productId;
            $productDetail = Product::where('id',$productId)->get();

            $item->productName = $productDetail[0]->name;
            $item->productPrice = $productDetail[0]->price;
            $item->subtotal = $productDetail[0]->price * $item->productQuantity;;
            }
            $transaction->total = $transaction->sum('subtotal');
            $transaction->date = $item->transactionDate;
        }
        return view('history',compact('transactions','transactionDate'));
    }

}
