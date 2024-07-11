<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use App\model\Doctor;

class Hospital extends Model
{
    protected $table = 'hospitals';
    protected $fillable=['name','address'] ;
    protected $hidden=['create_at','update_at'] ;

    public function doctors()
    {
        return $this->hasMany('App\model\Doctor','hospital_id','id')   ;
    }
}
