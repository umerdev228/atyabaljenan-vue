$(document).ready(function(e){
   $(document).on('click','.order-btn',function(e){
       // e.preventDefault();
       // console.log('Clicked Button');
       var qty=parseInt($('.product-qty').attr('data-qty'));
       var isStock=$('.product-price-main').attr('data-is-stock');
       var id=$('.product-price-main').attr('data-id');
       var price=0;


       var stock=parseInt($('.product-price-main').attr('data-stock'))
       if (isStock=='yes' && (qty)>stock){
           toastr.error('','Sorry You cannot add more');
       }else {
           $('.product-qty').text(qty);
           $('.product-qty').attr('data-qty', qty );

           if (isHasVarient()) {
               if (isAtleastOneVariantChecked()) {
                   price = parseFloat($('.varient-check:checked').attr('data-price'));
               }

           } else {
               price = parseFloat($('.product-price-main').attr('data-price'));

           }
           updateProductPrice(id,qty,price);
           toastr.success('','Quantity Updated Successfully');
       }

   });

    var productTotal=0;
    $('.add-item').click(function(e){

        var qty=parseInt($('.product-qty').attr('data-qty'));
        var isStock=$('.product-price-main').attr('data-is-stock');
        var id=$('.product-price-main').attr('data-id');
        var price=0;


        var stock=parseInt($('.product-price-main').attr('data-stock'))
        if (isStock=='yes' && (qty+1)>stock){
            toastr.error('','Sorry You cannot add more');
        }else {
            $('.product-qty').text(qty+1);
            $('.product-qty').attr('data-qty',qty+1);

            if(isHasVarient()){
                if (isAtleastOneVariantChecked()){
                    price=parseFloat($('.varient-check:checked').attr('data-price'));
                }

            }else {
                price=parseFloat($('.product-price-main').attr('data-price'));

            }



            // updateProductPrice(id,qty+1,price);
            // toastr.success('','Quantity Updated Successfully');

        }
    });

    $('.remove-item').click(function(e){
        var qty=parseInt($('.product-qty').attr('data-qty'));
        var id=parseInt($('.product-price-main').attr('data-id'));
        if(qty<1) {
            toastr.error('','You cannot add below 1');
        }else {
            $('.product-qty').text(qty-1 );
            $('.product-qty').attr('data-qty',qty-1);

            var price=parseFloat($('.product-price-main').attr('data-price'));
            // updateProductPrice(id,qty-1,price);
            // toastr.success('','Quantity Updated Successfully');

        }


    });


    function updateProductPrice(id,qty,price) {
       var total=qty*price;
       var currencySymbol=$('.price2').attr('data-currency-symbol');
       productTotal=total;
       var varientTotal=checkVariantTotal();
       if(isHasVarient()){
           if(!isAtleastOneVariantChecked()){
               toastr.error('','Check at Least one variant');
               return;
           }else {

               $('.price2').text(currencySymbol+' '+((varientTotal).toFixed(2)));
               $('.total-item-price').text(currencySymbol+' '+((varientTotal).toFixed(2)));

            console.log('Total Variant');
           }

       }else {
           console.log('Total Product');
           $('.price2').text(currencySymbol+' '+((total).toFixed(2)));
           $('.total-item-price').text(currencySymbol+' '+((total).toFixed(2)));

       }


    }
    // $('.varient-check').prop('checked',false);

    $(document).on('click','.varient-check',function (e) {
        // $('.varient-check').attr('checked',false);
        $('.varient-check:checked').prop('checked',false);

        // $('.varient-check:checked').each(function(){
        //     $(this).prop('checked',false);
        // })

        $(this).prop('checked',true);
        // alert($(this));
        if($('.varient-check:checked').length>1){
            // toastr.error('','You can not select more than 3');
            $(this).prop('checked',false);
            return;
        }
        var prPrice=0;
        var price=parseFloat($(this).attr('data-price'));
        var currencySymbol=$('.price2').attr('data-currency-symbol');
        var id=$(this).attr('data-id');
        var productid=$('.product-price-main').attr('data-id');

        var qty=$('.product-qty').attr('data-qty');
        var notes=$('#notes').val();

        if(isHasVarient()){
            prPrice=price;

        }else {
            prPrice=$('.product-price-main').attr('data-price');

        }
        productTotal=parseFloat(prPrice)*parseFloat(qty);


        if($(this).is(':checked')){
        $('.price2').text(currencySymbol+' '+((productTotal).toFixed(2)));
        $('.total-item-price').text(currencySymbol+' '+((productTotal).toFixed(2)));


            addVariant(productid,id,qty,price,notes);
    }else {

        }

    });

    function checkVariantTotal(){
        var total=0;
        var qty=$('.product-qty').attr('data-qty');
      $('.varient-check:checked').each(function(value,index){
          var price=parseFloat($(this).attr('data-price'));
          total+=(qty*price);

      })
        return total;
    }
    function isHasVarient() {
        var check=false;

       if($('.varient-check:checked').length > 0){
           check=true;
       }

        return check;

    }

    function isHasAddon() {
        var check=false;

       if($('.addon-check:checked').length > 0){
           check=true;
       }

        return check;

    }

    function isAtleastOneVariantChecked() {
        var check=false;
        $('.varient-check:checked').each(function(value,index){
            check=true;
        });

        return check;
    }

    function updateVariantPrice(qty,price) {

    }
    $(document).on('click','.addon-check',function(e){
        var prPrice=0;
        var price=parseFloat($(this).attr('data-price'));
        var currencySymbol=$('.price2').attr('data-currency-symbol');
        var id=$(this).attr('data-id');
        var productid=$('.product-price-main').attr('data-id');

        var qty=$('.product-qty').attr('data-qty');
        var notes=$('#notes').val();

        $('.addon-check:checked').prop('checked',false);
        $(this).prop('checked',true);
        if(isHasAddon()){
            prPrice=price;

        }else {
            prPrice=$('.product-price-main').attr('data-price');

        }
        productTotal=parseFloat(prPrice)*parseFloat(qty);


        if($(this).is(':checked')){
            $('.price2').text(currencySymbol+' '+((productTotal).toFixed(2)));
            $('.total-item-price').text(currencySymbol+' '+((productTotal).toFixed(2)));


            addAddon(productid,id,qty,price,notes);
        }else {

            removeAddon(productid,id,qty,price,notes);
        }

    });

    $('#add-to-order').on('click',function () {
        // console.log($('.varient-check').attr('checked').length);

                if ($('.varient-check:checked').length===0){
                    var productid=$('.product-price-main').attr('data-id');
                    var prPrice=$('.product-price-main').attr('data-price');
                    var qty=$('.product-qty').attr('data-qty');
                    addCart(productid,qty,prPrice);
                    toastr.success('','Cart Item Added Successfully');
                }
                else {
                    var productid=$('.product-price-main').attr('data-id');
                    var prPrice=$('.product-price-main').attr('data-price');
                    var qty=$('.product-qty').attr('data-qty');
                    addVariant(productid,$('.varient-check:checked').val(),qty,prPrice);
                    toastr.success('','Cart Item Added Successfully');
                }

    });

    function addCart(id,qty,price) {
        var notes=$('#notes').val();
        $.ajax({
            url:HOST_URL+'/addcart',
            type:'get',
            data:{'id':id,'qty':qty,'note':notes},
            success:function(data){
                console.log(data);
            },
            error:function(err){
                console.log(err.responseText);
            }

        })

    }

    function addVariant(productid,id,qty,price,note) {
        $.ajax({
            url:HOST_URL+'/addcartvariant',
            type:'get',
            data:{'id':id,'qty':qty,'product_id':productid,'note':note},
            success:function(data){
                console.log(data);
            },
            error:function(err){
                console.log(err.responseText);
            }
        })
    }
    function addAddon(productid,id,qty,price,note) {
        $.ajax({
            url: HOST_URL + '/addcartaddon',
            type: 'get',
            data: {'id': id, 'qty': qty, 'product_id': productid, 'note': note},
            success: function (data) {
                console.log(data);
            },
            error: function (err) {
                console.log(err.responseText);
            }

        });
    }
    function removeAddon(productid,id,qty,price,note) {
        $.ajax({
            url: HOST_URL + '/removecartaddon/'+id,
            type: 'get',
            data: {'id': id, 'qty': qty, 'product_id': productid, 'note': note},
            success: function (data) {
                console.log(data);
            },
            error: function (err) {
                console.log(err.responseText);
            }

        });
    }



})
