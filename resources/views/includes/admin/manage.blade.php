<!-- Create Book -->
@include('includes.admin.create')
<!-- /.create-book -->

<!-- Errors -->
@include('includes.admin.errors')
<!-- /.errors -->

<!-- Manage Books -->
<p class="mt-3 alert alert-success" id="success"></p>
<div class="mt-3 alert alert-danger" id="invalid" style="display:none"></div>
<div class="btn-toolbar mt-3" role="toolbar">
    <div class="btn-group mr-2" role="group">
        <a href=" {{ route('admin.book.create' )}}">
            <button class="btn btn-outline-primary mt-3" id="newBtn">New</button>
        </a>
    </div>
    <div class="btn-group mr-2" role="group">
        <button class="btn btn-outline-primary mt-3" id="hideNewBtn">Hide New</button>
    </div>
    <div class="btn-group mr-2" role="group">
        <form action=" {{ route('admin.book.import') }}" method="post" id="import">
            @csrf
            @method('put')
            <button type="submit" class="btn btn-outline-primary mt-3" id="importBtn">Import from public/xml/books.xml
            </button>
        </form>
    </div>
</div>
@error('import')
<p class="mt-3 text-danger">{{ $message }}</p>
@enderror

<!-- /.manage-books -->
