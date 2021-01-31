// Class definition
var KTFormRepeater = function() {

    // Private functions

    var monday = function() {
        var count = 1;
        if(count <=3) {
            $('#monday').repeater({
                initEmpty: false,

                defaultValues: {
                    'text-input': 'foo'
                },

                show: function () {
                    if(count<2){
                        $('.monday-btn-add').show();

                    }else {
                        $('.monday-btn-add').hide();

                    }
                    if (count<3) {
                        $(this).slideDown();
                        $('.monday_form').timepicker();
                        $('.monday_to').timepicker();
                        count++;

                    }else {
                        $('.monday-btn-add').hide();
                        return false;
                    }
                },

                hide: function (deleteElement) {
                    if (confirm('Are you sure you want to delete this element?')) {
                        if (count = 0){

                        }else{
                            $(this).slideUp(deleteElement);
                        }
                        count--;
                        if(count<=2){
                            $('.tuesday-btn-add').show();

                        }else {
                            $('.tuesday-btn-add').hide();

                        }
                    }
                },
            });
        }
    }
    var tuesday = function() {
        var count = 1;
        if(count <=3) {
            $('#tuesday').repeater({
                initEmpty: false,

                defaultValues: {
                    'text-input': 'foo'
                },

                show: function () {
                    if(count<2){
                        $('.tuesday-btn-add').show();

                    }else {
                        $('.tuesday-btn-add').hide();

                    }
                    if (count<3) {
                        $(this).slideDown();
                        $('.tuesday_form').timepicker();
                        $('.tuesday_to').timepicker();
                        count++;

                    }else {
                        $('.tuesday-btn-add').hide();
                        return false;
                    }
                },

                hide: function (deleteElement) {
                    if (confirm('Are you sure you want to delete this element?')) {
                        if (count = 0){

                        }else{
                            $(this).slideUp(deleteElement);
                        }
                        count--;
                        if(count<=2){
                            $('.tuesday-btn-add').show();

                        }else {
                            $('.tuesday-btn-add').hide();

                        }
                    }
                },
            });
        }
    }
    var wednesday = function() {
        var count = 1;
        if(count <=3) {
            $('#wednesday').repeater({
                initEmpty: false,

                defaultValues: {
                    'text-input': 'foo'
                },

                show: function () {
                    if(count<2){
                        $('.wednesday-btn-add').show();

                    }else {
                        $('.wednesday-btn-add').hide();

                    }
                    if (count<3) {
                        $(this).slideDown();
                        $('.wednesday_form').timepicker();
                        $('.wednesday_to').timepicker();
                        count++;

                    }else {
                        $('.wednesday-btn-add').hide();
                        return false;
                    }
                },

                hide: function (deleteElement) {
                    if (confirm('Are you sure you want to delete this element?')) {
                        if (count = 0){

                        }else{
                            $(this).slideUp(deleteElement);
                        }
                        count--;
                        if(count<=2){
                            $('.wednesday-btn-add').show();

                        }else {
                            $('.wednesday-btn-add').hide();

                        }
                    }
                },
            });
        }
    }
    var thursday = function() {
        var count = 1;
        if(count <=3) {
            $('#thursday').repeater({
                initEmpty: false,

                defaultValues: {
                    'text-input': 'foo'
                },

                show: function () {
                    if(count<2){
                        $('.thursday-btn-add').show();

                    }else {
                        $('.thursday-btn-add').hide();

                    }
                    if (count<3) {
                        $(this).slideDown();
                        $('.thursday_form').timepicker();
                        $('.thursday_to').timepicker();
                        count++;

                    }else {
                        $('.thursday-btn-add').hide();
                        return false;
                    }
                },

                hide: function (deleteElement) {
                    if (confirm('Are you sure you want to delete this element?')) {
                        if (count = 0){

                        }else{
                            $(this).slideUp(deleteElement);
                        }
                        count--;
                        if(count<=2){
                            $('.thursday-btn-add').show();

                        }else {
                            $('.thursday-btn-add').hide();

                        }
                    }
                },
            });
        }
    }
    var friday = function() {
        var count = 1;
        if(count <=3) {
            $('#friday').repeater({
                initEmpty: false,

                defaultValues: {
                    'text-input': 'foo'
                },

                show: function () {
                    if(count<2){
                        $('.friday-btn-add').show();

                    }else {
                        $('.friday-btn-add').hide();

                    }
                    if (count<3) {
                        $(this).slideDown();
                        $('.friday_form').timepicker();
                        $('.friday_to').timepicker();
                        count++;

                    }else {
                        $('.friday-btn-add').hide();
                        return false;
                    }
                },

                hide: function (deleteElement) {
                    if (confirm('Are you sure you want to delete this element?')) {
                        if (count = 0){

                        }else{
                            $(this).slideUp(deleteElement);
                        }
                        count--;
                        if(count<=2){
                            $('.friday-btn-add').show();

                        }else {
                            $('.friday-btn-add').hide();

                        }
                    }
                },
            });
        }
    }
    var saturday = function() {
        var count = 1;
        if(count <=3) {
            $('#saturday').repeater({
                initEmpty: false,

                defaultValues: {
                    'text-input': 'foo'
                },

                show: function () {
                    if(count<2){
                        $('.saturday-btn-add').show();

                    }else {
                        $('.saturday-btn-add').hide();

                    }
                    if (count<3) {
                        $(this).slideDown();
                        $('.saturday_form').timepicker();
                        $('.saturday_to').timepicker();
                        count++;

                    }else {
                        $('.saturday-btn-add').hide();
                        return false;
                    }
                },

                hide: function (deleteElement) {
                    if (confirm('Are you sure you want to delete this element?')) {
                        if (count = 0){

                        }else{
                            $(this).slideUp(deleteElement);
                        }
                        count--;
                        if(count<=2){
                            $('.saturday-btn-add').show();

                        }else {
                            $('.saturday-btn-add').hide();

                        }
                    }
                },
            });
        }
    }
    var sunday = function() {
        var count = 1;
        if(count <=3) {
            $('#sunday').repeater({
                initEmpty: false,

                defaultValues: {
                    'text-input': 'foo'
                },

                show: function () {
                    if(count<2){
                        $('.sunday-btn-add').show();

                    }else {
                        $('.sunday-btn-add').hide();

                    }
                    if (count<3) {
                        $(this).slideDown();
                        $('.sunday_form').timepicker();
                        $('.sunday_to').timepicker();
                        count++;

                    }else {
                        $('.sunday-btn-add').hide();
                        return false;
                    }
                },

                hide: function (deleteElement) {
                    if (confirm('Are you sure you want to delete this element?')) {
                        if (count = 0){

                        }else{
                            $(this).slideUp(deleteElement);
                        }
                        count--;
                        if(count<=2){
                            $('.sunday-btn-add').show();

                        }else {
                            $('.sunday-btn-add').hide();

                        }
                    }
                },
            });
        }
    }


    return {
        // public functions
        init: function() {
            monday();
            tuesday();
            wednesday();
            thursday();
            friday();
            saturday();
            sunday();
        }
    };
}();


