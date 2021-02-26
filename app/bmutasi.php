<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bmutasi extends Model
{
   protected $table='bmutasis';
   protected $fillable = [
        'kode_id','tgl','nobukti','indikator','quantity'
    ];
    public function data(){
    	return $this->belongsTo('App\data','kode_id','id');
    }
}
