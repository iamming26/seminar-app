<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterEvent extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function student()
    {
        return $this->hasMany(User::class, 'student_id', 'id');
    }

    public function event()
    {
        return $this->hasMany(Event::class, 'event_id', 'id');
    }
}
