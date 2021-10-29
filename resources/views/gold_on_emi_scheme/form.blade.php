@extends('layouts.admin_layout',[
    'title'=>"Gold On Emi Scheme",
    'heading'=>$form_type.' Gold On Emi Scheme',
    'breadcrumb1'=>"Gold On Emi Scheme",
    'breadcrumb2'=>$form_type,
    'nav_status'=>'setting',
    'sub_nav_status'=>'gold-on-emi-scheme'
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


    <form action="{{ url('gold_on_emi_scheme/create') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <label for="scheme_name">Scheme Name</label>
                <input type="text" name="scheme_name" class="form-control" placeholder="Scheme Name"
                    value="{{ old('scheme_name') }}">
            </div>
            <div class="col-md-6">
                <label for="initial_amount_percent">Initial Amount Percent</label>
                <input type="text" name="initial_amount_percent" class="form-control" placeholder="Initial Amount Percent"
                    value="{{ old('initial_amount_percent') }}">
            </div>
            <div class="col-md-6">
                <label for="interest_rate">Interest Rate In Percent</label>
                <input type="text" name="interest_rate" class="form-control" placeholder="Interest Rate In Percent"
                    value="{{ old('interest_rate') }}">
            </div>
            <div class="col-md-6">
                <label for="period">Period</label>
                <select name="period" id="period" class="form-control">
                    <option value="Monthly">Monthly</option>
                    <option value="Bi-Weekly">Bi-Weekly</option>
                    <option value="Bi-Monthly">Bi-Monthly</option>
                    <option value="Quarterly">Quarterly</option>
                    <option value="Half-Yearly">Half-Yearly</option>
                    <option value="Daily">Daily</option>
                    <option value="Weekly">Weekly</option>
                    <option value="Yearly">Yearly</option>
                </select>
           </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="cycle">Cycle</label>
                <input type="text" name="cycle" class="form-control" placeholder="Cycle"
                    value="{{ old('cycle') }}">
            </div>
        </div>
       
       
        <br>
        <input type="submit" class="btn btn-primary">
    </form>
@endsection
