<!-- Create Book -->
<div id="create-block">
    <form action="{{ route('admin.book.store') }}" id="createForm" method="post">
        @csrf
        <table class="create">
            <colgroup>
                <col span="1" style="width: 8%;">
                <col span="1" style="width: 14%;">
                <col span="1" style="width: 21%;">
                <col span="1" style="width: 9%;">
                <col span="1" style="width: 6%;">
                <col span="1" style="width: 7%;">
                <col span="1" style="width: 30%;">
                <col span="1" style="width: 5%;">
            </colgroup>
            <thead>
            <tr>
                <th><label for="idCreate" class="form-label">Id</label></th>
                <th><label for="authorCreate" class="form-label">Author</label></th>
                <th><label for="titleCreate" class="form-label">Title</label></th>
                <th><label for="genreList" class="form-label">Genre</label></th>
                <th><label for="priceCreate" class="form-label">Price</label></th>
                <th><label for="publishDate" class="form-label">Publish date</label></th>
                <th><label for="descriptionCreate" class="form-label">Description</label></th>
                <th><label for="create" class="form-label">&nbsp;</label></th>
            </tr>
            </thead>
            <tbody>
            <tr class="tr-selected">
                <td><span>bk</span><span class="after-id-prefix"><input type="number" min=0 max=1000000
                                                                        class="form-control" id="idCreate" name="id"
                                                                        step="1"
                                                                        value="{{ old('id', 0) }}"></span>
                </td>
                <td><input type="text" class="form-control" id="authorCreate" name="author" required
                           value="{{ old('author') }}"
                           placeholder="Author">
                </td>
                <td><input type="text" class="form-control" id="titleCreate" name="title" required
                           value="{{ old('title') }}"
                           placeholder="Title">
                </td>
                <td>
                    <input class="form-control" list="genreListOptions" id="genreList" name="genre"
                           value="{{ old('genre') }}"
                           placeholder="Type to search...">
                    <datalist id="genreListOptions">
                        @foreach($genres as $genre)
                            <option value="{{ $genre->title }}"></option>
                        @endforeach
                    </datalist>
                </td>
                <td>
                    <input type="number" class="form-control text-right" id="priceCreate" name="price"
                           placeholder="0.00" required
                           min="0"
                           step="0.01" value="{{ old('price') }}">
                </td>
                <td>
                    <input type="date" class="form-control" id="publishDate" name="publish_date" required
                           value="{{ old('publish_date') }}"
                           placeholder="Publish date">
                </td>
                <td>
                    <textarea class="form-control" id="descriptionCreate" name="description" required
                              placeholder="Description">{{ old('description') }}</textarea>
                </td>

                <td style="align-items: center; align-content: center;">
                    <div class="btn-toolbar" role="toolbar">
                        <button type="submit" class="btn btn-primary " id="createBtn">Save</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
        <p class="mt-3 text-info"><strong style="color:red;">!</strong> If id 0 inserted id will be generated
            automatically, prefix bk will be
            used.</p>
    </form>
</div>
<!-- /.create-book -->
