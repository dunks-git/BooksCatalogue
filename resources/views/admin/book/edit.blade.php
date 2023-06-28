@extends('layouts.main')
@section('content')
    <form action="{{ route('admin.book.update', $book) }}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="id" class="form-label">id</label>
            <input type="number" min=0 class="form-control" id="id" name="id" step="1"
                   value="{{ old('id', $book->id) }}"
                   placeholder=0 readonly>
            @error('id')
            <p class="text-danger"> {{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" id="author" name="author" required
                   value="{{ old('author', $book->author) }}"
                   placeholder="Author">
            @error('author')
            <p class="text-danger"> {{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required
                   value="{{ old('title', $book->title) }}"
                   placeholder="Title">
            @error('title')
            <p class="text-danger"> {{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="genreList" class="form-label">Genre</label>
            <input class="form-control" list="genreListOptions" id="genreList" name="genre" value="{{ $book->genre->title }}"
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
                   step="0.01" value="{{ old('price', centsToPrice($book->price)) }}">
            @error('price')
            <p class="text-danger"> {{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="publish_date" class="form-label">Publish date</label>
            <input type="date" class="form-control" id="publish_date" name="publish_date" required
                   value="{{ old('publish_date', date('Y-m-d', strtotime($book->publish_date))) }}"
                   placeholder="Publish date">
            @error('publish_date')
            <p class="text-danger"> {{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" required
                      placeholder="Description">{{ old('description', $book->description) }}</textarea>
            @error('description')
            <p class="text-danger"> {{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3" id="update">Update</button>
        @error('update')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </form>
    <div class="mt-3"><a href="{{ url()->previous() }}">&larr; Back</a></div>
@endsection
