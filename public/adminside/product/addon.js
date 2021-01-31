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
            ajax: HOST_URL+ "/admin/product/dtAddOns",
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
                    label: "Add-on Head:",
                    name: "head_id",
                    type: 'select2',
                    opts: {
                        ajax: {
                            cache: true,
                            dataType: 'json',
                            delay: 250,
                            url: HOST_URL+'/admin/product/getAddOnnHeadsForSelect2',
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
                {label: "Add-on Name:", name: "name"},
                {label: "Add-on Name Arabic:", name: "name_ar"},
                {label: "Price:", name: "price"},
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
        var addOnHeadEditor= new $.fn.dataTable.Editor({
            ajax: HOST_URL+ "/admin/product/dtAddOnHeads",
            table: "#addOnHead",
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
                {label: "Add-on Name:", name: "name"},
                {label: "Add-on Name Arabic:", name: "name_ar"},
            ]
        });
        $('#addOnHead').on('click', 'tbody td:not(:first-child)', function (e) {
            addOnHeadEditor.inline( this ,{
                onBlur: 'submit',
                scope:'cell'
            });
        });



        // begin Add-ons table
        var table = $('#kt_datatable');
        var newtable = table.DataTable({
            dom: "Bfrtip",
            responsive: true,
            searchDelay: 500,
            processing: true,
            serverSide: true,
            ajax: {
                url: HOST_URL + '/admin/product/getAddOns',
                type: 'GET',
            },
            "select": {
                'style': 'multi'
            },
            columns: [
                {data: 'id'},
                // {data: 'product',editField: "product_id"},
                {data: 'addon_head',editField: "head_id"},
                {data: 'name'},
                {data: 'name_ar'},
                {data: 'price'},
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


        // begin Add-on Head table
        var addOnHeadTable = $('#addOnHead');
        var addOnHead = addOnHeadTable.DataTable({
            dom: "Bfrtip",
            responsive: true,
            searchDelay: 500,
            processing: true,
            serverSide: true,
            ajax: {
                url: HOST_URL + '/admin/product/getAddOntHeads',
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
                { extend: "create", editor: addOnHeadEditor ,className:'btn btn-outline-success font-weight-bold'},
                { extend: "edit",   editor: addOnHeadEditor ,className:'btn btn-outline-warning font-weight-bold'},
                { extend: "remove", editor: addOnHeadEditor ,className:'btn btn-outline-danger font-weight-bold'},
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
        addOnHead.buttons( 0, null ).containers().appendTo( '#dtButtonsAddonHeadModal' );



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
