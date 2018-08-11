<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Standard extends Model
{
    protected $fillable = ['class', 'syllabus', 'subjects'];
  
    public function students()
    {
        return $this->hasMany('App\Student');
    }

    public function admission()
    {
        return $this->hasMany('App\Admission');
    }

    public function allSubjects()
    {
        return unserialize($this->subjects);
    }
}
