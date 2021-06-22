<!DOCTYPE html>
<html>
<head>
    <title>Multiple data send using laravel collective package</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js">
    </script>
</head>
<body>
<div class="container">
    <form method="post" action="{{route('row.store')}}">
        @csrf
    <section>
     <div class="panel panel-header">
         <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="customer_name" class="form-control" placeholder="Please enter your name">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="customer_address" class="form-control" placeholder="Please enter your Address">
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-footer" >
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Brand</th>
                    <th>Quantity</th>
                    <th>Budget</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @php
                 $sum=0;
                @endphp
                @foreach ($invoices as $invoice)
            <tr>
                <td>{{ $invoice->product_name }}</td>
                <td>{{ $invoice->brand }}</td>
                <td>{{ $invoice->quantity }}</td>
                <td>{{ $invoice->budget }}</td>
                <td>{{ $invoice->amount }}</td>
            </tr>
                @php
                $sum +=$invoice->amount;
                <!-- As all id are same, catch the last id -->
                $id=$invoice->orders_id;
                @endphp
                
             @endforeach
            <tr>
                <td>
                total
                </td>
                <td>{{ $sum }}</td>
            </tr>
            </tbody>
                        <td>
                <a title="Edit" class="btn btn-sm btn-primary" href="{{ route('row.edit', $id) }}">Edit</a>
            </td>
        </table>
    </div>
    </section>
    </form>
</div>

</body>
</html>