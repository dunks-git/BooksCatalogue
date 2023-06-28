@extends('layouts.main')
@section('title')
    Book {{ $book->id }}
@endsection
@section('content')
    <div>
        <table class="show">
            <thead>
            <tr>
                <th>
                    @php
                        echo implode('</th><th>', $showKeys);
                    @endphp
                </th>
            </tr>
            </thead>
            <tbody>

                <tr>
                    <td><span>{{$book->id_prefix}}</span><span>{{$book->id}}</span></td>
                    <td>{{$book->author}}</td>
                    <td>{{$book->title}}</td>
                    <td>{{$book->genre->title}}</td>
                    <td class="text-right">{{number_format(centsToPrice($book->price), 2)}}</td>
                    <td>{{ date('Y-m-d',strtotime($book->publish_date)) }}</td>
                    <td>{{$book->description}}</td>
                </tr>

            </tbody>
        </table>
    </div>
    @can('view', auth()->user())
    <div class="btn-toolbar" role="toolbar">
        <div class="btn-group mr-2" role="group">
            <a href=" {{ route('admin.book.edit', $book )}}">
                <button class="btn btn-outline-primary mt-3">Edit</button>
            </a>
        </div>
        <div class="btn-group mr-2" role="group">
            <form action=" {{ route('admin.book.destroy', $book ) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-outline-primary mt-3">Delete
                </button>
            </form>
        </div>
    </div>
    @endcan
    <p class="mt-3">
        <a href="{{ url()->previous() }}">&larr; Back</a>
    </p>
@endsection

