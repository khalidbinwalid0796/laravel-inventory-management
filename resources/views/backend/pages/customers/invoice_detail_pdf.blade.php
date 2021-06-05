<html>
<head>
  <title>Invoice Pdf Details</title>

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
              <td><strong>Invoice No: #
              {{ $payment['invoice']['invoice_no'] }}</strong></td>
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
              <td width="38%"></td>
              <td>
                <u><strong><span style="font-size: 15px">Customer Invoice Details</span></strong></u>
              </td>
              <td width="30%"></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <table width="100%">
          <tbody>
            <tr>
              <td colspan="3"><strong>Customer Info</strong></td>
            </tr>
            <tr>
              <td width="30%"><strong>Name : </strong>{{ $payment['customer']['name'] }}</td>
              <td width="30%"><strong>Mobile : </strong>{{ $payment['customer']['mobile_no'] }}</td>
              <td width="40%"><strong>Address : </strong>{{ $payment['customer']['address'] }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

<div class="row">
  <div class="col-md-12">
      <table border="1" width="100%" style="margin-bottom: 10px">
    <thead>
      <tr class="text-center">
        <th>SL</th>
        <th>Category</th>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Unit Price</th>
        <th>Total Price</th>
      </tr>
    </thead>

    <tbody>
      @php
      $i=1;
      $total_sum = 0;
      $invoice_details = App\Models\InvoiceDetail::where('invoice_id',$payment->invoice_id)->get();
      @endphp
      @foreach ($invoice_details as $details)
      <tr>
        <td>{{ $i++ }}</td>
        <td>{{ $details->category->name }}</td>
        <td>{{ $details->product->name }}</td>
        <td>{{ $details->selling_qty }}</td>
        <td>{{ $details->unit_price }}</td>
        <td>{{ $details['selling_price'] }}</td>
      </tr>
      @php
        $total_sum +=  $details->selling_price;
      @endphp
      @endforeach
      <tr>
        <td colspan="5" class="text-right"><strong>Sub Total</strong></td>
        <td class="text-center"><strong>{{$total_sum}}</strong></td>
      </tr>
      <tr>
        <td colspan="5" class="text-right"><strong>Discount</strong></td>
        <td class="text-center"><strong>{{$payment->discount_amount}}</strong></td>
      </tr>
      <tr>
        <td colspan="5" class="text-right"><strong>Paid Amount</strong></td>
        <td class="text-center"><strong>{{$payment->paid_amount}}</strong></td>
      </tr>
      <tr>
        <td colspan="5" class="text-right"><strong>Due Amount</strong></td>
        <td class="text-center"><strong>{{$payment->due_amount}}</strong></td>
      </tr>
      <tr>
        <td colspan="5" class="text-right"><strong>Grand Total</strong></td>
        <td class="text-center"><strong>{{$payment->total_amount}}</strong></td>
      </tr>
      @php
        $payment_details = App\Models\PaymentDetail::where('invoice_id',$payment->invoice_id)->get();
      @endphp
      @foreach ($payment_details as $dtl)
        <tr>
          <td colspan="3" style="text-align: right;">
            {{ date('d-m-Y',strtotime($dtl->date)) }}
          </td>
          <td colspan="3">
            {{ $dtl->current_paid_amount }}  
          </td>
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