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
    <form method="post" action="{{route('row.update')}}">
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

                    <th><a href="#" class="addRow"><i class="glyphicon glyphicon-plus"></i></a></th>
                
                </tr>
            </thead>
            <tbody>
                       @php
                 $sum=0;
                @endphp
            @foreach ($redit as $item=>$val)
            <input type="hidden" name="order_id[]" value="{{ $val->id }}">
            <tr>
                
                <td><input type="text" name="product_name[]" value="{{ $val->product_name }}" class="form-control" required=""></td>
                <td><input type="text" name="brand[]" value="{{ $val->brand }}" class="form-control"></td>   
                <td><input type="text" name="quantity[]" value="{{ $val->quantity }}" class="form-control quantity" required=""></td>
                <td><input type="text" name="budget[]" value="{{ $val->budget }}" class="form-control budget"></td>
                <td><input type="text" name="amount[]"value="{{ $val->amount }}"  class="form-control amount"></td>
                <td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>
            </tr>
                            @php
                $sum +=$val->amount;
                @endphp
        @endforeach

            </tbody>
            <tfoot>
                 <tr>
                     <td style="border: none"></td>
                     <td style="border: none"></td>
                     <td style="border: none"></td>
                     <td>Total</td>
                     <td>{{$sum}}</td>

                     <td><b class="total"></b> </td>
                     <td><input type="submit" name="" value="Update" class="btn btn-success"></td>
                 </tr>
            </tfoot>
        </table>
    </div>
    </section>
    </form>



</div>


<script type="text/javascript">

    $('tbody').delegate('.quantity,.budget','keyup',function(){
        var tr=$(this).parent().parent();
        var quantity=tr.find('.quantity').val();
        //var stu_id= $(this).closest('tr').find('.stu_id').text();
        var budget=tr.find('.budget').val();
        var amount=(quantity*budget);
        tr.find('.amount').val(amount);
        total();
    });
    function total(){
        var total=0;
        $('.amount').each(function(i,e){
            var amount=$(this).val()-0;
        total +=amount;
    });
    $('.total').html(total+".00 tk");  
    }

    $('.addRow').on('click',function(){
        addRow();
    });
    function addRow()
    {
        var tr='<tr>'+
        '<td><input type="text" name="product_name[]" class="form-control" required=""></td>'+
        '<td><input type="text" name="brand[]" class="form-control"></td>'+
        '<td><input type="text" name="quantity[]" class="form-control quantity" required=""></td>'+
        '<td><input type="text" name="budget[]" class="form-control budget"></td>'+
        ' <td><input type="text" name="amount[]" class="form-control amount"></td>'+
        '<td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>'+
        '</tr>';
        $('tbody').append(tr);
    };
    $('.remove').live('click',function(){
        var last=$('tbody tr').length;
        if(last==1){
            alert("you can not remove last row");
        }
        else{
             $(this).parent().parent().remove();
        }
    
    });
</script>
</body>
</html>