<?php

namespace App\Models\back;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    public function servicedept()
    {
        return $this->belongsTo('App\Models\back\Servicedept');
    }
}
