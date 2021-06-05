@extends('backend.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Purchase</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Purchase</li>
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
                <h3>Pending Purchase List
<!--                   <a class="btn btn-success float-sm-right" href="{{ route('purchase.create') }}"><i class="fa fa-plus-circle"></i>Add Purchase</a> -->
                </h3>
              </div><!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-hover"  >
          <thead>
            <tr>
              <th>SL</th>
              <th>Purchase No</th>
              <th>Date</th>
              <th>Supplier Name</th>
              <th>Category</th>
              <th>Product Name</th>
              <th>Description</th>
              <th>Quantity</th>
              <th>Unit Price</th>
              <th>Buying Price</th>
              <th>Status</th>
              <th style="width: 12%">Action</th>
              <th></th>
            </tr>
          </thead>

          <tbody>
            @php
            $i=1;
            @endphp
            @foreach ($purchases as $purchase)
            <tr>
              <td>{{ $i++ }}</td>
              <td>{{ $purchase->purchase_no }}</td>
              <td>{{ date('d-m-Y', strtotime($purchase->date)) }}</td>
              <td>{{ $purchase->supplier->name }}</td>
              <td>{{ $purchase->category->name }}</td>
              <td>{{ $purchase['product']['name'] }}</td>
              <td>{{ $purchase->description }}</td>
              <td>
                {{ $purchase->buying_qty }}
                {{ $purchase['product']['unit']['name'] }}
              </td>
              <td>{{ $purchase->unit_price }}</td>
              <td>{{ $purchase->buying_price }}</td>
              <td>
                @if($purchase->status=='0')
                <span style="background: #FC4236; padding: 5px;">Pending</span>
                @elseif($purchase->status=='1')
                <span style="background: #5EAB00; padding: 5px;">Approved</span>
                @endif 
              </td>
              <td>

                @if($purchase->status=='0')
                <a href="#approveModal{{ $purchase->id }}" data-toggle="modal" class="btn btn-danger">approve</a>

                  <div class="modal fade" id="approveModal{{ $purchase->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are sure to approve?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{!! route('purchase.approve', $purchase->id) !!}"  method="post">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger">approve</button>
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