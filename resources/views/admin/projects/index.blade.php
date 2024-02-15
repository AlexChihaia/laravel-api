@extends('layouts.admin')


@section('content')
    <div class="text-center my-3">
        <span class="mx-2 btn btn-primary">
            <a href="{{ route('admin.projects.create') }}" class="text-white">Create a new project</a>
        </span>
    </div>
    <ul class="d-flex flex-wrap">
        @foreach ($projects as $project)
            <li class="card col-3 mx-5 my-3 text-center">
                <h4>Project name: {{ $project->title }}</h4>
                <div class="card-img ">
                    <img src="{{ $project->thumb }}" alt="Project image" class="w-75 rounded">
                </div>
                <div class="card-body">
                    <p class="text-uppercase"><strong>Category:</strong> {{ $project->category }}</p>
                    <p class="text-uppercase"><strong>Status:</strong> {{ $project->status }}</p>
                    <p class="text-uppercase"><strong>Main used technologies:</strong>
                        @if ($project->technologies)
                            @foreach ($project->technologies as $technology)
                                <span class="title">{{ $technology->title }} </span>
                            @endforeach
                        @endif
                    </p>
                    <p class="text-uppercase"><strong>Type of project:</strong>
                        {{ $project->type->title ?? 'Nessuna tipologia associata' }}</p>
                </div>
                <div class="row justify-content-center">

                    <a href="{{ route('admin.projects.show', $project->slug) }}"
                        class="btn btn-sm btn-success mx-2 w-25 ">View
                        Detail</a>


                    <a href="{{ route('admin.projects.edit', $project->slug) }}"
                        class="btn btn-sm btn-warning mx-2 w-25">Edit</a>

                    <form class="my-2" action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input class="btn btn-sm btn-danger mx-2" type="submit" value="Delete">
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
@endsection
