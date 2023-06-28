<!-- Errors -->
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
@error('create')
<p class="alert alert-danger">{{ $message }}</p>
@enderror
@error('update')
<p class="alert alert-danger">{{ $message }}</p>
@enderror
<!-- /.errors -->
