<?php

namespace App\Repository;

//Interface
use App\Repository\BaseRepositoryInterface;

//Models
use App\Models\SettingGoldRateModel;


class SettingGoldRateRepository implements BaseRepositoryInterface
{
    private $filter;
    
    public function __construct()
    {
        $this->filter($this->filter);
    }

    public function fetch($pagination=0, $filter=[])
    {
        $filter = $this->filter($filter);
        $dataSet = SettingGoldRateModel::when($filter['id'], function ($query) use ($filter) {
            $query->where('id', $filter['id']);
        })
        ->when($filter['gold_melting_name'], function ($query) use ($filter) {
            $query->where('gold_melting_name', $filter['gold_melting_name']);
        })
        ->when($filter['gold_melting_buy_rate'], function ($query) use ($filter) {
            $query->where('gold_melting_buy_rate', $filter['gold_melting_buy_rate']);
        })
        ->when($filter['gold_melting_sale_rate'], function ($query) use ($filter) {
            $query->where('gold_melting_sale_rate', $filter['gold_melting_sale_rate']);
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
        return SettingGoldRateModel::create([
            'gold_melting_name' => $request->get('gold_melting_name'),
            'gold_melting_buy_rate' => $request->get('gold_melting_buy_rate'),
            'gold_melting_sale_rate' => $request->get('gold_melting_sale_rate'),
        ]);
    }
    //
    public function remove($ids)
    {
        return SettingGoldRateModel::find($ids)->delete();
    }
    //
    public function edit($id, $updateValues, $request)
    {
        return SettingGoldRateModel::where('id', $id)->update($updateValues);
    }
    //

    
    //-------------------------------------------PRIVATE FUNCTIONS
    public function filter()
    {
        return $this->filter = [
            'id' => request()->id,
            'gold_melting_name' => request()->gold_melting_name,
            'gold_melting_buy_rate' => request()->gold_melting_buy_rate,
            'gold_melting_sale_rate' => request()->gold_melting_sale_rate
        ];
    }
}
