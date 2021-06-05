@extends('backend.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Customer</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Customer</li>
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
                <h3>Add Customer
                  <a class="btn btn-success float-sm-right" href="{{ route('customer.view') }}"><i class="fa fa-list"></i>Customer List</a>
                </h3>
              </div><!-- /.card-header -->
      <div class="card-body">
                  <form action="{{ route('customer.store') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="name">Customer Name</label>
              <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter Name">
            </div>

            <div class="form-group">
              <label for="mobile_no">Mobile No</label>
              <input type="text" class="form-control" name="mobile_no" id="email" aria-describedby="emailHelp" placeholder="Enter Email Name">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter Email Name">
            </div>
            <div class="form-group">
              <label for="email">Address</label>
              <input type="text" class="form-control" name="address" id="email" aria-describedby="emailHelp" placeholder="Enter Email Name">
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