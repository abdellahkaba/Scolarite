<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    public function index()
    {
        return view('classes.index');
    }

    public function create()
    {
        return view('classes.create');
    }

    public function edit(Classe $classe)
    {
        return view('classes.edit', [
            'classe' => $classe
        ]);
    }
}
