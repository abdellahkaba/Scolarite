<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    public function index()
    {
        return view('inscriptions.index');
    }

    public function create()
    {
        return view('inscriptions.create');
    }

    public function edit(Inscription $inscription)
    {
        return view('inscriptions.edit', [
            'inscription' => $inscription
        ]);
    }

    public function show(Inscription $inscription)
    {
        return view('inscriptions.show', compact('inscription'));
    }
}
