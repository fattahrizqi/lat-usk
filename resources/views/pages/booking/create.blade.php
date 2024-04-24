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
            <form action="/booking" method="post">
            @csrf
            <div class="form-group">
              <label for="book">Judul buku</label>
              <select id="book" name="book_id" class="form-control">
                <option selected hidden>Pilih buku</option>
                @foreach ($books as $book)
                <option value="{{ $book->id }}">{{ $book->title }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="user">Judul buku</label>
              <select id="user" name="user_id" class="form-control">
                <option selected hidden>Pilih member</option>
                @foreach ($members as $member)
                <option value="{{ $member->id }}">{{ $member->username }}</option>
                @endforeach
              </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Buat peminjaman</button>
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