<?php

namespace App\Repository;

//Interface
use App\Repository\BaseRepositoryInterface;

//Models
use App\Models\UserModel;

class UserRepository implements BaseRepositoryInterface
{
    private $filter;
    
    public function __construct()
    {
        $this->filter($this->filter);
    }

    public function fetch($pagination=0, $filter=[])
    {
        $filter = $this->filter($filter);
        $dataSet = UserModel::when($filter['id'], function ($query) use ($filter) {
            $query->where('id', $filter['id']);
        })
        ->when($filter['first_name'], function ($query) use ($filter) {
            $query->where('first_name ', $filter['first_name']);
        })
        ->when($filter['last_name'], function ($query) use ($filter) {
            $query->where('last_name', $filter['last_name']);
        })
        ->when($filter['email_address'], function ($query) use ($filter) {
            $query->where('email_address', $filter['email_address']);
        })
        ->when($filter['password'], function ($query) use ($filter) {
            $query->where('password', $filter['password']);
        })
        ->when($filter['primary_phone_number'], function ($query) use ($filter) {
            $query->where('primary_phone_number', $filter['primary_phone_number']);
        })
        ->when($filter['secondary_phone_number'], function ($query) use ($filter) {
            $query->where('secondary_phone_number', $filter['secondary_phone_number']);
        })
        ->when($filter['state'], function ($query) use ($filter) {
            $query->where('state', $filter['state']);
        })
        ->when($filter['city'], function ($query) use ($filter) {
            $query->where('city', $filter['city']);
        })
        ->when($filter['area'], function ($query) use ($filter) {
            $query->where('area', $filter['area']);
        })
        ->when($filter['address'], function ($query) use ($filter) {
            $query->where('address', $filter['address']);
        })
        ->when($filter['pincode'], function ($query) use ($filter) {
            $query->where('pincode', $filter['pincode']);
        })
        ->when($filter['gold_in_vault'], function ($query) use ($filter) {
            $query->where('gold_in_vault', $filter['gold_in_vault']);
        })
        ->when($filter['prime_user'], function ($query) use ($filter) {
            $query->where('prime_user', $filter['prime_user']);
        })
        ->when($filter['blacklist'], function ($query) use ($filter) {
            $query->where('blacklist', $filter['blacklist']);
        })
        ->orderBy('created_at', 'ASC');
        
        if ($dataSet->count()==1) {
            return $dataSet->first();
        }
        return $pagination != 0 ? $dataSet->paginate($pagination) : $dataSet->get();
    }
    //
    public function add($request)
    {
        return UserModel::create([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email_address' => $request->get('email_address'),
            'password' => $request->get('password'),
            'primary_phone_number' => $request->get('primary_phone_number'),
            'secondary_phone_number' => $request->get('secondary_phone_number'),
            'state' => $request->get('state'),
            'city' => $request->get('city'),
            'area' => $request->get('area'),
            'address' => $request->get('address'),
            'pincode' => $request->get('pincode'),
            'gold_in_vault' => 0,
            'prime_user' => 1,
            'blacklist' => 0,
            'ip_address' => $_SERVER['REMOTE_ADDR'],
        ]);
    }
    //
    public function remove($ids)
    {
        return UserModel::find($ids)->delete();
    }
    //
    public function edit($id, $updateValues, $request)
    {
        return UserModel::where('id', $id)->update($updateValues);
    }
    //

    
    //-------------------------------------------PRIVATE FUNCTIONS
    public function filter()
    {
        return $this->filter = [
            'id' => request()->id,
            'first_name' => request()->first_name,
            'last_name' => request()->last_name,
            'email_address' => request()->email_address,
            'password' => request()->password,
            'primary_phone_number' => request()->primary_phone_number,
            'secondary_phone_number' => request()->secondary_phone_number,
            'state' => request()->state,
            'city' => request()->city,
            'area' => request()->area,
            'address' => request()->address,
            'pincode' => request()->pincode,
            'gold_in_vault' => request()->gold_in_vault,
            'prime_user' => request()->prime_user,
            'blacklist' => request()->blacklist,
            'ip_address' => request()->ip_address,
        ];
    }
}
