<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events'; //لو اسم الموديل كان غير اسم الاسم اللي موجود في قاعده البيانات لازم اعرفه الاسم
    protected $fillable=['name','views']; //اي اسم مش مكتوب تيع الاري يبقي وانا يعمل (insert )يدخل بنل
    public $timestamps = false ;
}
