<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Professor;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'professor_id' => 'required|exists:professors,id',
            'fun_rating' => 'required|integer|min:1|max:5',
            'teaching_rating' => 'required|integer|min:1|max:5',
            'overall_rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
            'student_roll_number' => 'required|string',
        ]);

        Rating::create($request->all());

        return redirect()->route('professors.show', ['id' => $request->professor_id])
            ->with('success', 'Review submitted successfully!');
    }
}
