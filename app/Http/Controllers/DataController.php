<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests; 

use App\data; //pendeklarasian model data yang akan digunakan

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()//menampilkan semua data nama dan kode barang
    {
        $data=data::all();
        return view('data',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)//memproses tambahan data baru 
    {
        $this->validate($request,[
            'kode' => 'required',
            'namabarang' => 'required'    
          ]);
 
        data::create([
            'kode' => $request->kode,
            'namabarang' => $request->namabarang    
        ]);
 
        return redirect('/datas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)//mengedit data barang
    {
         $data=data::find($id);
       return view ('editdata',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)//memproses edit data
    {
        $this->validate($request,[
        'kode'=>'required',
        'namabarang'=>'required'
        
        ]);
        $data=data::find($id);
        $data->kode=$request->kode;
        $data->namabarang=$request->namabarang;
        $data->save();
        return redirect('/datas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)//untuk menghapus data
    {
         $data=data::find($id);
        $data->delete();
        return redirect('/datas');
    }
}
