<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function getRegisterPage(){ //buat menampilkan page Register
        return view('register');
    }

    public function addRegisterData(Request $request){ //buat validasi inputan dan menambahkan data user yang melakukan register kedalam database
        $this->validate($request,[
            'name' => 'required|min:5',
            'email' => 'required|email',
            'password' => 'required|alphaNum|confirmed|min:6'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->user_role = 'member';
        $user->save();

        return redirect('/login');
    }
}
