<?php

namespace App\Repository;

//Interface
use App\Repository\BaseRepositoryInterface;

//Models
use App\Models\PaymentModel;


class PaymentRepository implements BaseRepositoryInterface
{
    private $filter;
    
    public function __construct()
    {
        $this->filter($this->filter);
    }

    public function fetch($pagination=0, $filter=[])
    {
        $filter = $this->filter($filter);
        $dataSet = PaymentModel::when($filter['id'], function ($query) use ($filter) {
            $query->where('id', $filter['id']);
        })
        ->when($filter['user_id'], function ($query) use ($filter) {
            $query->where('user_id ', $filter['user_id']);
        })
        ->when($filter['payment_gateway'], function ($query) use ($filter) {
            $query->where('payment_gateway', $filter['payment_gateway']);
        })
        ->when($filter['payment_status'], function ($query) use ($filter) {
            $query->where('payment_status', $filter['payment_status']);
        })
        ->when($filter['payment_mode'], function ($query) use ($filter) {
            $query->where('payment_mode', $filter['payment_mode']);
        })
        ->when($filter['transaction_type'], function ($query) use ($filter) {
            $query->where('transaction_type', $filter['transaction_type']);
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
        return PaymentModel::create([
            'user_id' => $request->get('user_id'),
            'payment_gateway' => $request->get('payment_gateway'),
            'payment_status' => $request->get('payment_status'),
            'payment_mode' => $request->get('payment_mode'),
            'transaction_type' => $request->get('transaction_type'),
        ]);
    }
    //
    public function remove($ids)
    {
        return PaymentModel::find($ids)->delete();
    }
    //
    public function edit($id, $updateValues, $request)
    {
        return PaymentModel::where('id', $id)->update($updateValues);
    }
    //

    
    //-------------------------------------------PRIVATE FUNCTIONS
    public function filter()
    {
        return $this->filter = [
            'id' => request()->id,
            'scheme_name' => request()->scheme_name,
            'initial_amount_percent' => request()->initial_amount_percent,
            'interest_rate' => request()->interest_rate,
            'period' => request()->period,
            'cycle' => request()->cycle,
        ];
    }
}
