@extends('backend.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Supplier</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Supplier</li>
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
                <h3>Edit Supplier
                  <a class="btn btn-success float-sm-right" href="{{ route('supplier.view') }}"><i class="fa fa-list"></i>Supplier List</a>
                </h3>
              </div><!-- /.card-header -->
      <div class="card-body">
                  <form action="{{ route('supplier.update',$supplier->id) }}" method="post">
            @csrf
            <div class="form-group">
              <label for="name">Supplier Name</label>
              <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" value="{{ $supplier->name }}">
            </div>
            <div class="form-group">
              <label for="mobile_no">Mobile No</label>
              <input type="text" class="form-control" name="mobile_no" id="mobile_no" aria-describedby="emailHelp" value="{{ $supplier->mobile_no }}">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" name="email" id="email" aria-describedby="emailHelp" value="{{ $supplier->email }}">
            </div>            
            <div class="form-group">
              <label for="address">Address</label>
              <input type="text" class="form-control" name="address" id="address" aria-describedby="addressHelp" value="{{ $supplier->address }}">
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