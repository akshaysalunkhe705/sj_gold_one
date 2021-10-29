<?php

namespace App\Repository;

//Interface
use App\Repository\BaseRepositoryInterface;

//Models
use App\Models\UserGoldOnEmiSchemeModel;


class UserGoldOnEmiSchemeRepository implements BaseRepositoryInterface
{
    public function fetch($pagination=0, $filter=[])
    {
        $dataSet = UserGoldOnEmiSchemeModel::when($filter['id'], function ($query) use ($filter) {
            $query->where('id', $filter['id']);
        })
        ->when($filter['user_id'], function ($query) use ($filter) {
            $query->where('user_id', $filter['user_id']);
        })
        ->when($filter['scheme_name'], function ($query) use ($filter) {
            $query->where('scheme_name', $filter['scheme_name']);
        })
        ->when($filter['period'], function ($query) use ($filter) {
            $query->where('period', $filter['period']);
        })
        ->when($filter['cycle'], function ($query) use ($filter) {
            $query->where('cycle', $filter['cycle']);
        })
        ->when($filter['gold_rate'], function ($query) use ($filter) {
            $query->where('gold_rate', $filter['gold_rate']);
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
        return UserGoldOnEmiSchemeModel::create([
            'user_id' => $request->get('user_id'),
            'scheme_name' => $request->get('scheme_name'),
            'period' => $request->get('period'),
            'cycle' => $request->get('cycle'),
            'gold_rate' => $request->get('gold_rate'),
        ]);
    }
    //
    public function remove($ids)
    {
        return UserGoldOnEmiSchemeModel::find($ids)->delete();
    }
    //
    public function edit($id, $updateValues, $request)
    {
        return UserGoldOnEmiSchemeModel::where('id', $id)->update($updateValues);
    }
    //
}
