<?php

namespace App\Http\Controllers;

use App\Cd;
use Illuminate\Http\Request;

class CdController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //Menambilkan data 
    public function index(){
        $data = Cd::all();
        return response($data);
    }

    //Menampilkan data berdasarkan [id]

    public function show($id){
        $data = Cd::where('id',$id)->get();
        return response ($data);
    }

    //Menambah data

    public function store (Request $request){
        $data = new Cd();
        $data->title = $request->input('title');
        $data->rate = $request->input('rate');
        $data->category = $request->input('category');
        $data->quantity = $request->input('quantity');
        $data->save();
    
        return response($data);
    }

    //Mengubah data

    public function update(Request $request, $id){
        $data = Cd::where('id',$id)->first();
        $data->title = $request->input('title');
        $data->rate = $request->input('rate');
        $data->category = $request->input('category');
        $data->quantity = $request->input('quantity');
        $data->save();
    
        return response($data);
    }

    //Menghapus data
    
    public function destroy($id){
        $data = Cd::where('id',$id)->first();
        $data->delete();
    
        return response('Berhasil Menghapus Data');
    }
}
