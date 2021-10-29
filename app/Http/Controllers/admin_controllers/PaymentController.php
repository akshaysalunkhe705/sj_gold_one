<?php

namespace App\Http\Controllers\admin_controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repository\PaymentRepository;

class PaymentController extends Controller
{
    private $payment_repo;
    private $filter;
    public function __construct()
    {
        $this->filter();
        $this->payment_repo = new PaymentRepository();
    }
    //-------------------------------------------LIST
    public function index($per_page = 10)
    {
        $payment_dataset = $this->payment_repo->fetch(pagination:$per_page, filter: $this->filter);
        return view('payment.index', ['form_type' => 'List', 'payment_dataset' => $payment_dataset]);
    }
    //-------------------------------------------DETAILS
    public function detail()
    {
        $payment_dataset = $this->payment_repo->fetch(filter: $this->filter);
        
        return view('payment.detail', ['form_type' => 'Details', 'payment_dataset' => $payment_dataset]);
    }
    //-------------------------------------------CREATE
    public function create(Request $request)
    {
        if ($request->isMethod('POST')) {
            $data = $request->validate([
                'payment_gateway' => 'required'
            ]);
            //Insert in DB
            $this->payment_repo->add($request);
            
            return redirect()->back()->with('alert', 'Payment Details Inserted Successfuly!');
        }
        return view('payment.form', ['form_type' => 'add']);
    }
    //-------------------------------------------EDIT
    public function edit(Request $request)
    {
    }
    //-------------------------------------------DELETE
    public function delete(Request $request)
    {
        $this->payment_repo->remove($request->id);
        return redirect()->back()->with('alert', 'Payment Details Deleted Successfully!');
    }


    
    //-------------------------------------------PRIVATE FUNCTIONS
    private function filter()
    {
        $this->filter = [
            'id' => request()->id,
            'user_id' => request()->user_id,
            'payment_gateway' => request()->payment_gateway,
            'payment_status' => request()->payment_status,
            'payment_mode' => request()->payment_mode,
            'transaction_type' => request()->transaction_type,
        ];
    }
}
