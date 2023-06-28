@extends('layouts.main')
@section('script')
    <script src="{{ asset('js/books_index.js') }}"></script>
@endsection
@section('title')
    Books
@endsection
@section('content')
    <div class="bk">
        @foreach($books as $book)
            <div><a href="{{route('book.show', $book->id)}}">{{$book->id}} | {{ $book->title}}</a></div>
        @endforeach
    </div>
    <div class="mt-3">
        {{ $books->withQueryString()->links() }}
    </div>
@endsection

