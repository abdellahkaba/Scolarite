<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return view('eleves.index');
    }

    public function create()
    {
        return view('eleves.create');
    }
    
    public function edit(Student $student)
    {
        return view('eleves.edit', compact('student'));
    }

    public function show(Student $student)
    {
        return view('eleves.show', compact('student'));
    }
}
