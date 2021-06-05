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
                <h3>Product List
                  <a class="btn btn-success float-sm-right" href="{{ route('product.create') }}"><i class="fa fa-plus-circle"></i>Add Product</a>
                </h3>
              </div><!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-hover"  >
          <thead>
            <tr>
              <th>SL</th>
              <th>Supplier Name</th>
              <th>Category</th>
              <th>Name</th>
              <th>Unit</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            @php
            $i=1;
            @endphp
            @foreach ($products as $product)
            <tr>
              <td>{{ $i++ }}</td>
              <td>{{ $product->supplier->name }}</td>
              <td>{{ $product->category->name }}</td>
              <td>{{ $product->name }}</td>
              <td>{{ $product['unit']['name'] }}</td>
              @php
                $count_product = App\Models\Purchase::where('product_id',$product->id)->count();
              @endphp               
              <td>
                <a title="Edit" class="btn btn-sm btn-primary" href="{{ route('product.edit', $product->id) }}"><i class="fa fa-edit"></i></a>

              @if($count_product<1)
                <a href="#deleteModal{{ $product->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>

                  <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{!! route('product.delete', $product->id) !!}"  method="post">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger">Permanent Delete</button>
                          </form>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                      </div>
                    </div>
                  </div> 
                  @endif                 
              </td>
            </tr>
            @endforeach
          </tbody>

        </table>
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