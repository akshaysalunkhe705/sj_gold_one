@extends('layouts.admin_layout',[
    'title'=>"Payment",
    'heading'=>$form_type.' Payment',
    'breadcrumb1'=>"Payment",
    'breadcrumb2'=>$form_type,
    'nav_status'=>'payment',
    'sub_nav_status'=>'payment-list'
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

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>sr</th>
                <th>user_id</th>
                <th>payment_gateway</th>
                <th>payment_status</th>
                <th>payment_mode</th>
                <th>transaction_type</th>
                <th>Action</th>
            </tr>
            <tr id="input-filter">
                <td></td>
                <td><input type="text" class="form-control" id="user_id" onchange="js:filter()" value="{{ isset($_GET['user_id']) ? $_GET['user_id'] : '' }}"></td>
                <td><input type="text" class="form-control" id="payment_gateway" onchange="js:filter()" value="{{ isset($_GET['payment_gateway']) ? $_GET['payment_gateway'] : '' }}"></td>
                <td><input type="text" class="form-control" id="payment_status" onchange="js:filter()" value="{{ isset($_GET['payment_status']) ? $_GET['payment_status'] : '' }}"></td>
                <td><input type="text" class="form-control" id="payment_mode" onchange="js:filter()" value="{{ isset($_GET['payment_mode']) ? $_GET['payment_mode'] : '' }}"></td>
                <td><input type="text" class="form-control" id="transaction_type" onchange="js:filter()" value="{{ isset($_GET['transaction_type']) ? $_GET['transaction_type'] : '' }}"></td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($payment_dataset as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->user_id }}</td>
                    <td>{{ $item->payment_gateway }}</td>
                    <td>{{ $item->payment_status }} </td>
                    <td>{{ $item->payment_mode }} </td>
                    <td>{{ $item->transaction_type }} </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $payment_dataset->links() }}

@endsection

@section('custom_script')
    <script>
        function filter(params) {
            var search_url = document.location.href.split('?')[0]+"?";
            for (let index = 1; index <= $("#input-filter td").length; index++) {
                if ((index != 1) && (index != $("#input-filter td").length)) {
                    search_url += $("#input-filter td:nth-child("+index+") input").attr('id')+"="+$("#input-filter td:nth-child("+index+") input").val()+"&";
                }
            }
            document.location = search_url;
        }
    </script>
@endsection