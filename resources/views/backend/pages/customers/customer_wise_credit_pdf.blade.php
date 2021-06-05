<html>
<head>
  <title>Customer Wisw Credit Report Pdf</title>

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
                <u><strong><span style="font-size: 15px">Customer Wisw Credit Report Pdf</span></strong></u>
              </td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

<div class="row">
  <div class="col-md-12">
    <table border="1" width="100%">
    <thead>
      <tr>
        <th>SL</th>
        <th>Customer Name</th>
        <th>Invoice No</th>
        <th>Date</th>
        <th>Amount</th>
      </tr>
    </thead>

    <tbody>
      @php
        $i=1;
        $total_due = 0;
      @endphp
            @foreach ($allData as $ccustomer)         
            <tr>
              <td>{{ $i++ }}</td>
              <td>{{ $ccustomer->customer->name }}({{ $ccustomer->customer->mobile_no }}-{{ $ccustomer->customer->address }})</td>
              <td>Invoice No#{{ $ccustomer->invoice->invoice_no }}</td>
              <td>{{ date('d-m-Y', strtotime($ccustomer->invoice->date)) }}</td>
              <td>{{ $ccustomer->due_amount }}</td> 
              @php
                $total_due += $ccustomer->due_amount;
              @endphp           
            </tr>
            @endforeach
          <tr> 
            <td colspan="4" style="text-align: right;"><strong>Grand Total</strong></td>
            <td>{{ $total_due }}</td>
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