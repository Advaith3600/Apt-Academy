<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    protected $fillable = ['name', 'email', 'accepted', 'note', 'picture', 'grades', 'standard_id', 'school_id'];

    public function school()
    {
        return $this->belongsTo('App\School');
    }

    public function standard()
    {
        return $this->belongsTo('App\Standard');
    }
}
