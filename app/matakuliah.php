<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class matakuliah extends Model
{
    protected $table = "tb_matakuliah";
    
    public function mktawar(){
        return $this->hasMany('App\mktawar');
    }
}
