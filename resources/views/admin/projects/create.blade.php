@extends('layouts.admin')


@section('content')
    <h2 class="text-center">Create your project</h2>
    <form action="{{ route('admin.projects.store') }}" method="POST">
        @csrf


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                value="{{ old('title') }}" required>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description" cols="30" rows="10" value="{{ old('description') }}"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Thumbnail</label>
            <input type="text" class="form-control @error('thumb') is-invalid @enderror" name="thumb"
                value="{{ old('thumb') }}">
            @error('thumb')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Project Category</label>
            <select class="form-select" name="category" aria-label="Default select example">
                <option selected>Choose Category</option>
                <option value="backend" @if (old('category') == 'backend') selected @endif>Back-end</option>
                <option value="frontend" @if (old('category') == 'frontend') selected @endif>Front-end</option>
                </option>
            </select>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Project Status</label>
            <select class="form-select" name="status" aria-label="Default select example">
                <option selected>Choose Status</option>
                <option value="ongoing" @if (old('status') == 'ongoing') selected @endif>Ongoing</option>
                <option value="completed" @if (old('status') == 'completed') selected @endif>Completed</option>
                </option>
            </select>
        </div>
        <div class="form-group">
            <label for="type_id">Project type:</label>
            <select name="type_id" id="type_id" class="form-control">
                <option value="">The project has no type</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>
                        {{ $type->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-2">
            <p>Technologies used</p>
        </div>
        <div class="input-group d-flex">

            @foreach ($technologies as $technology)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="{{ $technology->id }}" name="technologies[]"
                        id="technology-{{ $technology->id }}"
                        {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>
                    <label class="form-check-label"
                        for="technology-{{ $technology->id }}">{{ $technology->title }}</label>
                </div>
            @endforeach

            @error('technology')
                <div class="alert alert-danger m-0">{{ $message }}</div>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">Submit your comic</button>
    </form>







@endsection
