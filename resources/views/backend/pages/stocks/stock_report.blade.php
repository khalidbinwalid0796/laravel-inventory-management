@extends('backend.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Stock</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Stock</li>
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
                <h3>Stock List
                  <a class="btn btn-success float-sm-right" href="{{ route('stock.report.pdf') }}" target="_blank"><i class="fa fa-download"></i>Pdf Download</a>
                </h3>
              </div><!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-hover"  >
          <thead>
            <tr>
              <th>SL</th>
              <th>Supplier Name</th>
              <th>Category</th>
              <th>Product Name</th>
              <th>In. Qty</th>
              <th>Out. Qty</th>
              <th>Stock</th>
              <th>Unit</th>
            </tr>
          </thead>

          <tbody>
            @php
              $i=1;
            @endphp
            @foreach ($stocks as $stock)
            @php
              $buying_total = App\Models\Purchase::where('category_id',$stock->category_id)
              ->where('product_id',$stock->id)->where('status','1')->sum('buying_qty');
              $selling_total = App\Models\InvoiceDetail::where('category_id',$stock->category_id)
              ->where('product_id',$stock->id)->where('status','1')->sum('selling_qty');
            @endphp           
            <tr>
              <td>{{ $i++ }}</td>
              <td>{{ $stock->supplier->name }}</td>
              <td>{{ $stock->category->name }}</td>
              <td>{{ $stock->name }}</td>
              <td>{{ $buying_total }}</td>
              <td>{{ $selling_total }}</td>
              <td>{{ $stock->quantity }}</td>
              <td>{{ $stock['unit']['name'] }}</td>
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