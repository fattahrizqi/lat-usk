@extends('layouts.main')

@section('main-content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Project Add</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Project Add</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">General</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <form action="/book/{{ $book->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
              <label for="cover">Cover buku</label>
              <input type="file" id="cover" name="cover" class="form-control" value="{{ $book->cover }}">
            </div>
            <div class="form-group">
              <label for="title">Judul buku</label>
              <input type="text" id="title" name="title" class="form-control" value="{{ $book->title }}">
            </div>
            <div class="form-group">
              <label for="category">Genre buku</label>
              <select id="category" name="category_id" class="form-control">
                @foreach ($categories as $category)
                @if ($category->id == $book->category_id)                    
                <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                @else
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="author">Pengarang</label>
              <input type="text" id="author" name="author" class="form-control" value="{{ $book->author }}">
            </div>
            <div class="form-group">
              <label for="publisher">Penerbit</label>
              <input type="text" id="publisher" name="publisher" class="form-control" value="{{ $book->publisher }}">
            </div>
            <div class="form-group">
              <label for="stock">Stok</label>
              <input type="number" id="stock" name="stock" class="form-control" value="{{ $stock_total }}">
            </div>
            <div class="form-group">
              <label for="publisher">Deskripsi</label>
              <textarea id="description" name="description" class="form-control">{{ $book->description }}</textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Buat</button>
            </form>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <div class="col-md-4">
        <div class="card card-secondary">
          <div class="card-header">
            <h3 class="card-title">Budget</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            tes
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
@endsection