@extends('layouts.admin_layout',[
    'title'=>"Vault Transactions",
    'heading'=>$form_type.' Vault Transactions',
    'breadcrumb1'=>"Vault Transactions",
    'breadcrumb2'=>$form_type,
    'nav_status'=>'vault transactions',
    'sub_nav_status'=>'vault transactions-form'
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


    <form action="{{ url('vault_transaction/create') }}" method="post">
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
                <label for="weight">Weight</label>
                <input type="text" name="weight" class="form-control" placeholder="Weight"
                    value="{{ old('weight') }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="gold_melting_type">Gold Melting Type</label>
                <input type="text" name="gold_melting_type" class="form-control" placeholder="Gold Melting Type"
                    value="{{ old('gold_melting_type') }}">
            </div>
            <div class="col-md-6">
                <label for="gold_rate">Gold Rate</label>
                <input type="text" name="gold_rate" class="form-control" placeholder="Gold Rate"
                    value="{{ old('gold_rate') }}">
            </div>
            <div class="col-md-6">
                <label for="purchase_date">Purchase Date</label>
                <input type="date" name="purchase_date" class="form-control" placeholder="Purchase Date"
                    value="{{ old('purchase_date') }}">
            </div>
        </div>
       
       
        <br>
        <input type="submit" class="btn btn-primary">
    </form>
@endsection
