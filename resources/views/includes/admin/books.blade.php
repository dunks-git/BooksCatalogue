<!-- Books Table -->
@error('id')
<p class="alert alert-danger">{{ $message }}</p>
@enderror
@error('author')
<p class="alert alert-danger">{{ $message }}</p>
@enderror
@error('title')
<p class="alert alert-danger">{{ $message }}</p>
@enderror
@error('genre')
<p class="alert alert-danger"> {{ $message }}</p>
@enderror
@error('price')
<p class="alert alert-danger">{{ $message }}</p>
@enderror
@error('publish_date')
<p class="alert alert-danger">{{ $message }}</p>
@enderror
@error('description')
<p class="alert alert-danger">{{ $message }}</p>
@enderror
@error('update')
<p class="alert alert-danger">{{ $message }}</p>
@enderror
<div>
    @if($books->count() >0 )

        <table class="edit">
            <colgroup>
                <col span="1" style="width: 5%;">
                <col span="1" style="width: 14%;">
                <col span="1" style="width: 23%;">
                <col span="1" style="width: 13%;">
                <col span="1" style="width: 5%;">
                <col span="1" style="width: 5%;">
                <col span="1" style="width: 25%;">
                <col span="1" style="width: 10%;">
            </colgroup>
            <thead>
            <tr>
                <th>
                    @php
                        echo implode('</th><th>', $editKeys);
                    @endphp
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
                <tr>
                    <form action="{{ route('admin.book.update', $book) }}" id="bookUpdateForm{{ $book->id }}" class="book-update-form"
                          method="post">
                        @csrf
                        @method('patch')
                        <input type="hidden" value="{{ $book->id }}" name="id">
                        <td>{{$book->id_prefix.$book->id}}</td>
                        <td><input type="text" class="form-control editable deletable" name="author"
                                   value="{{ $book->author }}"
                                   placeholder="Author" required readonly></td>
                        <td><textarea type="text" class="form-control editable deletable" name="title"
                                   placeholder="Title" required readonly>{{ $book->title }}</textarea></td>
                        <td><input class="form-control editable deletable" list="genreListOptions" name="genre"
                                   value="{{ $book->genre->title }}"
                                   placeholder="Type to search..." required readonly></td>
                        <td><input type="number" class="form-control editable deletable text-right" name="price"
                                   placeholder="0.00"
                                   min="0"
                                   step="0.01" value="{{ number_format(centsToPrice($book->price), 2) }}" required
                                   readonly></td>
                        <td><input type="date" class="form-control editable deletable" name="publish_date"
                                   value="{{ date('Y-m-d', strtotime($book->publish_date)) }}"
                                   placeholder="Publish date" required readonly></td>
                        <td><textarea class="form-control editable deletable" name="description"
                                      placeholder="Description" required
                                      readonly>{{ $book->description }}</textarea></td>
                    </form>

                    <td class="manage-cell deletable">
                        <div class="btn-toolbar manage-btn-container" role="toolbar">
                            <div class="manage-cell-left">
                                <button type="submit" form="bookUpdateForm{{ $book->id }}"
                                        class="btn btn-primary btn-sm ml-1 update-button">Save
                                </button>
                                <button
                                    class="btn btn-primary btn-sm ml-1 edit-button">Edit
                                </button>
                            </div>
                            <div class="manage-cell-right">
                                <form action=" {{ route('admin.book.destroy', $book ) }}" class="book-delete-form" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm ml-1 mr-1 delete-button">Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
        <datalist id="genreListOptions">
            @foreach($genres as $genre)
                <option value="{{ $genre->title }}"></option>
            @endforeach
        </datalist>
    @elseif($books->total() == 0)
        <div class="mt-3 alert alert-danger">No books found!</div>
    @else
        <div class="mt-3 alert alert-danger">No books found on page {{$books->currentPage()}}! The last page
            is {{$books->lastPage()}}</div>
    @endif
</div>
<div class="mt-3">
    {{ $books->withQueryString()->links() }}
</div>
<!-- /.books-table -->
