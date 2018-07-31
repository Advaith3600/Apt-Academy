<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use Notifiable;

    protected $guard = 'student';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'profile_picture', 'bio', 'school_id', 'standard_id', 'subject'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function standard()
    {
        return $this->belongsTo('App\Standard');
    }

    public function school()
    {
        return $this->belongsTo('App\School');
    }

    public function guardian()
    {
        return $this->belongsTo('App\Guardian');
    }
}
