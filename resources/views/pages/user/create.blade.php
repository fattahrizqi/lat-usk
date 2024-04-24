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
            <form action="/user" method="post">
            @csrf
            <div class="form-group">
              <label for="name">Nama</label>
              <input type="text" id="name" name="name" class="form-control">
            </div>
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" id="username" name="username" class="form-control">
            </div>
            <div class="form-group">
              <label for="nisn">Nisn</label>
              <input type="number" id="nisn" name="nisn" class="form-control">
            </div>
            <div class="form-group">
              <label for="role">Role user</label>
              <select id="role" name="role" class="form-control">
                <option selected hidden>Pilih role</option>
                <option value="admin">admin</option>
                <option value="librarian">pustakawan</option>
                <option value="member">member</option>
              </select>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="text" id="password" name="password" class="form-control">
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