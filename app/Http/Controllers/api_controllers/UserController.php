<?php

namespace App\Http\Controllers\api_controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\User;
use App\Models\UserModel;
use App\Repository\UserRepository;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Auth;
// use Laravel\Sanctum\HasApiTokens;

class UserController extends Controller
{
    private $user_repository;
    
    public function __construct()
    {
        $this->user_repository = new UserRepository();
    }

    public function index()
    {
        $user_dataset = $this->user_repository->fetch();
        return response()->json($user_dataset, 200);
    }


    function login(Request $request)
    {
        $user= User::where('email_address', $request->email_address)->first();
         if (!$user|| !Hash::check($request->password, $user->password)) {
                return response([
                    'message' => ['These credentials do not match our records.']
                ], 404);
            }
        
             $token = $user->createToken('my-app-token')->plainTextToken;
             $response = [
                'user' => $user,
                'token' => $token
            ];
        
             return response($response, 201);
    }

    function register(Request $request)
    {
        $user = new User;
        $data = $request->validate([
           'first_name' => 'required|string',
           'last_name' => 'required|string',
           'email_address' => 'required|email|unique:users,email_address',
           'password' => 'required',
        ]);
        $result = $user->add($request);
        if($result)
        {
            return ["Result"=>"Data saved"];
        }
        else
        {
            return ["Result"=>"Error.."];
        }
    }

    function logout(Request $request)
    {
        $user = new User;
        $result = $user->logout($request);
        return response(["Result"=>"Logged out successfully"]); 
    }

    public function fetch($type = 'all', $per_page = 10, $id = null)
    {
        // return "HIEEE";
        $model = new User();
        $userDataset = $model->fetch_all($per_page);
        return view('admin_views.user.fetch', ['userDataset' => $userDataset]);
        
    }
}
