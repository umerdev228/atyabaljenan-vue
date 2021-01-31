"use strict";
var newtable;
var KTDatatablesDataSourceAjaxServer = function() {

    var initTable1 = function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var table = $('#kt_datatable');

        // begin first table
         newtable = table.DataTable({
            dom: "Blfrtip",
            responsive: true,
            searchDelay: 500,
            processing: true,
            serverSide: true,
            ajax: {
                url: HOST_URL + '/admin/order/getorders',
                type: 'GET',
            },
            "select": {
                'style': 'multi'
            },
            columns: [
                {data: 'id'},
                {data: 'order_no',name:'order_no','render':function(data,full){
                    return '<span>#'+data+'</span>'
                    }},
                {data: 'code','name':'promo_codes.code'},
                {data: 'government'},
                {data: 'area'},
                {data: 'payment_type'},
                {data: 'delivery_charges'},

                {data: 'subtotal'},
                {data: 'discount'},
                {data: 'total'},
                {data: 'status','name':'status'},
                {data: 'action'},
            ],
            buttons: [
                // {extend: 'print', className: 'btn btn-info font-weight-bold'},
                // {extend: 'copy', className: 'btn btn-muted font-weight-bold'},
                // {extend: 'excel', className: 'btn btn-blue font-weight-bold'},
                // {extend: 'pdf', className: 'btn btn-red font-weight-bold'},
                // {extend: 'csv', className: 'btn btn-green font-weight-bold'}
                {
                    extend: 'collection',
                    text: 'Export',
                    className:'btn btn-dark font-weight-bold dropdown-toggle',
                    buttons: [
                        'copy',
                        'excel',
                        'csv',
                        'pdf',
                        'print'
                    ]
                }

            ],

        });
        newtable.buttons( 0, null ).containers().appendTo( '#dtButtons' );

        $(document).on('click','.btn-status',function(e){
            e.preventDefault();

            var id=$(this).attr('data-id');
            var statusId=$(this).attr('data-status-id');
            $.ajax({
                url:HOST_URL+'/admin/order/statusupdate',
                type:'get',
                data:{id:id,'status_id':statusId},
                success:function(data){
                    if(data.status==='success'){
                        Swal.fire(data.name, data.message, "success");
                        newtable.ajax.reload();
                    }


                },
                error:function(error){

                    console.log(error.responseText);
                }
            })

        })
        $(document).on('click','.delete_order',function(e){
            e.preventDefault();
            var id=$(this).attr('order_id');
            Swal.fire({
                // title: '<strong>HTML <u>example</u></strong>',
                icon: 'info',
                html:
                    'Are You Sure You want to delete this Order',
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText:'Yes',
                cancelButtonText:'No',
            }).then((value) => {
                console.log(value.isConfirmed);
                if (value.isConfirmed == true || value.isConfirmed == "true"){
                    $.ajax({
                        url:HOST_URL+'/admin/order/deleteorder',
                        type:'get',
                        data:{id:id},
                        success:function(data){
                                Swal.fire(data.name, data.message, "success");
                                newtable.ajax.reload();
                                // newtable.reload();
                        },
                        error:function(error){
                            console.log(error.responseText);
                        }
                    })
                }else{

                }
            });
        })
    };

    return {

        //main function to initiate the module
        init: function() {
            initTable1();
        },

    };

}();

jQuery(document).ready(function() {
    KTDatatablesDataSourceAjaxServer.init();
});
