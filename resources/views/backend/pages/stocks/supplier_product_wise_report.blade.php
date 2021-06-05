@extends('backend.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Supplier/Product Wise Stock</h1>
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
            <strong>Supplier Wise Report</strong>
            <input type="radio" name="supplier_product_wise" value="supplier_wise" 
            class="search_value">&nbsp;&nbsp;
            <strong>Product Wise Report</strong>
            <input type="radio" name="supplier_product_wise" value="product_wise" 
            class="search_value">            
          </div>
        </div>
        <div class="show_supplier" style="display:none;">
          <form method="GET" action="{{ route('stock.report.supplier.wise.pdf') }}" target="_blank" id="supplierWiseForm">
            <div class="form-row">
              <div class="col-sm-8">
                <label>Supplier Name</label>
                <select name="supplier_id" class="form-control select2">
                  <option value="">Select Supplier</option>
                  @foreach($suppliers as $supplier)
                  <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-sm-4" style="padding-top: 35px;">
                <button type="submit" class="btn btn-primary btn-sm">Search</button>
              </div>
            </div>
          </form>
        </div>

        <div class="show_product" style="display:none;">
          <form method="GET" action="{{ route('stock.report.product.wise.pdf') }}" target="_blank" id="productWiseForm" target="_blank">
            <div class="form-row">
              <div class="col-sm-4">
                <label>Category Name</label>
                <select name="category_id" id="category_id" class="form-control select2">
                  <option value="">Select Category</option>
                  @foreach($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-sm-6">
                <label>Product Name</label>
                <select name="product_id" id="product_id" class="form-control select2">
                  <option value="">Select Product</option>
                </select>
              </div>
              <div class="col-sm-2" style="padding-top: 35px;">
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
        if(search_value == 'supplier_wise'){
          $('.show_supplier').show();
        }else{
          $('.show_supplier').hide();
        }
        if(search_value == 'product_wise'){
          $('.show_product').show();
        }else{
          $('.show_product').hide();
        }        
      });      
  </script>
  <script>
  $(function () {
    $('.select2').select2();
    })
  </script>
  <script type="text/javascript">
    $(function(){
      $(document).on('change','#category_id',function(){
        var category_id = $(this).val();
        $.ajax({
          url:"{{route('get-product')}}",
          type:"GET",
          data:{category_id:category_id},
          success:function(data){
            var html = '<option value="">Select Product</option>';
            $.each(data,function(key,v){
              html +='<option value="'+v.id+'">'+v.name+'</option>';
            });
            $('#product_id').html(html);
          }
        });
      });
    });
  </script>
@endsection