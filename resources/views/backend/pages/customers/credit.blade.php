@extends('backend.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Credit Customer</h1>
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
                <h3>Credit Customer List
                  <a class="btn btn-success float-sm-right" href="{{ route('customer.credit.pdf') }}" target="_blank"><i class="fa fa-download"></i>Pdf Download</a>
                </h3>
              </div><!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>SL</th>
              <th>Customer Name</th>
              <th>Invoice No</th>
              <th>Date</th>
              <th>Due Amount</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            @php
              $total_due = 0;
              $i=1;
            @endphp
            @foreach ($crcustomer as $ccustomer)         
            <tr>
              <td>{{ $i++ }}</td>
              <td>{{ $ccustomer->customer->name }}({{ $ccustomer->customer->mobile_no }}-{{ $ccustomer->customer->address }})</td>
              <td>Invoice No#{{ $ccustomer->invoice->invoice_no }}</td>
              <td>{{ date('d-m-Y', strtotime($ccustomer->invoice->date)) }}</td>
              <td>{{ $ccustomer->due_amount }}</td>
              <td>
                <a title="Edit" class="btn btn-sm btn-primary" href="{{route('customer.edit.invoice', $ccustomer->invoice_id)}}"><i class="fa fa-edit"></i></a>
                <a title="Details" class="btn btn-sm btn-success" href="{{route('invoice.details.pdf', $ccustomer->invoice_id)}}" target="_blank"><i class="fa fa-eye"></i></a>
              </td>
              @php
                $total_due += $ccustomer->due_amount;
              @endphp              
            </tr>
            @endforeach
          </tbody>
        </table>
        <table class="table table-bordered table-hover">
          <tbody>
            <tr>
              <td colspan="5" style="text-align: right; font-weight: bold;">Grand Total</td>
              <td><strong>{{ $total_due }} TK</strong></td>
            </tr>
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