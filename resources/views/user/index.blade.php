@extends('layouts.admin_layout',[
'title'=>"User",
'heading'=>$form_type.' User',
'breadcrumb1'=>"User",
'breadcrumb2'=>"$form_type",
'nav_status'=>'user',
'sub_nav_status'=>'user-create'
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
<div style="overflow:auto">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>sr</th>
                <th>Action</th>
                <th>first_name</th>
                <th>last_name</th>
                <th>gold_in_vault</th>
                <th>email_address</th>
                <th>primary_phone_number</th>
                <th>secondary_phone_number</th>
                <th>city</th>
                <th>area</th>
                <th>address</th>
                <th>pincode</th>
                <th>prime_user</th>
                <th>blacklist</th>
            </tr>
            <tr id="input-filter">
                <td></td>
                <td><input type="text" class="form-control" id="first_name" onchange="js:filter()" value="{{ isset($_GET['first_name']) ? $_GET['first_name'] : '' }}"></td>
                <td><input type="text" class="form-control" id="last_name" onchange="js:filter()" value="{{ isset($_GET['last_name']) ? $_GET['last_name'] : '' }}"></td>
                <td><input type="text" class="form-control" id="gold_in_vault" onchange="js:filter()" value="{{ isset($_GET['gold_in_vault']) ? $_GET['gold_in_vault'] : '' }}"></td>
                <td><input type="text" class="form-control" id="email_address" onchange="js:filter()" value="{{ isset($_GET['email_address']) ? $_GET['email_address'] : '' }}"></td>
                <td><input type="text" class="form-control" id="primary_phone_number" onchange="js:filter()" value="{{ isset($_GET['primary_phone_number']) ? $_GET['primary_phone_number'] : '' }}"></td>
                <td><input type="text" class="form-control" id="secondary_phone_number" onchange="js:filter()" value="{{ isset($_GET['secondary_phone_number']) ? $_GET['secondary_phone_number'] : '' }}"></td>
                <td><input type="text" class="form-control" id="city" onchange="js:filter()" value="{{ isset($_GET['city']) ? $_GET['city'] : '' }}"></td>
                <td><input type="text" class="form-control" id="area" onchange="js:filter()" value="{{ isset($_GET['area']) ? $_GET['area'] : '' }}"></td>
                <td><input type="text" class="form-control" id="address" onchange="js:filter()" value="{{ isset($_GET['address']) ? $_GET['address'] : '' }}"></td>
                <td><input type="text" class="form-control" id="pincode" onchange="js:filter()" value="{{ isset($_GET['pincode']) ? $_GET['pincode'] : '' }}"></td>
                <td><input type="text" class="form-control" id="prime_user" onchange="js:filter()" value="{{ isset($_GET['prime_user']) ? $_GET['prime_user'] : '' }}"></td>
                <td><input type="text" class="form-control" id="blacklist" onchange="js:filter()" value="{{ isset($_GET['blacklist']) ? $_GET['blacklist'] : '' }}"></td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($user_dataset as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td></td>
                    <td>{{ $item->first_name }}</td>
                    <td>{{ $item->last_name }}</td>
                    <td>{{ $item->gold_in_vault }} </td>
                    <td>{{ $item->email_address }} </td>
                    <td>{{ $item->primary_phone_number }} </td>
                    <td>{{ $item->secondary_phone_number }} </td>
                    <td>{{ $item->city }} </td>
                    <td>{{ $item->area }} </td>
                    <td>{{ $item->address }} </td>
                    <td>{{ $item->pincode }} </td>
                    <td>{{ $item->prime_user }} </td>
                    <td>{{ $item->blacklist }} </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $user_dataset->links() }}
</div>
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