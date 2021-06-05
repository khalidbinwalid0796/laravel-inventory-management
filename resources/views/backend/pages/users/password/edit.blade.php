@extends('backend.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Password</h1>
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
                <h3>Edit Password
                </h3>
              </div><!-- /.card-header -->
      <div class="card-body">
                  <form action="{{ route('password.update') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="current_password">Current Password</label>
              <input type="password" class="form-control" name="current_password" id="current_password" aria-describedby="emailHelp" placeholder="Enter Current Password">
            </div>
            <div class="form-group">
              <label for="new_password">New Password</label>
              <input type="password" class="form-control" name="new_password" id="new_password" aria-describedby="emailHelp" placeholder="Enter New Password">
            </div>            
            <div class="form-group">
              <label for="again_new_password">Again New Password</label>
              <input type="password" class="form-control" name="again_new_password" id="again_new_password" aria-describedby="emailHelp" placeholder="Again New Password">
            </div>
           <button type="submit" class="btn btn-primary">submit</button>
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