"use strict";
var KTDatatablesDataSourceAjaxServer = function() {

    var initTable1 = function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //variant editor
        var tableEditor= new $.fn.dataTable.Editor({
            ajax: HOST_URL+ "/admin/product/dtVariants",
            table: "#kt_datatable",
            display: "bootstrap",
            idSrc:'id',
            keys:true,
            fields: [
                // {
                //     label: "Product:",
                //     name: "product_id",
                //     type: 'select2',
                //     opts: {
                //         ajax: {
                //             cache: true,
                //             dataType: 'json',
                //             delay: 250,
                //             url: HOST_URL+'/admin/product/getProductsForSelect2',
                //             data: function (params) {
                //
                //
                //                 return {
                //                     q: params.term, // search term
                //                     page: params.page,
                //                 };
                //             },
                //             processResults: function (data, page) {
                //                 console.log(data);
                //
                //
                //                 return {
                //                     results: $.map(data.dat, function (item) {
                //                         console.log('Items')
                //                         console.log(item);
                //                         return {
                //                             text:item.name,
                //                             id: item.id
                //                         }
                //                     })
                //                 };
                //             }
                //
                //         }
                //     }
                // },
                {
                    label: "Variant Head:",
                    name: "variant_head_id",
                    type: 'select2',
                    opts: {
                        ajax: {
                            cache: true,
                            dataType: 'json',
                            delay: 250,
                            url: HOST_URL+'/admin/product/getVariantHeadsForSelect2',
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
                                            text:item.name,
                                            id: item.id
                                        }
                                    })
                                };
                            }

                        }
                    }
                    },
                {label: "Variant Name:", name: "name"},
                {label: "Variant Name Arabic:", name: "name_ar"},
                {label: "Price:", name: "price"},
                {label: "Price (USD):", name: "price_usd",type:"text"},
                {label: "Price (BD):", name: "price_bd",type:"text"},
                {label: "Price (OMR):", name: "price_omr",type:"text"},
                {label: "Price (QAR):", name: "price_qar",type:"text"},
                {label: "Price (SAR):", name: "price_sar",type:"text"},
                {label: "Price (AED):", name: "price_aed",type:"text"},
                {
                    label: "Manage Stock:",
                    name: "manage_stock",
                    type:  "select2",
                    options: [
                        { label: "Yes", value: 'yes', selected:'selected' },
                        { label: "NO",  value: 'no' }
                    ],
                },
                {label: "Stock:", name: "stock"},
            ]
        });
        $('#kt_datatable').on('click', 'tbody td:not(:first-child)', function (e) {
            tableEditor.inline( this ,{
                onBlur: 'submit',
                scope:'cell'
            });
        });

        //variantHead Editor
        var variantHeadEditor= new $.fn.dataTable.Editor({
            ajax: HOST_URL+ "/admin/product/dtVariantHeads",
            table: "#variantHead",
            display: "bootstrap",
            idSrc:'id',
            keys:true,
            fields: [
                {
                    label: "Product:",
                    name: "product_id",
                    type: 'select2',
                    opts: {
                        ajax: {
                            cache: true,
                            dataType: 'json',
                            delay: 250,
                            url: HOST_URL+'/admin/product/getProductsForSelect2',
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
                                            text:item.name,
                                            id: item.id
                                        }
                                    })
                                };
                            }

                        }
                    }
                },
                {label: "Variant Name:", name: "name"},
                {label: "Variant Name Arabic:", name: "name_ar"},
            ]
        });
       $('#variantHead').on('click', 'tbody td:not(:first-child)', function (e) {
            variantHeadEditor.inline( this ,{
                onBlur: 'submit',
                scope:'cell'
            });
        });



        // begin variant table
        var table = $('#kt_datatable');
        var newtable = table.DataTable({
            dom: "Bfrtip",
            responsive: true,
            searchDelay: 500,
            processing: true,
            serverSide: true,
            ajax: {
                url: HOST_URL + '/admin/product/getVariants',
                type: 'GET',
            },
            "select": {
                'style': 'multi'
            },
            columns: [
                // {data: 'id'},
                // {data: 'product',editField: "product_id"},
                {data: 'variant_head',editField: "variant_head_id"},
                {data: 'name'},
                // {data: 'name_ar'},
                {data: 'price'},
                {data: 'price_usd',name:"price_usd"},
                {data: 'price_bd',name:"price_bd"},
                {data: 'price_omr',name:"price_omr"},
                {data: 'price_qar',name:"price_qar"},
                {data: 'price_sar',name:"price_sar"},
                {data: 'price_aed',name:"price_aed"},
                {data: 'manage_stock'},
                {data: 'stock'},
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


        // begin variant Head table
        var variantHeadTable = $('#variantHead');
        var variantHead = variantHeadTable.DataTable({
            dom: "Bfrtip",
            responsive: true,
            searchDelay: 500,
            processing: true,
            serverSide: true,
            ajax: {
                url: HOST_URL + '/admin/product/getVariantHeads',
                type: 'GET',
            },
            "select": {
                'style': 'multi'
            },
            columns: [
                {data: 'id'},
                {data: 'product',editField: "product_id"},
                {data: 'name'},
                {data: 'name_ar'},
            ],
            buttons: [
                { extend: "create", editor: variantHeadEditor ,className:'btn btn-outline-success font-weight-bold'},
                { extend: "edit",   editor: variantHeadEditor ,className:'btn btn-outline-warning font-weight-bold'},
                { extend: "remove", editor: variantHeadEditor ,className:'btn btn-outline-danger font-weight-bold'},
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
        variantHead.buttons( 0, null ).containers().appendTo( '#dtButtonsVariantHeads' );



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
