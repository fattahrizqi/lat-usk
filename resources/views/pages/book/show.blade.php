@extends('layouts.main')

@section('main-content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>E-commerce</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">E-commerce</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card card-solid">
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-sm-5">
            <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
            <div class="col-12">
              <img src="/storage/{{ $book->cover }}" class="product-image" alt="Product Image">
            </div>
          </div>
          <div class="col-12 col-sm-7">
            <h3 class="my-3">{{ $book->title }}</h3>
            <p>{{ $book->description }}</p>

            <hr>
            <h4>Selengkapnya</h4>
            <p>Pengarang : {{ $book->author }}</p>
            <p>Publisher : {{ $book->publisher }}</p>
            <p>Stok tersedia : {{ $stock_available }}</p>

          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
@endsection