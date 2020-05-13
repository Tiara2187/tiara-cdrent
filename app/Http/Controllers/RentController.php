<?php

namespace App\Http\Controllers;

use App\Rent;
use App\Cd;
use Illuminate\Http\Request;
use Auth;
use DateTime;

class RentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index(){
        $user = Auth::user();
        $data = Rent::where('user_id', $user->id)->get();
        return response($data);
    }

    public function show($id){
        $data = Rent::where('id', $id)->get();
        return response ($data);
    }

    //input cd_id, user_id, start_rent(date now)
    public function startRent(Request $request){
        $user = Auth::user();


        $cd = Cd::where('id', $request->input('cd_id'))->first();
        if($cd === null) {
            return "CD tidak ada";
        }

        if($cd->quantity > 0) {
            $data = new Rent();
            $data->user_id = $user->id;
            $data->cd_id = $request->input('cd_id');
            $data->start_rent = date('Y-m-d');
            $data->save();

            $cd->quantity = $cd->quantity-1;
            $cd->save();
        
            return response($data);
        } else {
            return response('CD '. $cd->title . ' kosong');
        }
    }

    //input user_id, id=cd_id, api_token

    public function endRent(Request $request){
        $user = Auth::user();
        
        $data = Rent::with('cd')->where('id', $request->input('id'))->first();
        
        $start_date = new DateTime($data->start_rent);
        $end_date = new DateTime($request->input('end_rent'));
        $interval = $start_date->diff($end_date);
        $data->end_rent = $request->input('end_rent');
        $data->total = $interval->days *  $data->cd->rate;
        $data->save();

        $cd = Cd::where('id', $data->cd_id)->first();
        $cd->quantity = $cd->quantity+1;
        $cd->save();

        return response($data);
    }
}
