<?php
namespace App\Repository;

interface BaseRepositoryInterface{
    public function fetch($pagination, $filter);
    public function add($request);
    public function edit($id, $updateValues, $request);
    public function remove($condition);
}