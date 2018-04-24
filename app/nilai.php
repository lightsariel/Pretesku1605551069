<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nilai extends Model
{
    protected $table = "tb_nilai";
    
    public function krs(){
        return $this->hasone('App\krs');
    }
}
