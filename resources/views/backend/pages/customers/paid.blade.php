@extends('backend.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Customer Paid Report</h1>
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
                <h3>Paid Customer List
                  <a class="btn btn-success float-sm-right" href="{{ route('customer.paid.pdf') }}" target="_blank"><i class="fa fa-download"></i>Pdf Download</a>
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
              <th>Amount</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
      @php
        $i=1;
        $total_paid = 0;
      @endphp
            @foreach ($pdcustomer as $pcustomer)         
            <tr>
              <td>{{ $i++ }}</td>
              <td>{{ $pcustomer->customer->name }}({{ $pcustomer->customer->mobile_no }}-{{ $pcustomer->customer->address }})</td>
              <td>Invoice No#{{ $pcustomer['invoice']['invoice_no'] }}</td>
              <td>{{ date('d-m-Y', strtotime($pcustomer['invoice']['date'])) }}</td>
              <td>{{ $pcustomer->paid_amount }}</td>
              <td>
                <a title="Details" class="btn btn-sm btn-success" href="{{route('invoice.details.pdf', $pcustomer->invoice_id)}}" target="_blank"><i class="fa fa-eye"></i></a>
              </td>
              @php
                $total_paid += $pcustomer->paid_amount;
              @endphp               
            </tr>
            @endforeach
          </tbody>
        </table>
        <table class="table table-bordered table-hover">
          <tbody>
            <tr>
              <td colspan="5" style="text-align: right; font-weight: bold;">Grand Total</td>
              <td><strong>{{ $total_paid }} TK</strong></td>
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