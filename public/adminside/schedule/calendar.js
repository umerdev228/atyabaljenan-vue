"use strict";
var calendarEl;
var calendar;
var KTAppsEducationSchoolCalendar = function() {

    return {
        //main function to initiate the module
        init: function() {
            var todayDate = moment().startOf('day');
            var YM = todayDate.format('YYYY-MM');
            var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
            var TODAY = todayDate.format('YYYY-MM-DD');
            var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');

            calendarEl = document.getElementById('kt_calendar');
            calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: [ 'bootstrap', 'interaction', 'dayGrid','dayGridPlugin', 'timeGrid', 'list' ],
                themeSystem: 'bootstrap',

                isRTL: KTUtil.isRTL(),

                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                timeZone: 'UTC',
                height: 800,
                contentHeight: 780,
                aspectRatio: 3,  // see: https://fullcalendar.io/docs/aspectRatio

                nowIndicator: true,
                now: TODAY + 'T09:25:00', // just for demo

                views: {
                    dayGridMonth: { buttonText: 'month' },
                    timeGridWeek: { buttonText: 'week' },
                    timeGridDay: { buttonText: 'day' }
                },

                defaultView: 'dayGridWeek',
                defaultDate: TODAY,
                eventDurationEditable:true,
                allDayDefault:true,
                editable: true,
                refetchResourcesOnNavigate: true,
                disableResizing: false,
                eventLimit: true, // allow "more" link when too many events
                navLinks: true,

                stick : true,
                events: HOST_URL+'/admin/setting/getSchedule'
                // eventSources: [
                //     'getDoctorSchedule',
                //     'getDoctorAppointments'
                // ]
                //    events: [
                //     {
                //         title: 'All Day Event',
                //         start: YM + '-01',
                //         description: 'Toto lorem ipsum dolor sit incid idunt ut',
                //         className: "fc-event-danger fc-event-solid-warning"
                //     },
                //     {
                //         title: 'Reporting',
                //         start: YM + '-14T13:30:00',
                //         description: 'Lorem ipsum dolor incid idunt ut labore',
                //         end: YM + '-14',
                //         className: "fc-event-success"
                //     }
                //     {
                //         title: 'Company Trip',
                //         start: YM + '-02',
                //         description: 'Lorem ipsum dolor sit tempor incid',
                //         end: YM + '-03',
                //         className: "fc-event-primary"
                //     },
                //     {
                //         title: 'ICT Expo 2017 - Product Release',
                //         start: YM + '-03',
                //         description: 'Lorem ipsum dolor sit tempor inci',
                //         end: YM + '-05',
                //         className: "fc-event-light fc-event-solid-primary"
                //     },
                //     {
                //         title: 'Dinner',
                //         start: YM + '-12',
                //         description: 'Lorem ipsum dolor sit amet, conse ctetur',
                //         end: YM + '-10'
                //     },
                //     {
                //         id: 999,
                //         title: 'Repeating Event',
                //         start: YM + '-09T16:00:00',
                //         description: 'Lorem ipsum dolor sit ncididunt ut labore',
                //         className: "fc-event-danger"
                //     },
                //     {
                //         id: 1000,
                //         title: 'Repeating Event',
                //         description: 'Lorem ipsum dolor sit amet, labore',
                //         start: YM + '-16T16:00:00'
                //     },
                //     {
                //         title: 'Conference',
                //         start: YESTERDAY,
                //         end: TOMORROW,
                //         description: 'Lorem ipsum dolor eius mod tempor labore',
                //         className: "fc-event-primary"
                //     },
                //     {
                //         title: 'Meeting',
                //         start: TODAY + 'T10:30:00',
                //         end: TODAY + 'T12:30:00',
                //         description: 'Lorem ipsum dolor eiu idunt ut labore'
                //     },
                //     {
                //         title: 'Lunch',
                //         start: TODAY + 'T12:00:00',
                //         className: "fc-event-info",
                //         description: 'Lorem ipsum dolor sit amet, ut labore'
                //     },
                //     {
                //         title: 'Meeting',
                //         start: TODAY + 'T14:30:00',
                //         className: "fc-event-warning",
                //         description: 'Lorem ipsum conse ctetur adipi scing'
                //     },
                //     {
                //         title: 'Happy Hour',
                //         start: TODAY + 'T17:30:00',
                //         className: "fc-event-info",
                //         description: 'Lorem ipsum dolor sit amet, conse ctetur'
                //     },
                //     {
                //         title: 'Dinner',
                //         start: TOMORROW + 'T05:00:00',
                //         className: " fc-event-light",
                //         description: 'Lorem ipsum dolor sit ctetur adipi scing'
                //     },
                //     {
                //         title: 'Birthday Party',
                //         start: TOMORROW + 'T07:00:00',
                //         className: "fc-event-primary",
                //         description: 'Lorem ipsum dolor sit amet, scing'
                //     },
                //     {
                //         title: 'Click for Google',
                //         url: 'http://google.com/',
                //         start: YM + '-28',
                //         className: "fc-event-solid-info fc-event-light",
                //         description: 'Lorem ipsum dolor sit amet, labore'
                //     }
                // ]
                ,
                eventRender: function(info) {
                    var element = $(info.el);

                    if (info.event.extendedProps && info.event.extendedProps.description) {
                        if (element.hasClass('fc-day-grid-event')) {
                            element.data('content', info.event.extendedProps.description);
                            element.data('placement', 'top');
                            KTApp.initPopover(element);
                        } else if (element.hasClass('fc-time-grid-event')) {
                            element.find('.fc-title').append('<div class="fc-description">' + info.event.extendedProps.description + '</div>');
                        } else if (element.find('.fc-list-item-title').lenght !== 0) {
                            element.find('.fc-list-item-title').append('<div class="fc-description">' + info.event.extendedProps.description + '</div>');
                        }
                    }
                },
                eventResize: function(info) {
                    console.log(info);
                    var event_id=info.event.id;
                    var start=info.event.start.toUTCString();
                    var end=info.event.end.toUTCString();
                    // alert(start);
                    // alert(end);
                    $.ajax({
                        url: HOST_URL+'/admin/setting/editsechdual',
                        type: 'post',
                        data: {
                            'id': event_id,
                            'start':start,
                            'end':end
                        },
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        success: function (data) {
                            console.log(data);
                            // calendar.rerenderEvents();
                        },
                        error: function (error) {
                            console.log(error.responseText);
                            //
                        }
                    });
                },
                eventDrop: function(info) {
                    console.log('this is event');
                    console.log(info.delta);
                    console.log(info.event);
                    console.log(info.event.start);
                    console.log(info.event.end);
                    var event_id=info.event.id;
                    var start=info.event.start.toUTCString();

                    var end=info.event.end.toUTCString();

                    $.ajax({
                        url: HOST_URL+'/admin/setting/editsechdual',
                        type: 'post',
                        data: {
                            'id': event_id,
                            'start':start,
                            'end':end
                        },
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        success: function (data) {
                            console.log(data);
                            // calendar.rerenderEvents();
                        },
                        error: function (error) {
                            console.log(error.responseText);
                            //
                        }
                    });
                }
            });
            calendar.render();
        }
    };
}();

jQuery(document).ready(function() {
    KTAppsEducationSchoolCalendar.init();

});
