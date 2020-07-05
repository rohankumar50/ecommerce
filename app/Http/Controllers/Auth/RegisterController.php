<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class RegisterController extends Controller
{
    //
    function index(Request $request){
        $request->validate([
            'email'=>'bail|required|unique:users,email|email',
            'password'=>'required|min:8',
            'confirm_password'=>'required|same:password',
        ]);
        $user=new User;
        $user->email=request('email');
        $user->password=Crypt::encrypt($request->password);
        $user->save();
        return redirect('http://localhost/myecommerce/public/');
    }
}
