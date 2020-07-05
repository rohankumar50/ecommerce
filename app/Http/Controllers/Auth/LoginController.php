<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class LoginController extends Controller
{
    //
    public function index(Request $request)
    {
        $email=User::where('email','=',$request->email)->get();
        if(count($email))
        {
            $data = User::where('email',$request->email)->get();
            if(Crypt::decrypt($data[0]->password)==$request->password)
            {
                $request->session()->put('user',$request->email);
                $request->session()->put('id',$data[0]->role_id);
                return redirect('admin');
            }
            else
            {
                $request->session()->flash('wrong','Wrong password');
                return redirect('login');
            }
        }else{
            $request->session()->flash('wrong','Wrong Credentials');
            return redirect('login');
        }
    }
}
