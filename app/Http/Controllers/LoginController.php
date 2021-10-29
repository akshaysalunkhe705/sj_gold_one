<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

//MODELS
use App\Models\UsersModel;
use App\Models\StudentModel;
use App\Models\TeacherModel;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect('/admin');
        }
        return view('admin/admin_signin');
    }

    //ADMIN LOGIN
    public function admin_signin(Request $request)
    {
       if ($request->isMethod('POST')) {
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if (Auth::guard('admin')->attempt(['email_address' => $request->email, 'password' => $request->password])) {
            return view('welcome');
        } else {
                return "Error";
            }
        }
        //return view('admin/admin_signin');
    }


    
    public function logout($user_type)
    {
       if ($user_type == "admin") {
            return Auth::logout();
        }
        // return redirect('user/');
    }
}
