@extends('layouts.admin')

@section('script')
    <script src="{{ asset('js/admin_books_index.js') }}"></script>
@endsection

@section('content')
    <!-- Books Table -->
    @include('includes.admin.books')
    <!-- /.books-table -->

    <!-- Manage Books -->
    @include('includes.admin.manage')
    <!-- /.manage-books -->
@endsection
