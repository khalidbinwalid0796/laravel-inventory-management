@extends('backend.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Customer Wise Report</h1>
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
                <h3>Select Criteria
                </h3>
              </div><!-- /.card-header -->
      <div class="card-body">
        <div class="row">
          <div class="col-sm-12 text-center">
            <strong>Customer Wise Credit Report</strong>
            <input type="radio" name="customer_wise_report" value="customer_wise_credit" 
            class="search_value">&nbsp;&nbsp;
            <strong>Customer Wise Paid Report</strong>
            <input type="radio" name="customer_wise_report" value="customer_wise_paid" 
            class="search_value">            
          </div>
        </div>
        <div class="show_credit" style="display:none;">
          <form method="GET" action="{{ route('customer.wise.credit.report') }}" id="customerCreditForm"
          target="_blank">
            <div class="form-row">
              <div class="col-sm-8">
                <label>Customer Name</label>
                <select name="customer_id" class="form-control select2">
                  <option value="">Select Customer</option>
                  @foreach($customers as $customer)
                  <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-sm-4" style="padding-top: 35px;">
                <button type="submit" class="btn btn-primary btn-sm">Search</button>
              </div>
            </div>
          </form>
        </div>

        <div class="show_paid" style="display:none;">
          <form method="GET" action="{{ route('customer.wise.paid.report') }}" id="customerPaidForm"
          target="_blank">
            <div class="form-row">
              <div class="col-sm-8">
                <label>Customer Name</label>
                <select name="customer_id" class="form-control select2">
                  <option value="">Select Customer</option>
                  @foreach($customers as $customer)
                  <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-sm-4" style="padding-top: 35px;">
                <button type="submit" class="btn btn-primary btn-sm">Search</button>
              </div>
            </div>
          </form>
        </div>        
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
    <script type="text/javascript">
      $(document).on('change','.search_value',function(){
        var search_value = $(this).val();
        if(search_value == 'customer_wise_credit'){
          $('.show_credit').show();
        }else{
          $('.show_credit').hide();
        }
        if(search_value == 'customer_wise_paid'){
          $('.show_paid').show();
        }else{
          $('.show_paid').hide();
        }        
      });      
  </script>
  <script>
  $(function () {
    $('.select2').select2();
    })
  </script>
@endsection