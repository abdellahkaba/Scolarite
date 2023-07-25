<?php

namespace App\Models;

use App\Models\Level;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classe extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}
