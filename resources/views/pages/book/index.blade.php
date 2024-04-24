@extends('layouts.main')

@section('main-content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>DataTables</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">DataTables</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="myTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Cover buku</th>
                  <th>Judul buku</th>
                  <th>Pengarang</th>
                  <th>Penerbit</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($books as $book)
                  <tr>
                    <td class="w-25"><img src="/storage/{{ $book->cover }}" alt="cover-buku" class="w-50"></td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->publisher }}</td>
                    <td>
                      <a href="/book/{{ $book->id }}" class="btn btn-info">Detail</a>
                      <a href="/book/{{ $book->id }}/edit" class="btn btn-warning">Edit</a>
                      <form action="/book/{{ $book->id }}" method="post">
                        @csrf
                        @method('delete')
                        
                        <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection