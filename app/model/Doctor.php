<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use App\model\Hospital ;
class Doctor extends Model
{
    protected $table = 'doctors';
    protected $fillable=['name','title','hospital_id'] ;
    protected $hidden=['create_at','update_at'] ;

    public function hospital()
    {
        return $this->belongsTo('Hospital','hospital_id')   ;
    }
    public function services()
    {
        return $this->belongsToMany(
            'App\model\Service',
            'doctor_service',
            'doctor_id',
            'service_id'
        );
    }
}
