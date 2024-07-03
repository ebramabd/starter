<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;

class UserController extends Controller
{
    public function showUserName()
    {
        return 'abram abd';
    }
    public function getindex()
    {
        $obj=new \stdClass();
        $obj->name='abram abd';
        $obj->id=3;
        return view('welcome',compact('obj'));
    }

}
