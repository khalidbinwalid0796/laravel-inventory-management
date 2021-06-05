@extends('backend.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3>Edit User
                  <a class="btn btn-success float-sm-right" href="{{ route('user.view') }}"><i class="fa fa-list"></i>User List</a>
                </h3>
              </div><!-- /.card-header -->
      <div class="card-body">
                  <form action="{{ route('user.update', $user->id) }}" method="post">
            @csrf
            <div class="form-group">
              <label for="exampleInputPassword1">User Role</label>
              <select class="form-control" name="usertype">
                <option value="">Select Role</option>
                <option value="Admin"{{ ($user->usertype=="Admin")? "selected":"" }}>Admin</option>
                <option value="User"{{ ($user->usertype=="User")? "selected":"" }}>User</option>
              </select>
            </div>
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" value="{{ $user->name }}">
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" name="email" id="email" aria-describedby="emailHelp" value="{{ $user->email }}">
            </div>
           <button type="submit" class="btn btn-primary">update</button>
          </form>
      </div>
            </div>
            <!-- /.card -->
          </section>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection