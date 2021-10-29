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

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>sr</th>
                <th>gold_melting_name</th>
                <th>gold_melting_buy_rate</th>
                <th>gold_melting_sale_rate</th>
                <th>Action</th>
            </tr>
            <tr id="input-filter">
                <td></td>
                <td><input type="text" class="form-control" id="gold_melting_name" onchange="js:filter()" value="{{ isset($_GET['gold_melting_name']) ? $_GET['gold_melting_name'] : '' }}"></td>
                <td><input type="text" class="form-control" id="gold_melting_buy_rate" onchange="js:filter()" value="{{ isset($_GET['gold_melting_buy_rate']) ? $_GET['gold_melting_buy_rate'] : '' }}"></td>
                <td><input type="text" class="form-control" id="gold_melting_sale_rate" onchange="js:filter()" value="{{ isset($_GET['gold_melting_sale_rate']) ? $_GET['gold_melting_sale_rate'] : '' }}"></td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($setting_gold_rate_dataset as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->gold_melting_name }}</td>
                    <td>{{ $item->gold_melting_buy_rate }}</td>
                    <td>{{ $item->gold_melting_sale_rate }} </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $setting_gold_rate_dataset->links() }}

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