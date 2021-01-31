"use strict";
var KTDatatablesDataSourceAjaxServer = function() {

    var initTable1 = function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var tableEditor= new $.fn.dataTable.Editor({
            ajax: HOST_URL+ "/admin/product/dtProducts",
            table: "#kt_datatable",
            // display: "bootstrap4",
            idSrc:'id',
            keys:true,
            fields: [

                {
                    label: 'Category :',
                    name: 'category_id',

                    type: 'select2',
                    opts: {
                        ajax: {
                            cache: true,
                            dataType: 'json',
                            delay: 250,
                            url: HOST_URL+'/admin/product/getCategoriesForSelect2',
                            data: function (params) {


                                return {
                                    q: params.term, // search term
                                    page: params.page,
                                };
                            },
                            processResults: function (data, page) {
                                console.log(data);


                                return {
                                    results: $.map(data.dat, function (item) {
                                        console.log('Items')
                                        console.log(item);
                                        return {
                                            text:item.category_ar,
                                            id: item.id
                                        }
                                    })
                                };
                            }

                        }
                    }
                },

                {label: "Name:", name: "name"},
                {label: "Name Arabic:", name: "name_ar"},
                {
                    /*display: function ( file_id ) {
                        console.log(file_id);
                        return '<img src="'+HOST_URL+file_id+'"/>';
                    },*/

                    /*
                    label: "Image:",
                    name: "image",
                    type: "upload",*/

                    label: "Images:",
                    name: "media",
                    type: "uploadMany",
                    display: function ( media, counter ) {
                        console.log(media, counter)
                        if (media.path !== undefined)
                        return '<img src="'+HOST_URL+media.path+'"/>';
                        else {
                            return '<img src="'+HOST_URL+media+'"/>';
                        }
                    },
                    noFileText: 'No images',
                    clearText: "Clear",
                    noImageText: 'No image'
                },
                {label: "Price:", name: "price",type:"text"},
                {label: "Price (BD):", name: "price_bd",type:"text"},
                {label: "Price (OMR):", name: "price_omr",type:"text"},
                {label: "Price (QAR):", name: "price_qar",type:"text"},
                {label: "Price (SAR):", name: "price_sar",type:"text"},
                {label: "Price (AED):", name: "price_aed",type:"text"},
                {label: "Price (USD):", name: "price_usd",type:"text"},



                {label: "Price Without Discount:", name: "discount",type:"text"},
                {label: "Discount Percentage:", name: "discount_percentage",type:"text"},
                {label: "Stock:", name: "stock",type:"text"},
                {label: "Description:", name: "description"},
                {label: "Description Arabic:", name: "description_ar"},
                {label: "Order Level:", name: "order_level"},
                {
                    label: "Display:",
                    name:"display",
                    type:  "select2",
                    options: [
                        { label: "Yes", value: 'yes' },
                        { label: "NO",  value: 'no' }
                    ],

                },
                {
                    label: "Manage Stock:",
                    name:"manage_stock",
                    type:  "select2",
                    options: [
                        { label: "Yes", value: 'yes' },
                        { label: "NO",  value: 'no' }
                    ],

                }
            ]
        });
        // $('#kt_datatable').on('click', 'tbody td:not(:first-child)', function (e) {
        //     // tableEditor.inline( this ,{
        //     //     onBlur: 'submit'
        //     //     // scope:'cell'
        //     // });
        // });


        $('#kt_datatable').on( 'click', 'tbody td:not(.child)', function (e) {
            // Ignore the Responsive control and checkbox columns
            if ( $(this).hasClass( 'control' ) || $(this).hasClass('select-checkbox') ) {
                return;
            }

            tableEditor.inline( this );
        } );

        // Inline editing in responsive cell
        $('#kt_datatable').on( 'click', 'tbody ul.dtr-details li', function (e) {
            // Edit the value, but this selector allows clicking on label as well
            tableEditor.inline( $('span.dtr-data', this) );
        } );

        var table = $('#kt_datatable');
        // $('#kt_datatable thead tr').clone(true).appendTo('#kt_datatable thead');
        // $('#kt_datatable thead tr:eq(1) th').each( function (i) {
        //     if (i==0) {
        //
        //     }else {
        //         var title = $(this).text();
        //         $(this).html( '<input type="text" class="form-control" style="width:100%;" placeholder="'+title+'" />' );
        //         $( 'input', this ).on( 'keyup change', function () {
        //             if ( newtable.column(i).search() !== this.value ) {
        //                 newtable
        //                     .column(i)
        //                     .search( this.value )
        //                     .draw();
        //             }
        //         } );
        //     }
        // } );

        // begin first table
        var newtable = table.DataTable({
            dom: "Blfrtip",
            responsive: true,
            searchDelay: 500,
            processing: true,
            serverSide: true,
            fixedHeader: true,
            ajax: {
                url: HOST_URL + '/admin/product/getProduct',
                type: 'GET',
            },

            "select": {
                'style': 'multi'
            },
            columns: [
                {data: 'id'},
                {data: 'category',editField: "category_id",name:'categories.category'},
                {data: 'name',name:"name"},
                {data: 'name_ar',name:"name_ar"},
                {
                    data: "media",
                    render: function ( media ) {
                        return media !== undefined && media.length > 0 ?
                            '<img style="height: auto;width: 150px;" src="'+HOST_URL+media[0].path+'"/>' :
                            null;
                    },
                    defaultContent: "No image",
                    title: "Image"
                },

                {data: 'price',name:"price"},
                {data: 'price_bd',name:"price_bd"},
                {data: 'price_omr',name:"price_omr"},
                {data: 'price_qar',name:"price_qar"},
                {data: 'price_sar',name:"price_sar"},
                {data: 'price_aed',name:"price_aed"},
                {data: 'price_usd',name:"price_usd"},
                {data: 'discount',name:"discount"},
                {data: 'discount_percentage',name:"discount_percentage"},
                {data: 'stock',name:"stock"},
                {data: 'description',name:"description",render:function(desc){
                        return desc.substring(0,100);
                    }},
                {data: 'description_ar',name:"description_ar",render:function(desc){
                        return desc.substring(0,100);
                    }},
                {data: 'order_level',name:"products.order_level", editField: 'order_level'},
                {data: 'display',name:"display"},
                {data: 'manage_stock',name:"manage_stock"},
            ],
            buttons: [
                { extend: "create", editor: tableEditor ,className:'btn btn-outline-success font-weight-bold'},
                { extend: "edit",   editor: tableEditor ,className:'btn btn-outline-warning font-weight-bold'},
                { extend: "remove", editor: tableEditor ,className:'btn btn-outline-danger font-weight-bold'},
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
