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
                  <th>Judul buku</th>
                  <th>Pengarang</th>
                  <th>Peminjam</th>
                  <th>Penanggungjawab</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($bookings as $booking)
                  <tr>
                    <td>{{ $booking->book->title }}</td>
                    <td>{{ $booking->book->author }}</td>
                    <td>{{ $booking->user->username }}</td>
                    <td>{{ $booking->admin->username }}</td>
                    <td>
                      @if ($booking->return_date)
                          Dikembalikan
                      @else
                          Dipinjam
                      @endif
                    </td>
                    <td>
                      <a href="/booking/{{ $booking->id }}" class="btn btn-info">Detail</a>
                      <form action="/booking/{{ $booking->id }}" method="POST">
                      @csrf
                      @method('put')
                      <button type="submit" class="btn btn-primary">Kembalikan</button>
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