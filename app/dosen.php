<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dosen extends Model
{
    protected $table = "tb_dosen";
    
    public function mktawar(){
        return $this->hasMany('App\mktawar');
    }

    public function user(){
		return $this->belongsTo('App\User', 'id_user');
    }
}
