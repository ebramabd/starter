<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class phone extends Model
{
    protected $fillable=['code','number','user_id']; //اي اسم مش مكتوب تيع الاري يبقي وانا يعمل (insert )يدخل بنل
    public $timestamps = false ;

    public function getuser()
    {
        return $this->belongsTo('App\User','user_id');
    }



}
