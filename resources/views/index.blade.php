@extends('layouts.app')

@section('content')
    <h1>Professors</h1>
    <ul>
        @foreach ($professors as $professor)
            <li>
                <a href="{{ route('professors.show', $professor->id) }}">
                    {{ $professor->name }} - {{ $professor->department->name }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection