@extends('layouts.admin')


@section('content')
    <h1 class="text-center">
        Project name: {{ $project->title }}</h1>
    <div class="d-flex justify-content-center">
        <img src="{{ $project->thumb }}" alt="immagine proggetto" class="w-50 rounded">
    </div>
    <div class="container my-5">
        <p class="text-uppercase"><strong>Project status:</strong> {{ $project->status }}</p>
        @if ($project->technologies)
            <p class="text-uppercase"><strong>Project technologies:</strong>
                @foreach ($project->technologies as $technology)
                    <span class="title">{{ $technology->title }} </span>
                @endforeach
            </p>
        @endif
        <p class="text-uppercase"><strong>Project category:</strong> {{ $project->category }}</p>

        <div>
            <h3>Description</h3>
            <p>
            </p>
        </div>
        <p class="text-uppercase"><strong>Type of project:</strong>
            {{ $project->type->title ?? 'Nessuna tipologia associata' }}</p>

    </div>
@endsection
