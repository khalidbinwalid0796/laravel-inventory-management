<html>
<head>
  <title>Daily Invoice Report</title>

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
              <td width="25%"></td>
              <td>
                <u><strong><span style="font-size: 15px">Daily Invoice Report({{ date('Y-m-d', strtotime($start_date)) }} - {{ date('Y-m-d', strtotime($end_date)) }})</span></strong></u>
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