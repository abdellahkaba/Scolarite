<?php

namespace App\Models;

use App\Models\Family;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    public function parents()
    {
        return $this->belongsToMany(Family::class);
    }
}
