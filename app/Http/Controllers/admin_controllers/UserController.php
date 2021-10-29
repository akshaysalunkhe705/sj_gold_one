<?php

namespace App\Http\Controllers\admin_controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repository\UserRepository;

class UserController extends Controller
{
    private $user_repo;
    private $filter;
    public function __construct()
    {
        $this->filter();
        $this->user_repo = new UserRepository();
    }
    //-------------------------------------------LIST
    public function index($per_page = 10)
    {
        $user_dataset = $this->user_repo->fetch(pagination:$per_page, filter: $this->filter);
        return view('user.index', ['form_type' => 'List', 'user_dataset' => $user_dataset]);
    }
    //-------------------------------------------DETAILS
    public function detail()
    {
        $vault_transaction_dataset = $this->vault_transaction_repo->fetch(filter: $this->filter);
        
        return view('vault_transaction.detail', ['form_type' => 'Details', 'vault_transaction_dataset' => $vault_transaction_dataset]);
    }
    //-------------------------------------------CREATE
    public function create(Request $request)
    {
        if ($request->isMethod('POST')) {
            $data = $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email_address' => 'required',
                'password' => 'required',
                'primary_phone_number' => 'required',
                'secondary_phone_number' => 'required',
                'state' => 'required',
                'city' => 'required',
                'area' => 'required',
                'address' => 'required',
                'pincode' => 'required',
               // 'gold_in_vault' => 'required',
                // 'prime_user' => 'required',
                // 'blacklist' => 'required',
                // 'ip_address' => 'required',
            ]);
            //Insert in DB
            $this->user_repo->add($request);
            
            return redirect()->back()->with('alert', 'Data Inserted Successfuly!');
        }
        return view('user.form', ['form_type' => 'add']);
    }
    //-------------------------------------------EDIT
    public function edit(Request $request)
    {
    }
    //-------------------------------------------DELETE
    public function delete(Request $request)
    {
        $this->vault_transaction_repo->remove($request->id);
        return redirect()->back()->with('alert', 'Chapter Deleted Successfully!');
    }


    
    //-------------------------------------------PRIVATE FUNCTIONS
    private function filter()
    {
        $this->filter = [
            'id' => request()->id,
            'first_name' => request()->first_name,
            'last_name' => request()->last_name,
            'email_address' => request()->email_address,
            'password' => request()->password,
            'primary_phone_number' => request()->primary_phone_number,
            'secondary_phone_number' => request()->secondary_phone_number,
            'state' => request()->state,
            'city' => request()->city,
            'area' => request()->area,
            'address' => request()->address,
            'pincode' => request()->pincode,
            'gold_in_vault' => request()->gold_in_vault,
            'prime_user' => request()->prime_user,
            'blacklist' => request()->blacklist,
            'ip_address' => request()->ip_address,
        ];
    }
}
