<?php

namespace App\Http\Controllers;

use App\Models\SchoolFrai;
use Illuminate\Http\Request;

class SchoolFraiController extends Controller
{
    public function index()
    {
        return view('frais.index');
    }

    public function create()
    {
        return view('frais.create');
    }

    public function edit(SchoolFrai $frai)
    {
        return view('frais.edit',[
            'frai' => $frai
        ]);
    }
}
