<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Standard extends Model
{
    public function students()
    {
        return $this->hasMany('App\Student');
    }

    public function admission()
    {
        return $this->hasMany('App\Admission');
    }
}
