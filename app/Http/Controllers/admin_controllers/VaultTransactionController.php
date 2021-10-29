<?php

namespace App\Http\Controllers\admin_controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repository\VaultTransactionRepository;

class VaultTransactionController extends Controller
{
    private $vault_transaction_repo;
    private $filter;
    public function __construct()
    {
        $this->filter();
        $this->vault_transaction_repo = new VaultTransactionRepository();
    }
    //-------------------------------------------LIST
    public function index($per_page = 10)
    {
        $vault_transaction_dataset = $this->vault_transaction_repo->fetch(pagination:$per_page, filter: $this->filter);
        return view('vault_transaction.index', ['form_type' => 'List', 'vault_transaction_dataset' => $vault_transaction_dataset]);
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
                'user_id' => 'required',
                'weight' => 'required',
                'gold_melting_type' => 'required',
                'gold_rate' => 'required',
                'purchase_date' => 'required',
            ]);
            //Insert in DB
            $this->vault_transaction_repo->add($request);
            
            return redirect()->back()->with('alert', 'Data Inserted Successfuly!');
        }
        return view('vault_transaction.form', ['form_type' => 'add']);
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
            'user_id' => request()->user_id,
            'weight' => request()->weight,
            'gold_melting_type' => request()->gold_melting_type,
            'gold_rate' => request()->gold_rate,
            'purchase_date' => request()->purchase_date,
        ];
    }
}
