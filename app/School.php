<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = ['name', 'location'];

    public function admissions()
    {
        return $this->hasMany('App\Admission');
    }

    public function faculties()
    {
        return $this->hasMany('App\Faculty');
    }

    public function students()
    {
        return $this->hasMany('App\Student');
    }
}
