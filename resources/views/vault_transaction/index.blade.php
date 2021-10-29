@extends('layouts.admin_layout',[
'title'=>"Gold Rate",
'heading'=>$form_type.' Gold Rate',
'breadcrumb1'=>"Gold Rate",
'breadcrumb2'=>"$form_type",
'nav_status'=>'user',
'sub_nav_status'=>'user-list'
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
                <th>weight</th>
                <th>gold_melting_type</th>
                <th>gold_rate</th>
                <th>purchase_date</th>
                <th>Action</th>
            </tr>
            <tr id="input-filter">
                <td></td>
                <td><input type="text" class="form-control" id="user_id" onchange="js:filter()" value="{{ isset($_GET['user_id']) ? $_GET['user_id'] : '' }}"></td>
                <td><input type="text" class="form-control" id="weight" onchange="js:filter()" value="{{ isset($_GET['weight']) ? $_GET['weight'] : '' }}"></td>
                <td><input type="text" class="form-control" id="gold_melting_type" onchange="js:filter()" value="{{ isset($_GET['gold_melting_type']) ? $_GET['gold_melting_type'] : '' }}"></td>
                <td><input type="text" class="form-control" id="gold_rate" onchange="js:filter()" value="{{ isset($_GET['gold_rate']) ? $_GET['gold_rate'] : '' }}"></td>
                <td><input type="text" class="form-control" id="purchase_date" onchange="js:filter()" value="{{ isset($_GET['purchase_date']) ? $_GET['purchase_date'] : '' }}"></td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($vault_transaction_dataset as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->user_id }}</td>
                    <td>{{ $item->weight }}</td>
                    <td>{{ $item->gold_melting_type }} </td>
                    <td>{{ $item->gold_rate }} </td>
                    <td>{{ $item->purchase_date }} </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $vault_transaction_dataset->links() }}
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