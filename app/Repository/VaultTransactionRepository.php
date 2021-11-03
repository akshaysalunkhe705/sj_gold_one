<?php

namespace App\Repository;

//Interface
use App\Repository\BaseRepositoryInterface;

//Models
use App\Models\VaultTransactionModel;


class VaultTransactionRepository implements BaseRepositoryInterface
{
    private $filter;
    
    public function __construct()
    {
        $this->filter($this->filter);
    }

    public function fetch($pagination=0, $filter=[])
    {
        $filter = $this->filter($filter);
        $dataSet = VaultTransactionModel::when($filter['id'], function ($query) use ($filter) {
            $query->where('id', $filter['id']);
        })
        ->when($filter['user_id'], function ($query) use ($filter) {
            $query->where('user_id ', $filter['user_id']);
        })
        ->when($filter['weight'], function ($query) use ($filter) {
            $query->where('weight', $filter['weight']);
        })
        ->when($filter['gold_melting_type'], function ($query) use ($filter) {
            $query->where('gold_melting_type', $filter['gold_melting_type']);
        })
        ->when($filter['gold_rate'], function ($query) use ($filter) {
            $query->where('gold_rate', $filter['gold_rate']);
        })
        ->when($filter['purchase_date'], function ($query) use ($filter) {
            $query->where('purchase_date', $filter['purchase_date']);
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
        return VaultTransactionModel::create([
            'user_id' => $request->get('user_id'),
            'weight' => $request->get('weight'),
            'gold_melting_type' => $request->get('gold_melting_type'),
            'gold_rate' => $request->get('gold_rate'),
            'purchase_date' => $request->get('purchase_date'),
        ]);
    }
    //
    public function remove($ids)
    {
        return VaultTransactionModel::find($ids)->delete();
    }
    //
    public function edit($id, $updateValues, $request)
    {
        return VaultTransactionModel::where('id', $id)->update($updateValues);
    }
    //

    
    //-------------------------------------------PRIVATE FUNCTIONS
    public function filter()
    {
        return $this->filter = [
            'id' => request()->id,
            'user_id' => request()->user_id,
            'weight' => request()->weight,
            'gold_melting_type' => request()->gold_melting_type,
            'gold_rate' => request()->gold_rate,
            'purchase_date' => request()->purchase_date,
        ];
    }
}
