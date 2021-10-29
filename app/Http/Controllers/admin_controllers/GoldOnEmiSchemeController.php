<?php

namespace App\Http\Controllers\admin_controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repository\GoldOnEmiSchemeRepository;

class GoldOnEmiSchemeController extends Controller
{
    private $gold_emi_repo;
    private $filter;
    public function __construct()
    {
        $this->filter();
        $this->gold_emi_repo = new GoldOnEmiSchemeRepository();
    }
    //-------------------------------------------LIST
    public function index($per_page = 10)
    {
        $setting_gold_on_emi_dataset = $this->gold_emi_repo->fetch(pagination:$per_page, filter: $this->filter);
        return view('gold_on_emi_scheme.index', ['form_type' => 'List', 'setting_gold_on_emi_dataset' => $setting_gold_on_emi_dataset]);
    }
    //-------------------------------------------DETAILS
    public function detail()
    {
        $setting_gold_on_emi_dataset = $this->gold_emi_repo->fetch(filter: $this->filter);
        
        return view('gold_on_emi_scheme.detail', ['form_type' => 'Detail', 'setting_gold_on_emi_dataset' => $setting_gold_on_emi_dataset]);
    }
    //-------------------------------------------CREATE
    public function create(Request $request)
    {
        if ($request->isMethod('POST')) {
            $data = $request->validate([
                'scheme_name' => 'required',
                'cycle' => 'required',
            ]);
            //Insert in DB
            $this->gold_emi_repo->add($request);
            
            return redirect()->back()->with('alert', 'Gold Emi Scheme Inserted Successfuly!');
        }
        return view('gold_on_emi_scheme.form', ['form_type' => 'add']);
    }
    //-------------------------------------------EDIT
    public function edit(Request $request)
    {
    }
    //-------------------------------------------DELETE
    public function delete(Request $request)
    {
        $this->gold_emi_repo->remove($request->id);
        return redirect()->back()->with('alert', 'Chapter Deleted Successfully!');
    }


    
    //-------------------------------------------PRIVATE FUNCTIONS
    private function filter()
    {
        $this->filter = [
            'id' => request()->id,
            'scheme_name' => request()->scheme_name,
            'period' => request()->period,
            'cycle' => request()->cycle,
        ];
    }
}
