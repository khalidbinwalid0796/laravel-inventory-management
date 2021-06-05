@extends('backend.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
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
                <h3>Add Product
                  <a class="btn btn-success float-sm-right" href="{{ route('product.view') }}"><i class="fa fa-list"></i>Product List</a>
                </h3>
              </div><!-- /.card-header -->
      <div class="card-body">
            <form action="{{ route('product.store') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="exampleInputPassword1">Supplier Name</label>
              <select class="form-control" name="supplier_id">
                <option value="">Select Supplier</option>
                @foreach($suppliers as $supplier)
                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Unit Name</label>
              <select class="form-control" name="unit_id">
                <option value="">Select Unit</option>
                @foreach($units as $unit)
                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Category Name</label>
              <select class="form-control" name="category_id">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="name">Product Name</label>
              <input type="text" class="form-control" name="name" id="name" aria-describedby="addressHelp" placeholder="Enter Product Name">
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