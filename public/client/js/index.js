var instance;
$(document).ready(function() {

    $.ajax({
        url: HOST_URL+"/client/getProducts",
        type: 'get',
        data: {},
        success: function (data) {
            console.log(data);
            $('.product-dummy').hide();
            $('#product-container').append(data['html']);

            instance = $('.lazy-loading').Lazy({
                beforeLoad: function(element) {
                    console.log(element);
                    $(element).parent().children().eq(2).show();
                    // called before an elements gets handled
                },
                afterLoad: function(element) {
                    // called after an element was successfully handled
                    $(element).parent().children().eq(2).hide();
                },
                onError: function(element) {
                    // called whenever an element could not be handled
                },
                onFinishedAll: function() {
                    // called once all elements was handled
                }
            });
        },
        error: function (error) {
            console.log(error.responseText);
            //
        }
    });

    $('.search-product input').on('keyup',delay(function(e){
        var query=$(this).val();
        $('.product-dummy').show();

        $.ajax({
            url: HOST_URL+"/client/searchproducts",
            type: 'get',
            data: {search:query},
            success: function (data) {
                console.log(data);
                $('.product-dummy').hide();
                $('#product-container').html(data['html']);

                instance = $('.lazy-loading').Lazy({
                    beforeLoad: function(element) {
                        console.log(element);
                        $(element).parent().children().eq(2).show();
                        // called before an elements gets handled
                    },
                    afterLoad: function(element) {
                        // called after an element was successfully handled
                        $(element).parent().children().eq(2).hide();
                    },
                    onError: function(element) {
                        // called whenever an element could not be handled
                    },
                    onFinishedAll: function() {
                        // called once all elements was handled
                    }
                });
            },
            error: function (error) {
                console.log(error.responseText);
                //
            }
        });
    },300));

    function delay(callback, ms) {
        var timer = 0;
        return function() {
            var context = this, args = arguments;
            clearTimeout(timer);
            timer = setTimeout(function () {
                callback.apply(context, args);
            }, ms || 0);
        };
    }
});
