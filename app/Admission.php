<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    protected $fillable = [
        'name', 'email', 'accepted', 'note', 'picture', 'grades', 'standard_id', 'school_id', 'subject'
    ];

    public function school()
    {
        return $this->belongsTo('App\School');
    }

    public function standard()
    {
        return $this->belongsTo('App\Standard');
    }

    public function subject()
    {
        return unserialize($this->subject);
    }
    

    public function subjectsOnly()
    {
        $subjects = $this->subject();

        for ($i=0; $i < count($subjects); $i++) {
            unset($subjects[$i][1]);
            unset($subjects[$i][2]);

            $subjects[$i] = $subjects[$i][0];
        }

        $subjects = implode(',', $subjects);

        return $subjects;
    }
}
