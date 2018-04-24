<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class krs extends Model
{
    protected $table = "tb_krs";

    public function mahasiswa(){
		return $this->belongsTo('App\mahasiswa','id_mhs');
    }
    
    public function mktawar(){
		return $this->belongsTo('App\mktawar','id_mktawar');
  }
  
  public function nilai(){
		return $this->belongsTo('App\nilai','id_nilai');
	}
}
