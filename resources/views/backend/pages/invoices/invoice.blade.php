<html>
<head>
  <title>Invoice No</title>

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
              <td><strong>Invoice No#{{ $invoice->invoice_no }}</strong></td>
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
              <td width="45%"></td>
              <td>
                <u><strong><span style="font-size: 15px">Customer Invoice</span></strong></u>
              </td>
              <td width="30%"></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        @php
          $payment = App\Models\Payment::where('invoice_id', $invoice->id)->first();
        @endphp
        <table width="100%">
          <tbody>
            <tr>
              <td width="30%"><p><strong>Name :</strong>{{ $payment['customer']['name'] }}</p></td>
              <td width="30%"><p><strong>Mobile No :</strong>{{ $payment['customer']['mobile_no'] }}</p></td>
              <td width="40%"><p><strong>Address :</strong>{{ $payment['customer']['address'] }}</p></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <table border="1" width="100%" style="margin-bottom: 10px">
          <thead>
            <tr>
              <th>SL.</th>
              <th>Category</th>
              <th>Product Name</th>
              <th>Quantity</th>
              <th>Unit Price</th>
              <th>Total Price</th>
            </tr>
          </thead>
          <tbody>
            @php
              $total_sum = '0';
            @endphp
            @foreach($invoice['invoice_details'] as $key => $details)
            <tr class="text-center">             
              <td>{{ $key+1 }}</td>
              <td>{{ $details['category']['name'] }}</td>
              <td>{{ $details['product']['name'] }}</td>
              <td>{{ $details->selling_qty }}</td>
              <td>{{ $details->unit_price }}</td>
              <td>{{ $details->selling_price }}</td>
            </tr>
            @php
              $total_sum += $details->selling_price;
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
              <td style="width:40%;">
                <p style="text-align: center; margin-left: 20px;">Customer Signature</p>
              </td>
              <td style="width:20%"></td>
              <td style="width:40%;text-align: center;">
                <p style="text-align: center;">Seller Signature</p>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</body>
</html>