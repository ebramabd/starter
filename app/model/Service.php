<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use App\model\Hospital ;
class Service extends Model
{
    protected $table = 'services';
    protected $fillable=['name'] ;
    protected $hidden=['create_at','update_at','pivot'] ;

    public function doctors()
    {
        return $this->belongsToMany(
            'App\model\Doctor',
            'doctor_service',
            'service_id',
            'doctor_id',
        );
    }
}
