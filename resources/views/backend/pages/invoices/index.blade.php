@extends('backend.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Invoice</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
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
                <h3>Invoice List
                  <a class="btn btn-success float-sm-right" href="{{ route('invoice.create') }}"><i class="fa fa-plus-circle"></i>Add Invoice</a>
                </h3>
              </div><!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-hover"  >
          <thead>
            <tr>
              <th>SL</th>
              <th>Customer Name</th>
              <th>Invoice No</th>
              <th>Date</th>
              <th>Description</th>
              <th>Total Amount</th>
            </tr>
          </thead>

          <tbody>
            @php
            $i=1;
            @endphp
            @foreach ($invoices as $invoice)            
            <tr>
              <td>{{ $i++ }}</td>
              <td> 
                {{ $invoice['payment']['customer']['name'] }}
                ({{ $invoice['payment']['customer']['mobile_no'] }}-{{ $invoice['payment']['customer']['address'] }})
              </td>
              <td>Invoice No #{{ $invoice->invoice_no }}</td>
              <td>{{ date('d-m-Y', strtotime($invoice->date)) }}</td>
              <td>{{ $invoice->description }}</td>
              <td>{{ $invoice->payment->total_amount }}</td>
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