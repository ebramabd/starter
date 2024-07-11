<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\model\Offer;
use App\model\Event;
use App\Events\VidoView ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use LaravelLocalization ;
//use Illuminate\;

class CrudController extends Controller
{
    public function __construct()
    {

    }
    public function get_offers()
    {
       return Offer::get();
    }

    public function create()
    {
        return view('Offers.create');
    }
    public function store(OfferRequest $request)
    {
//        $request ['name of input ' => value]
//        return $request ;

        //load photo


        $file_name=$this->savePhoto($request->photo , 'images/offers');

        Offer::create([
            'photo'=> $file_name,
            'name_ar'=> $request->name_ar ,
            'name_en'=> $request->name_en ,
            'price'=>$request->price ,
            'details_ar'=>$request->details_ar,
            'details_en'=>$request->details_en,
        ]);
        return redirect()->back()->with(["success"=>"the offer created"]) ;
    }

    public function getAll()
    {
        $offers=Offer::select(
            'id','price',
            'name_'.LaravelLocalization::getCurrentLocale().' as name',
            'details_'.LaravelLocalization::getCurrentLocale().' as details')->get();
        return view('Offers.All',compact('offers')) ;
    }

    public function edit($offer_id)
    {

        $offer = Offer::find($offer_id); //function find return only id
        if (!$offer) {
            return redirect()->back() ;
        }

        $offer = Offer::select('id', 'name_ar','name_en','price','details_ar','details_en')->find($offer_id);

        return view('Offers.edit' , compact('offer'));
    }

    public function updateOffer($id, OfferRequest $request)
    {
        $offer=Offer::find($id);
        if (!$offer){
            return redirect()->back() ;
        }
        $offer->update($request->all());
        return redirect()->back()->with(['with'=>'اااااااااا']) ;
    }

    protected function savePhoto($photo , $folder)
    {
        $file_extension = $photo->getClientOriginalExtension() ;
        $file_name=time().'.'.$file_extension;
        $path=$folder;
        $photo->move($path,$file_name);
        return $file_name ;
    }

    public function events()
    {
        $event=Event::first();
        event(new VidoView($event)) ;
        return view('events')->with('event',$event);
    }

    public function delete($offer_id)
    {
        $offer=Offer::find($offer_id) ;
        if (!$offer){
            return redirect()->back();
        }
        $offer->delete();
        return redirect()->route('offer.delete',$offer_id) ;
    }


}
