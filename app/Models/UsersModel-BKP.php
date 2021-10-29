<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mockery\Expectation;
use App\Traits\UUIDTrait;
use App\Models\BaseModels\BaseModelInterface;

class UsersModel extends Model implements BaseModelInterface
{
    use HasFactory, SoftDeletes, UUIDTrait;
    
    public function add($request){
        return NotificationModel::create([          
        ]);
    }
    public function edit($request, $id){
        $model = new NotificationModel();
        $model->save();
        
    }
 

    public function remove_single($id)
    {
        try {
            return NotificationModel::find($id)->delete();
        }
        catch(Expectation $e) {
            return $e;
        }
    }
    public function remove_multiple($ids)
    {
        try {
            $ids = explode(",", $ids);
            return NotificationModel::whereIn('id', $ids)->delete();
        }
        catch(Expectation $e) {
            return $e;
        }
    }

    public function fetch_single($id){
       return NotificationModel::find($id);
    }
    public function fetch_all($per_page = 0){
        if($per_page != 0)
        {
            return NotificationModel::paginate($per_page);
        }
        return NotificationModel::all();
    }
}
