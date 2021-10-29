<?php

namespace App\Models\BaseModels;

interface BaseModelInterface
{
    public function add($request);
    public function edit($request, $id);
    public function remove_single($id);
    public function remove_multiple($ids);
    public function fetch_single($id);
    public function fetch_all($per_page);
}
