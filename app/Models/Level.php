<?php

namespace App\Models;

use App\Models\SchoolFrai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Level extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function schoolFrai()
    {
        return $this->hasMany(SchoolFrai::class);
    }
}
