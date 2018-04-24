<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    protected $table = "tb_mahasiswa";
    public function krs(){
        return $this->hasMany('App\krs');
    }

    
    public function user(){
		return $this->belongsTo('App\User', 'id_user');
    }

    public function agama(){
		return $this->belongsTo('App\agama', 'id_agama');
    }
}
