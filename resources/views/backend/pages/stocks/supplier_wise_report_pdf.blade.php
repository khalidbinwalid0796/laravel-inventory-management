<html>
<head>
  <title>Supplier Wise Stock Report</title>

  <style>

  </style>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <table width="100%">
          <tbody>
            <tr>
              <td width="25%"></td>
              <td>
                <span style="font-size: 20px; background: #1781BF;padding: 3px 10px 10px; color: #fff;">Mita Shopping Mall</span><br>Uttra-badda, dhaka
              </td>
              <td>
                <span>
                  Showroom No : 01710659888<br>
                  Owner No : 01915867739
                </span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <hr style="margin-bottom: 0px;">
        <table>
          <tbody>
            <tr>
              <td width="50%"></td>
              <td>
                <u><strong><span style="font-size: 15px">Supplier Wise Stock Report</span></strong></u>
              </td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

<div class="row">
  <div class="col-md-12">
    <strong>Supplier Name : </strong>{{ $suppliers['0']->supplier->name }}
      <table border="1" width="100%">
    <thead>
      <tr>
        <th>SL</th>
        <th>Category</th>
        <th>Product Name</th>
        <th>In. Qty</th>
        <th width="14%">Out. Qty</th>
        <th>Stock</th>
        <th>Unit</th>
      </tr>
    </thead>

    <tbody>
      @php
      $i=1;
      @endphp
      @foreach ($suppliers as $supplier)
      @php
        $buying_total = App\Models\Purchase::where('category_id',$supplier->category_id)
        ->where('product_id',$supplier->id)->where('status','1')->sum('buying_qty');
        $selling_total = App\Models\InvoiceDetail::where('category_id',$supplier->category_id)
        ->where('product_id',$supplier->id)->where('status','1')->sum('selling_qty');
      @endphp
      <tr>
        <td>{{ $i++ }}</td>
        <td>{{ $supplier->category->name }}</td>
        <td>{{ $supplier->name }}</td>
        <td>{{ $buying_total }}</td>
        <td>{{ $selling_total }}</td>        
        <td>{{ $supplier->quantity }}</td>
        <td>{{ $supplier['unit']['name'] }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @php
    $date = new DateTime('now', new DateTimezone('Asia/Dhaka'));
  @endphp
  <i>Printing time : {{ $date->format('F j, Y, g:i a') }}</i>
  </div>
</div>
<br>
    <div class="row">
      <div class="col-md-12">
        <hr style="margin-bottom: 0px;">
        <table border="0" width="100%">
          <tbody>
            <tr>
              <td style="width:40%"></td>
              <td style="width:20%"></td>
              <td style="width:40%;text-align: center;">
                <p style="text-align: center; border-bottom: 1px solid #000;">Owner Signature</p>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</body>
</html>