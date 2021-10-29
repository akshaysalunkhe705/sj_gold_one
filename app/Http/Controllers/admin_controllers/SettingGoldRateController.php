<?php

namespace App\Http\Controllers\admin_controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repository\SettingGoldRateRepository;

class SettingGoldRateController extends Controller
{
    private $setting_gold_rate_repo;
    private $filter;
    public function __construct()
    {
        $this->filter();
        $this->setting_gold_rate_repo = new SettingGoldRateRepository();
    }
    //-------------------------------------------LIST
    public function index($per_page = 10)
    {
        $setting_gold_rate_dataset = $this->setting_gold_rate_repo->fetch(pagination:$per_page, filter: $this->filter);
        return view('setting_gold_rate.index', ['form_type' => 'List', 'setting_gold_rate_dataset' => $setting_gold_rate_dataset]);
    }
    //-------------------------------------------DETAILS
    public function detail()
    {
        $setting_gold_rate_dataset = $this->setting_gold_rate_repo->fetch(filter: $this->filter);
        
        return view('setting_gold_rate.detail', ['form_type' => 'Details', 'setting_gold_rate_dataset' => $setting_gold_rate_dataset]);
    }
    //-------------------------------------------CREATE
    public function create(Request $request)
    {
        if ($request->isMethod('POST')) {
            $data = $request->validate([
                'gold_melting_name' => 'required',
                'gold_melting_buy_rate' => 'required',
                'gold_melting_sale_rate' => 'required',
            ]);
            //Insert in DB
            $this->setting_gold_rate_repo->add($request);
            
            return redirect()->back()->with('alert', 'Gold Rate Inserted Successfuly!');
        }
        return view('setting_gold_rate.form', ['form_type' => 'add']);
    }
    //-------------------------------------------EDIT
    public function edit(Request $request)
    {
    }
    //-------------------------------------------DELETE
    public function delete(Request $request)
    {
        $this->setting_gold_rate_repo->remove($request->id);
        return redirect()->back()->with('alert', 'Chapter Deleted Successfully!');
    }


    
    //-------------------------------------------PRIVATE FUNCTIONS
    private function filter()
    {
        $this->filter = [
            'id' => request()->id,
            'gold_melting_name' => request()->gold_melting_name,
            'gold_melting_buy_rate' => request()->gold_melting_buy_rate,
            'gold_melting_sale_rate' => request()->gold_melting_sale_rate,
        ];
    }
}
