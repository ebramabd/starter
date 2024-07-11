<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = 'offers'; //لو اسم الموديل كان غير اسم الاسم اللي موجود في قاعده البيانات لازم اعرفه الاسم
    protected $fillable=['name_ar','name_en','price','details_ar','details_en','created_at','updated_at']; //اي اسم مش مكتوب تيع الاري يبقي وانا يعمل (insert )يدخل بنل
    protected $hidden=['created_at','updated_at'] ;//اي مره هعمل فليها جمله (select) يبقي مش هيظهر معايا
//    public $timestamps = false ;
}