jQuery(document).ready(function() {
    $('.monday_form').timepicker();
    $('.tuesday_form').timepicker();
    $('.wednesday_form').timepicker();
    $('.thursday_form').timepicker();
    $('.friday_form').timepicker();
    $('.saturday_form').timepicker();
    $('.sunday_form').timepicker();
    $('.monday_to').timepicker();
    $('.tuesday_to').timepicker();
    $('.wednesday_to').timepicker();
    $('.thursday_to').timepicker();
    $('.friday_to').timepicker();
    $('.saturday_to').timepicker();
    $('.sunday_to').timepicker();
    KTFormRepeater.init();

    $('#submit').on('click',function () {
        // var mondayval=$('#kt_repeasater_1').val();
        // console.log(mondayval);
        var monday_from=[];
        var tuesday_from=[];
        var wednesday_from=[];
        var thursday_from=[];
        var friday_from=[];
        var saturday_from=[];
        var sunday_from=[];

        var monday_to=[];
        var tuesday_to=[];
        var wednesday_to=[];
        var thursday_to=[];
        var friday_to=[];
        var saturday_to=[];
        var sunday_to=[];

        var monday_status=$('#monday_status').is(':checked');
        var tuesday_status=$('#tuesday_status').is(':checked');
        var wednesday_status=$('#wednesday_status').is(':checked');
        var thursday_status=$('#thursday_status').is(':checked');
        var friday_status=$('#friday_status').is(':checked');
        var saturday_status=$('#saturday_status').is(':checked');
        var sunday_status=$('#sunday_status').is(':checked');

        jQuery('input[name*="monday_from"]').each(function(e)
        {monday_from.push($(this).val());
        });
        jQuery('input[name*="tuesday_from"]').each(function(e)
        {tuesday_from.push($(this).val());
        });
        jQuery('input[name*="wednesday_from"]').each(function(e)
        {wednesday_from.push($(this).val());
        });
        jQuery('input[name*="thursday_from"]').each(function(e)
        {thursday_from.push($(this).val());
        });
        jQuery('input[name*="friday_from"]').each(function(e)
        {friday_from.push($(this).val());
        });
        jQuery('input[name*="saturday_from"]').each(function(e)
        {saturday_from.push($(this).val());
        });
        jQuery('input[name*="sunday_from"]').each(function(e)
        {sunday_from.push($(this).val());
        });

        jQuery('input[name*="monday_to"]').each(function(e)
        {monday_to.push($(this).val());
        });
        jQuery('input[name*="tuesday_to"]').each(function(e)
        {tuesday_to.push($(this).val());
        });
        jQuery('input[name*="wednesday_to"]').each(function(e)
        {wednesday_to.push($(this).val());
        });
        jQuery('input[name*="thursday_to"]').each(function(e)
        {thursday_to.push($(this).val());
        });
        jQuery('input[name*="friday_to"]').each(function(e)
        {friday_to.push($(this).val());
        });
        jQuery('input[name*="saturday_to"]').each(function(e)
        {saturday_to.push($(this).val());
        });
        jQuery('input[name*="sunday_to"]').each(function(e)
        {sunday_to.push($(this).val());
        });


        // console.log(monday_from);
        // console.log(tuesday_from);
        // console.log(wednesday_from);
        // console.log(thursday_from);
        // console.log(friday_from);
        // console.log(saturday_from);
        // console.log(sunday_from);
        //
        // console.log(monday_to);
        // console.log(tuesday_to);
        // console.log(wednesday_to);
        // console.log(thursday_to);
        // console.log(friday_to);
        // console.log(saturday_to);
        // console.log(sunday_to);
        alert(monday_status);
        alert(tuesday_status);
        $.ajax({
            url: HOST_URL+'/admin/setting/postEditSchedule',
            type: 'post',
            data: {
                'monday_from':monday_from,
                'tuesday_from':tuesday_from,
                'wednesday_from':wednesday_from,
                'thursday_from':thursday_from,
                'friday_from':friday_from,
                'saturday_from':saturday_from,
                'sunday_from':sunday_from,

                'monday_to':monday_to,
                'tuesday_to':tuesday_to,
                'wednesday_to':wednesday_to,
                'thursday_to':thursday_to,
                'friday_to':friday_to,
                'saturday_to':saturday_to,
                'sunday_to':sunday_to,

                'monday_status':monday_status,
                'tuesday_status':tuesday_status,
                'wednesday_status':wednesday_status,
                'thursday_status':thursday_status,
                'friday_status':friday_status,
                'saturday_status':saturday_status,
                'sunday_status':sunday_status
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
    });
});

