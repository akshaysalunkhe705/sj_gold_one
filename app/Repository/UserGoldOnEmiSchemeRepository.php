<?php

namespace App\Repository;

//Interface
use App\Repository\BaseRepositoryInterface;

//Models
use App\Models\UserGoldOnEmiSchemeModel;


class UserGoldOnEmiSchemeRepository implements BaseRepositoryInterface
{
    private $filter;
    
    public function __construct()
    {
        $this->filter($this->filter);
    }

    public function fetch($pagination=0, $filter=[])
    {
        $filter = $this->filter($filter);
        $dataSet = UserGoldOnEmiSchemeModel::when($filter['id'], function ($query) use ($filter) {
            $query->where('id', $filter['id']);
        })
        ->when($filter['user_id'], function ($query) use ($filter) {
            $query->where('user_id', $filter['user_id']);
        })
        ->when($filter['scheme_name'], function ($query) use ($filter) {
            $query->where('scheme_name', $filter['scheme_name']);
        })
        ->when($filter['initial_amount_percent'], function ($query) use ($filter) {
            $query->where('initial_amount_percent', $filter['initial_amount_percent']);
        })
        ->when($filter['initial_amount'], function ($query) use ($filter) {
            $query->where('initial_amount', $filter['initial_amount']);
        })
        ->when($filter['interest_rate'], function ($query) use ($filter) {
            $query->where('interest_rate', $filter['interest_rate']);
        })
        ->when($filter['interest_amount'], function ($query) use ($filter) {
            $query->where('interest_amount', $filter['interest_amount']);
        })
        ->when($filter['emi_amount'], function ($query) use ($filter) {
            $query->where('emi_amount', $filter['emi_amount']);
        })
        ->when($filter['period'], function ($query) use ($filter) {
            $query->where('period', $filter['period']);
        })
        ->when($filter['cycle'], function ($query) use ($filter) {
            $query->where('cycle', $filter['cycle']);
        })
        ->when($filter['gold_melting_type'], function ($query) use ($filter) {
            $query->where('gold_melting_type', $filter['gold_melting_type']);
        })
        ->when($filter['gold_rate'], function ($query) use ($filter) {
            $query->where('gold_rate', $filter['gold_rate']);
        })
        ->when($filter['gold_weight'], function ($query) use ($filter) {
            $query->where('gold_weight', $filter['gold_weight']);
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
        return UserGoldOnEmiSchemeModel::create([
            'user_id' => $request->get('user_id'),
            'scheme_id' => $request->get('scheme_id'),
            'scheme_name' => $request->get('scheme_name'),
            'initial_amount_percent' => $request->get('initial_amount_percent'),
            'initial_amount' => $request->get('initial_amount'),
            'interest_rate' => $request->get('interest_rate'),
            'interest_amount' => $request->get('interest_amount'),
            'emi_amount' => $request->get('emi_amount'),
            'period' => $request->get('period'),
            'cycle' => $request->get('cycle'),
            'gold_melting_type' => $request->get('gold_melting_type'),
            'gold_rate' => $request->get('gold_rate'),
            'gold_weight' => $request->get('gold_weight'),
            'emi_on_date' => $request->get('emi_on_date'),
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

    
    //-------------------------------------------PRIVATE FUNCTIONS
    public function filter()
    {
        return $this->filter = [
            'id' => request()->id,
            'user_id' => request()->user_id,
            'scheme_id' => request()->scheme_id,
            'scheme_name' => request()->scheme_name,
            'initial_amount_percent' => request()->initial_amount_percent,
            'initial_amount' => request()->initial_amount,
            'interest_rate' => request()->interest_rate,
            'interest_amount' => request()->interest_amount,
            'emi_amount' => request()->emi_amount,
            'period' => request()->period,
            'cycle' => request()->cycle,
            'gold_melting_type' => request()->gold_melting_type,
            'gold_rate' => request()->gold_rate,
            'gold_weight' => request()->gold_weight,            
            'emi_on_date' => request()->emi_on_date,
        ];
    }
}
