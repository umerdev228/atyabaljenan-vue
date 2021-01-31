"use strict";
$('#kt_daterangepicker_4').daterangepicker({
    buttonClasses: ' btn',
    applyClass: 'btn-primary',
    cancelClass: 'btn-secondary',

    timePicker: true,
    timePickerIncrement: 30,
    locale: {
        format: 'MM/DD/YYYY h:mm A'
    }
}, function(start, end, label) {
    $('#kt_daterangepicker_4 .form-control').val( start.format('MM/DD/YYYY h:mm A') + ' - ' + end.format('MM/DD/YYYY h:mm A'));
});

$('.save-new-schedule').on('click',function () {
var name=$('.event_name').val();
var description=$('.event_desc').val();
var date=$('.event_date_time').val();

    if (name == '' || name == null) {
        $('.event_name').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Event Name is Required.').addClass('text-danger').show();
    } else {
        $('.event_name').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
    }
    if (date == '' || date == null) {
        $('.event_date_time').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Please select Event date &amp; Time.').addClass('text-danger').show();
    } else {
        $('.event_date_time').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
    }

    if ($('.is-invalid').length<1) {
        $.ajax({
            url: HOST_URL+'/admin/setting/postNewSchedule',
            type: 'post',
            data: {
                'name': name,
                'description':description ,
                'date':date ,
            },
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (data) {
                console.log(data);
                $.notify('<strong>Saving</strong> Do not close this page...', {
                    type: 'success',
                    allow_dismiss: false,
                    showProgressbar: true,
                    timer: 700,
                    delay: 1000,
                });
                $('.event_name').val('');
                $('.event_desc').val('');
                $('.event_date_time').val('');
                $('.event_name').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                $('.event_date_time').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                $('.new-schedule-close').click();
                calendar.rerenderEvents();
                },
            error: function (error) {
                console.log(error.responseText);
                //
            }
        });
    }
});
