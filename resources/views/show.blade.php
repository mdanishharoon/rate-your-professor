@extends('layouts.app')

@section('content')
    <h1>{{ $professor->name }}</h1>
    <p>Department: {{ $professor->department->name }}</p>

    <h2>Average Ratings</h2>
    <ul>
        <li>Fun: {{ $averageRatings['fun'] ?? 'No ratings yet' }}</li>
        <li>Teaching: {{ $averageRatings['teaching'] ?? 'No ratings yet' }}</li>
        <li>Overall: {{ $averageRatings['overall'] ?? 'No ratings yet' }}</li>
    </ul>

    <h2>Reviews</h2>
    <ul>
        @forelse ($professor->reviews as $review)
            <li>
                <strong>{{ $review->student_roll_number }}</strong>: {{ $review->comment }}
                <br>
                Ratings - Fun: {{ $review->fun_rating }}, Teaching: {{ $review->teaching_rating }}, Overall: {{ $review->overall_rating }}
            </li>
        @empty
            <p>No reviews yet.</p>
        @endforelse
    </ul>

    <h2>Leave a Review</h2>
    <form method="POST" action="{{ route('reviews.store') }}">
        @csrf
        <input type="hidden" name="professor_id" value="{{ $professor->id }}">

        <label for="fun_rating">Fun Rating (1-5):</label>
        <input type="number" name="fun_rating" min="1" max="5" required>

        <label for="teaching_rating">Teaching Rating (1-5):</label>
        <input type="number" name="teaching_rating" min="1" max="5" required>

        <label for="overall_rating">Overall Rating (1-5):</label>
        <input type="number" name="overall_rating" min="1" max="5" required>

        <label for="comment">Comment:</label>
        <textarea name="comment" rows="4" required></textarea>

        <label for="student_roll_number">Your Roll Number:</label>
        <input type="text" name="student_roll_number" required>

        <button type="submit">Submit Review</button>
    </form>
@endsection
