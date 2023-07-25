<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Family extends Model
{
    protected $table = 'parents';
    use HasFactory, Notifiable;

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
}
