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
        return $this->belongsTo(Standard::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function guardian()
    {
        return $this->belongsTo(Guardian::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function getAttendanceByDate($date)
    {
        return optional($this->attendances()->where('date', '=', $date)->first())->attendance;
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
