<?php

namespace App\Models;

use App\Models\Classe;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payement extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }
}
