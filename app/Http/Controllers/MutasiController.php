<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\bmutasi;//pendeklarasian model bmutasi

use App\data; //pendeklarasian model data

class MutasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()//menampilkan semua data mutasi barang
    {
        $bmutasi=bmutasi::all();
        $data=data::all();
        return view('tabel',['bmutasi'=>$bmutasi, 'data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)//menampilkan semua data yang dicari berdasarkan periode tanggal
    {
        $tglawal=$request->tglawal;
        $tglakhir=$request->tglakhir;
        $bmutasi=bmutasi::whereBetween('tgl',[$request->tglawal,$request->tglakhir])->get();   
        $data=data::all();
        return view('tabel',['bmutasi'=>$bmutasi, 'data'=>$data]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)//untuk memproses penambahan data baru
    {
         $this->validate($request,[
            'kode_id' => 'required',
            'tgl' => 'required',
            'nobukti' => 'required',
            'indikator' => 'required',
            'quantity' => 'required'    
          ]);
 
        bmutasi::create([
            'kode_id' => $request->kode_id,
            'tgl' => $request->tgl,
            'nobukti' => $request->nobukti,
            'indikator' => $request->indikator,
            'quantity' => $request->quantity    
        ]);
 
        return redirect('/mutasi');
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
    public function edit($id)//untuk edit data mutasi
    {
        $bmutasi=bmutasi::find($id);
         $data=data::all();
       return view ('editmutasi',['bmutasi'=>$bmutasi, 'data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)//untuk memproses update data mutasi
    {
        $this->validate($request,[
        'kode_id'=>'required',
        'tgl'=>'required',
        'nobukti'=>'required',
        'indikator'=>'required',
        'quantity'=>'required'
        
        ]);
        $bmutasi=bmutasi::find($id);
        $bmutasi->kode_id=$request->kode_id;
         $bmutasi->tgl=$request->tgl;
        $bmutasi->nobukti=$request->nobukti;
         $bmutasi->indikator=$request->indikator;
        $bmutasi->quantity=$request->quantity;
        $bmutasi->save();
        return redirect('/mutasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)//untuk menghapus data mutasi
    {
         $bmutasi=bmutasi::find($id);
        $bmutasi->delete();
        return redirect('/mutasi');
    }
}
