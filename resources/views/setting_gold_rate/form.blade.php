@extends('layouts.admin_layout',[
'title'=>"Gold Rate",
'heading'=>$form_type.' Gold Rate',
'breadcrumb1'=>"Gold Rate",
'breadcrumb2'=>"$form_type",
'nav_status'=>'setting',
'sub_nav_status'=>'gold-rate'
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


    <form action="{{ url('setting_gold_rate/create') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <label for="gold_melting_name">Gold Melting Name</label>
                <input type="text" name="gold_melting_name" class="form-control" placeholder="Gold Melting Name"
                    value="{{ old('gold_melting_name') }}">
            </div>
            <div class="col-md-6">
                <label for="gold_melting_buy_rate">Gold Melting Buy Rate</label>
                <input type="text" name="gold_melting_buy_rate" class="form-control" placeholder="Gold Melting Buy Rate"
                    value="{{ old('gold_melting_buy_rate') }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="gold_melting_sale_rate">Gold Melting Sale Rate</label>
                <input type="text" name="gold_melting_sale_rate" class="form-control" placeholder="Gold Melting Sale Rate"
                    value="{{ old('gold_melting_sale_rate') }}">
            </div>
        </div>
       
       
        <br>
        <input type="submit" class="btn btn-primary">
    </form>
@endsection
