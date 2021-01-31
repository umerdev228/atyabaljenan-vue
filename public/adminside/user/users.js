"use strict";
var KTDatatablesAdvancedColumnRendering = function() {
    function check(src) {
        return $("<img>").attr('src', src);
    }
    var init = function() {
        var table = $('#kt_datatable');

        // begin first table
        table.DataTable({
            responsive: true,
            searchDelay: 500,
            processing: true,
            serverSide: true,
            ajax:HOST_URL+'/admin/user/getusers',
            paging: true,
            columnDefs: [
                {
                    targets: 1,
                    title: 'Profile',
                    render: function(data, type, full, meta) {

                        var number = KTUtil.getRandomInt(1, 14);
                        var user_img = full.picture;

                        var output;
                        if (full.is_has_image) {
                            output = `
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-50 flex-shrink-0">
                                        <img src="`+HOST_URL+`/uploads/` + user_img + `" alt="photo">
                                    </div>
                                    <div class="ml-3">
                                        <span class="text-dark-75 font-weight-bold line-height-sm d-block pb-2">` + full.name + `</span>
                                        <a href="#" class="text-muted text-hover-primary">` + full.email + `</a>
                                    </div>
                                </div>`;
                        }

                        else {
                            var stateNo = KTUtil.getRandomInt(0, 7);
                            var states = [
                                'success',
                                'light',
                                'danger',
                                'success',
                                'warning',
                                'dark',
                                'primary',
                                'info'];

                            var state = states[stateNo];
                            console.log(full);
                            output = `
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-50 symbol-light-` + state + `" flex-shrink-0">
                                        <div class="symbol-label font-size-h5">` + full.name.substring(0, 1) + `</div>
                                    </div>
                                    <div class="ml-3">
                                        <span class="text-dark-75 font-weight-bold line-height-sm d-block pb-2">` + full.name + `</span>
                                        <a href="#" class="text-muted text-hover-primary">` + full.email + `</a>
                                    </div>
                                </div>`;
                        }

                        return output;
                    },
                },
                {
                    targets: 2,
                    render: function(data, type, full, meta) {
                        return '<a class="text-dark-50 text-hover-primary" href="mailto:' + data + '">' + data + '</a>';
                    },
                },
                {
                    targets: -1,
                    title: 'Actions',
                    orderable: false,
                    render: function(data, type, full, meta) {
                        return '\
							<div class="dropdown dropdown-inline">\
								<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">\
	                                <i class="la la-cog"></i>\
	                            </a>\
							  	<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">\
									<ul class="nav nav-hoverable flex-column">\
							    		<li class="nav-item"><a class="nav-link" href="'+HOST_URL+'/admin/user/edituser/'+full.id+'"><i class="nav-icon la la-edit"></i><span class="nav-text">Edit Details</span></a></li>\
							    		<li class="nav-item"><a class="nav-link" href="'+HOST_URL+'/admin/user/deleteuser/'+full.id+'"><i class="nav-icon la la-leaf"></i><span class="nav-text">Update Status</span></a></li>\
							    	</ul>\
							  	</div>\
							</div>\
							<a href="'+HOST_URL+'/admin/user/edituser/'+full.id+'" class="btn btn-sm btn-clean btn-icon" title="Edit details">\
								<i class="la la-edit"></i>\
							</a>\
							<a href="'+HOST_URL+'/admin/user/deleteuser/'+full.id+'" class="btn btn-sm btn-clean btn-icon" title="Delete">\
								<i class="la la-trash"></i>\
							</a>\
						';
                    },
                },

            ],
            columns: [
                {data: 'id'},
                {data: 'name'},
                {data: 'email'},
                {data: 'address'},
                {data: 'status'},
                {data: 'type','name':'roles.name'},

            ],
        });

        $('#kt_datatable_search_status').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'Status');
        });

        $('#kt_datatable_search_type').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'Type');
        });

        $('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();
    };

    return {

        //main function to initiate the module
        init: function() {
            init();
        }
    };
}();

jQuery(document).ready(function() {
    KTDatatablesAdvancedColumnRendering.init();
});
