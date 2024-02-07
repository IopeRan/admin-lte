@extends('layouts.main')

@section('container')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{ $countUser }}</h3>

              <p>User Registrations</p>
            </div>
            <a href="/create" class="icon">
              <i class="ion ion-person-add"></i>
            </a>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row p-2">
        <table class="table text-center">
          <thead class="table-dark">
            <th>ID</th>
            <th>Fullname</th>
            <th>Username</th>
            <th>Action</th>
          </thead>
          <tbody class="table-light">
            @foreach($users as $user)
            <tr>
              <td>{{ $user->id }}</td>
              <td>{{ $user->username }}</td>
              <td>{{ $user->fullname }}</td>
              <td>
                <a href="/product/{{ $user->id }}/edit" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="/delete/" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div>
        </div>
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
@endsection
