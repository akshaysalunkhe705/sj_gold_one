<?php

namespace App\Repository;

//Interface
use App\Repository\BaseRepositoryInterface;

//Models
use App\Models\GoldOnEmiSchemeModel;

class GoldOnEmiSchemeRepository implements BaseRepositoryInterface
{
    public function fetch($pagination=0, $filter=[])
    {
        $dataSet = GoldOnEmiSchemeModel::when($filter['id'], function ($query) use ($filter) {
            $query->where('id', $filter['id']);
        })
        ->when($filter['scheme_name'], function ($query) use ($filter) {
            $query->where('scheme_name', $filter['scheme_name']);
        })
        ->when($filter['initial_amount_percent'], function ($query) use ($filter) {
            $query->where('initial_amount_percent', $filter['initial_amount_percent']);
        })
        ->when($filter['interest_rate'], function ($query) use ($filter) {
            $query->where('interest_rate', $filter['interest_rate']);
        })
        ->when($filter['period'], function ($query) use ($filter) {
            $query->where('period', $filter['period']);
        })
        ->when($filter['cycle'], function ($query) use ($filter) {
            $query->where('cycle', $filter['cycle']);
        })
        ->orderBy('created_at', 'ASC');
        
        if ($filter['id'] != null) {
            return $dataSet->first();
        }
        return $pagination != 0 ? $dataSet->paginate($pagination) : $dataSet->get();
    }
    //
    public function add($request)
    {
        return GoldOnEmiSchemeModel::create([
            'scheme_name' => $request->get('scheme_name'),
            'initial_amount_percent' => $request->get('initial_amount_percent'),
            'interest_rate' => $request->get('interest_rate'),
            'period' => $request->get('period'),
            'cycle' => $request->get('cycle'),
        ]);
    }
    //
    public function remove($ids)
    {
        return GoldOnEmiSchemeModel::find($ids)->delete();
    }
    //
    public function edit($id, $updateValues, $request)
    {
        return GoldOnEmiSchemeModel::where('id', $id)->update($updateValues);
    }
    //
}
