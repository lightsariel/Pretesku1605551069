<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mktawar extends Model
{
    protected $table = "tb_mktawar";
    
    public function krs(){
    return $this->hasMany('App\krs');
    }

    public function dosen(){
		return $this->belongsTo('App\dosen', 'id_dosenpengampu');
    }
    
    public function matakuliah(){
		return $this->belongsTo('App\matakuliah', 'id_mk');
	}
}
