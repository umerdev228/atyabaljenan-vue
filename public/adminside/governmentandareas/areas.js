"use strict";
var KTDatatablesDataSourceAjaxServer = function() {

    var initTable1 = function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var tableEditor= new $.fn.dataTable.Editor({
            ajax: HOST_URL+ "/admin/areas/dtAreas",
            table: "#kt_datatable",
            display: "bootstrap",
            idSrc:'id',
            keys:true,
            fields: [
                {
                    label: "Government:",
                    name: "government_id",
                    type: 'select2',
                    opts: {
                        ajax: {
                            cache: true,
                            dataType: 'json',
                            delay: 250,
                            url: HOST_URL+'/admin/areas/getGovernmentsForSelect2',
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
                                        console.log('Governments')
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
                {label: "Name:", name: "name"},
                {label: "Name Arabic:", name: "name_ar"},
                {label: "Delivery Charges:", name: "delivery_charges"},
                {label: "Delivery Time (Minutes):", name: "delivery_time"},
            ]
        });
        $('#kt_datatable').on('click', 'tbody td:not(:first-child)', function (e) {
            tableEditor.inline( this ,{
                onBlur: 'submit',
                scope:'cell'
            });
        });
        var table = $('#kt_datatable');

        // begin first table
        var newtable = table.DataTable({
            dom: "Bfrtip",
            responsive: true,
            searchDelay: 500,
            processing: true,
            serverSide: true,
            ajax: {
                url: HOST_URL + '/admin/areas/getAreas',
                type: 'GET',
            },
            "select": {
                'style': 'multi'
            },
            columns: [
                {data: 'id'},
                {data: 'government',editField:'government_id'},
                {data: 'name'},
                {data: 'name_ar'},
                {data: 'delivery_charges'},
                {data: 'delivery_time'},
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
