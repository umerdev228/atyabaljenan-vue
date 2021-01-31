$(document).ready(function(e){

$(document).on('click','.btn-plus',function (e) {
    var productid=$(this).attr('data-product-id');

    var id=$(this).attr('data-id');
    var qty=parseInt($(this).attr('data-qty'));
    var stock=parseInt($(this).attr('data-stock'));
    var price=$(this).attr('data-price');
    var manageStock=$(this).attr('data-manage-stock');
    var itemTotal=$(this).attr('data-item-total');
    var isVareint=$(this).attr('data-is-variant');
    $(this).parent().children().eq(0).attr('data-qty',qty+1);
    $(this).attr('data-qty',qty+1)
    $(this).parent().children().eq(1).text(qty+1);
    var currencySymbol=$('.currency_symbol').val()
    $(this).parent().parent().children().eq(1).text(currencySymbol+' '+((price*(qty+1)).toFixed(2)));

    if (isVareint==='yes'){
        addVariant(productid,id,qty+1,price);
    }else {
        addCart(id,qty+1,price);

    }


});
    $(document).on('click','.btn-minus',function (e) {
        var productid=$(this).attr('data-product-id');
        var id=$(this).attr('data-id');
        var qty=parseInt($(this).attr('data-qty'));
        var stock=$(this).attr('data-stock');
        var price=$(this).attr('data-price');
        var manageStock=$(this).attr('data-manage-stock');
        var itemTotal=$(this).attr('data-item-total');
        var isVareint=$(this).attr('data-is-variant');
        $(this).attr('data-qty',qty-1)
        if ((qty-1)<1){
            toastr.error('','You cannot less then 1');
            return;
        }

        $(this).parent().children().eq(2).attr('data-qty',qty-1);
        $(this).parent().children().eq(1).text(qty-1);
        var currencySymbol=$('.currency_symbol').val()
        $(this).parent().parent().children().eq(1).text(currencySymbol + ' '+((price*(qty-1)).toFixed(2)));

        if (isVareint==='yes') {
            addVariant(productid,id,qty-1,price);
        }else {
            addCart(id, qty - 1, price);

        }
        var qty=parseInt($('.btn-minus').attr('data-qty'));
        if(qty<2) {
            toastr.error('','You cannot add below 1');
            $(".btn-minus").attr("disabled", true);
        }

    })



    function addCart(id,qty,price) {
        var notes=$('#notes').val();
        $.ajax({
            url:HOST_URL+'/addcart',
            type:'get',
            data:{'id':id,'qty':qty,'note':notes},
            success:function(data){
                console.log(data);
                updateTotals();
                toastr.success('','Item Added Successfully');
                },
            error:function(err){
                console.log(err.responseText);
            }

        })

    }

    function addVariant(productid,id,qty,price) {
        $.ajax({
            url:HOST_URL+'/addcartvariant',
            type:'get',
            data:{'id'

                    :id,'qty':qty,'product_id':productid},
            success:function(data){
                console.log(data);
                updateTotals();

            },
            error:function(err){
                console.log(err.responseText);
            }

        })

    }
    function updateTotals() {

        var subtotal=0;
        var currencySymbol=$('.currency_symbol').val();
        var deliveryCharges=parseFloat($('.delivery_charges').attr('data-charges'));
        var promo_discount=parseFloat($('.promo-amount').attr('data-promo-amount'));
        $('.btn-plus').each(function(e){
            subtotal+=parseFloat($(this).attr('data-qty'))*parseFloat($(this).attr('data-price'));
        });
        $('.subtotal').text(currencySymbol+' '+(subtotal.toFixed(2)));
        if (promo_discount){
            $('.grand-total').text(currencySymbol+' '+((subtotal+deliveryCharges-promo_discount).toFixed(2)))

        }else {
            $('.grand-total').text(currencySymbol+' '+((subtotal+deliveryCharges).toFixed(2)))

        }


    }

    function addVariant(productid,id,qty,price,note) {
        $.ajax({
            url:HOST_URL+'/addcartvariant',
            type:'get',
            data:{'id':id,'qty':qty,'product_id':productid,'note':note},
            success:function(data){
                console.log(data);
                updateTotals();
            },
            error:function(err){
                console.log(err.responseText);
            }
        })
    }


});
