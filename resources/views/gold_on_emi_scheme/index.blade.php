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

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>sr</th>
                <th>scheme_name</th>
                <th>period</th>
                <th>cycle</th>
                <th>Action</th>
            </tr>
            <tr id="input-filter">
                <td></td>
                <td><input type="text" class="form-control" id="scheme_name" onchange="js:filter()" value="{{ isset($_GET['scheme_name']) ? $_GET['scheme_name'] : '' }}"></td>
                <td><input type="text" class="form-control" id="period" onchange="js:filter()" value="{{ isset($_GET['period']) ? $_GET['period'] : '' }}"></td>
                <td><input type="text" class="form-control" id="cycle" onchange="js:filter()" value="{{ isset($_GET['cycle']) ? $_GET['cycle'] : '' }}"></td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($setting_gold_on_emi_dataset as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->scheme_name }}</td>
                    <td>{{ $item->period }}</td>
                    <td>{{ $item->cycle }} </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $setting_gold_on_emi_dataset->links() }}

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