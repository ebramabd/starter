<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Offer;
use LaravelLocalization ;
class AjaxOfferController extends Controller
{
    public function create()
    {
        return view('OffersAjax.create');
    }
    public function store(Request $request)
    {
//        return $request ;



//        $file_name=$this->savePhoto($request->photo , 'images/offers');

        $offer=Offer::create([
           // 'photo'=> $file_name,
            'name_ar'=> $request->name_ar ,
            'name_en'=> $request->name_en ,
            'price'=>$request->price ,
            'details_ar'=>$request->details_ar,
            'details_en'=>$request->details_en,
        ]);
        if ($offer){
            return response()->json([
                'status'=>true,
                'msg'=>'done',
            ]);
        }else{
            return response()->json([
                'status'=>false,
                'msg'=>'not work',
            ]);
        }

    }

    public function all()
    {
        $offers=Offer::select(
            'id','price',
            'name_'.LaravelLocalization::getCurrentLocale().' as name',
            'details_'.LaravelLocalization::getCurrentLocale().' as details')->get();
        return view('OffersAjax.All',compact('offers')) ;
    }

    public function delete(Request $request)
    {
        $offer = Offer::find($request->id);
        $offer->delete();
        return response()->json([
            'status' => true,
            'msg' => 'done',
            'id' => $request->id,
        ]);
    }
}
