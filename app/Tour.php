<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $table = 'tours';

    public function zona(){
        return $this->belongsTo('App\Zona', 'zona_id');
    }
}
