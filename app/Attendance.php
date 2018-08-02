<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = ['attendance', 'student_id', 'date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
