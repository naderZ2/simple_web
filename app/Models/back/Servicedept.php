<?php

namespace App\Models\back;

use Illuminate\Database\Eloquent\Model;

class Servicedept extends Model
{
    public function services()
    {
        return $this->hasMany('App\Models\back\Service');
    }
}
