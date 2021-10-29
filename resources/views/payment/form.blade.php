@extends('layouts.admin_layout',[
    'title'=>"Payment",
    'heading'=>$form_type.' Payment',
    'breadcrumb1'=>"Payment",
    'breadcrumb2'=>$form_type,
    'nav_status'=>'payment',
    'sub_nav_status'=>'payment-form'
])
@section('main_container')
    @if (session('alert'))
        <div class="alert alert-success">
            {{ session('alert') }}
        </div>
    @endif

    @if (!empty($errors->all()))
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }} <br>
            @endforeach
        </div>
    @endif


    <form action="{{ url('payment/create') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <label for="user">User List</label>
                <select name="user_id" id="user_id" class="form-control"  value="">
                    <option value="7906d143-4931-4f1b-a6e6-c0cf7180e4b0">User1</option>
                    <option value="7906d143-4931-4f1b-a6e6-c0cf7180e4b1">User2</option>
                    <option value="7906d143-4931-4f1b-a6e6-c0cf7180e4b2">User3</option>
               </select>
           </div>
            <div class="col-md-6">
                <label for="payment_gateway">Payment Gateway</label>
                <input type="text" name="payment_gateway" class="form-control" placeholder="Payment Gateway"
                    value="{{ old('payment_gateway') }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="payment_status">Payment Status</label>
                <select name="payment_status" id="payment_status" class="form-control"  value="">
                    <option value="Initialized">Initialized</option>
                    <option value="Cancel">Cancel</option>
                    <option value="Pending">Pending</option>
                    <option value="Successful">Successful</option>
                    <option value="failed">Failed</option>
               </select>
            </div>
            <div class="col-md-6">
                <label for="payment_mode">Payment Mode</label>
                <select name="payment_mode" id="payment_mode" class="form-control"  value="">
                    <option value="Cash">Cash</option>
                    <option value="Gold">Gold</option>
               </select>
            </div>
            <div class="col-md-6">
                <label for="transaction_type">Transaction Type</label>
                <select name="transaction_type" id="transaction_type" class="form-control"  value="">
                    <option value="Credit">Credit</option>
                    <option value="Debit">Debit</option>
               </select>
            </div>
        </div>
       
       
        <br>
        <input type="submit" class="btn btn-primary">
    </form>
@endsection
