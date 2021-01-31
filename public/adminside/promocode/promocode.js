"use strict";
var KTDatatablesDataSourceAjaxServer = function() {

    var initTable1 = function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var tableEditor= new $.fn.dataTable.Editor({
            ajax: HOST_URL+ "/admin/promo_code/dtPromoCodes",
            table: "#kt_datatable",
            display: "bootstrap",
            idSrc:'id',
            keys:true,
            fields: [
                {label: "Code:", name: "code"},
                {
                    label: "Code Type:",
                    name:"type",
                    type:  "select2",
                    options: [
                        { label: "percentage", value: 'Percentage' },
                        { label: "fixed",  value: 'Fixed' }
                    ],},
                {label: "Percentage:", name: "percentage"},
                {label: "Amount:", name: "amount"},
                {label: "Description:", name: "description"},
                {label: "Description (Arabic):", name: "description_ar"},
                {label: "Active Until",type:'datetime', name: "active_until",
                    def:       function () { return new Date(); },
                    format:    'YYYY-MM-DD H:mm:ss',
                    fieldInfo: 'US style m-d-y date input with 12 hour clock',
                    opts: {
                        minutesIncrement: 5
                    }
                },
                {label: "Limit Usage", name: "limited_usage"},
                {
                    label: "Status:",
                    name:"status",
                    type:  "select2",
                    options: [
                        { label: "Active", value: 'active' },
                        { label: "Inactive",  value: 'inactive' }
                    ],},
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
                url: HOST_URL + '/admin/promo_code/getPromoCodes',
                type: 'GET',
            },
            "select": {
                'style': 'multi'
            },
            columns: [
                {data: 'id'},
                {data: 'code'},
                {data: 'type'},
                {data: 'percentage'},
                {data: 'amount'},
                {data: 'description'},
                {data: 'description_ar'},
                {data: 'active_until'},
                {data: 'limited_usage'},
                {data: 'customer_usage'},
                {data: 'status'},
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
