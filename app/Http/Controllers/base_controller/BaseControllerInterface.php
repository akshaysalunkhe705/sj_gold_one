<?php

namespace App\Http\Controllers\base_controller;
// use Illuminate\Http\Request;
use App\Http\Requests\TeacherRequest;

interface BaseControllerInterface
{
    public function fetch($type,$per_page,$id);
    public function add(TeacherRequest $request);
    public function edit(TeacherRequest $request, $id);
    public function remove($type,$ids);
}