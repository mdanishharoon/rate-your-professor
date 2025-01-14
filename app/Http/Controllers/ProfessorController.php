<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    public function index()
    {
        $professors = Professor::with('department')->get();
        return view('professors.index', compact('professors'));
    }

    public function show($id)
    {
        $professor = Professor::with(['department', 'reviews'])->findOrFail($id);
        $averageRatings = $professor->averageRatings();
        return view('professors.show', compact('professor', 'averageRatings'));
    }
}
