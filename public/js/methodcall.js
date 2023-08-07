$('#product_name').on('change', function() {
    
    var  product_id = $('#product_name').val();

    $.ajax({
        type:'post',
        url:'/get_product_detail',
        data:{ 
                "product_id": product_id, 
                "_token": $('meta[name="csrf-token"]').attr('content'),
            },
        success:function(data){
            console.log(data);
            if(data != ""){
                $("#rate").val(data.rate);
                $("#unit").val(data.unit);
            }
        }
    });

});

$('#discount, #qty').keyup(function() {
    
    var discount = $("#discount").val();
    var product_price = $("#rate").val();
    var netamount;
    var checkqty = $("#qty").val();

    if(discount != ""){
        var netamount_discount = (product_price * discount) / 100;
        netamount = product_price - netamount_discount;
        $("#net_amount").val(netamount);
    }
    var checknetamount = $("#net_amount").val();
    if(checknetamount != ""){
        var totalamount = checkqty * netamount;
        $("#total_amount").val(totalamount);
    }

});



$('#submit').on('click', function() {
    
    var customer_name = $('#customer_name').val();
    var rate = $('#rate').val();
    var product_name = $('#product_name').val();
    var unit = $('#unit').val();
    var qty = $('#qty').val();
    var discount = $('#discount').val();
    var net_amount = $('#net_amount').val();
    var total_amount = $('#total_amount').val();

    $.ajax({
        type:'post',
        url:'/data_store_session',
        data:{ 
                "customer_name": customer_name,
                "rate": rate, 
                "product_name": product_name,
                "unit": unit,
                "qty": qty,
                "discount": discount,
                "net_amount": net_amount,
                "total_amount": total_amount,
                "_token": $('meta[name="csrf-token"]').attr('content'),
            },
        success:function(data){
            console.log(data);
        }
    });

});
