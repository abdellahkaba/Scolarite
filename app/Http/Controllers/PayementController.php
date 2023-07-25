<?php

namespace App\Http\Controllers;

use App\Models\Payement;
use Illuminate\Http\Request;

class PayementController extends Controller
{
    public function index()
    {
        return view('payements.index');
    }

    public function create()
    {
        return view('payements.create');
    }

    public function edit(Payement $payement)
    {
        return view('payements.edit', array('payement' => $payement));
    }
}
