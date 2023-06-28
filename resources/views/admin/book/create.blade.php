@extends('layouts.main')
@section('content')
    <form action="{{ route('admin.book.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="id" class="form-label">id (if 0 inserted id will be generated automatically, prefix bk will be
                used)</label>
            <input type="number" min=0 max=1000000 class="form-control" id="id" name="id" step="1"
                   value="{{ old('id', 0) }}">
            @error('id')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" id="author" name="author" required value="{{ old('author') }}"
                   placeholder="Author">
            @error('author')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required value="{{ old('title') }}"
                   placeholder="Title">
            @error('title')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="genreList" class="form-label">Genre</label>
            <input class="form-control" list="genreListOptions" id="genreList" name="genre" value="{{ old('genre') }}"
                   placeholder="Type to search...">
            <datalist id="genreListOptions">
                @foreach($genres as $genre)
                    <option value="{{ $genre->title }}"></option>
                @endforeach
            </datalist>
            @error('genre')
            <p class="text-danger"> {{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price" placeholder="0.00" required min="0"
                   step="0.01" value="{{ old('price') }}">
            @error('price')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="publish_date" class="form-label">Publish date</label>
            <input type="date" class="form-control" id="publish_date" name="publish_date" required
                   value="{{ old('publish_date') }}"
                   placeholder="Publish date">
            @error('publish_date')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" required
                      placeholder="Description">{{ old('description') }}</textarea>
            @error('description')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3" id="create">Create</button>
        @error('create')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </form>
    <div class="mt-3"><a href="{{ url()->previous() }}">&larr; Back</a></div>
@endsection
