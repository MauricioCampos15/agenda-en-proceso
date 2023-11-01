

document.addEventListener('DOMContentLoaded', function() {
var calendarEl = document.getElementById('agenda');
var calendar = new FullCalendar.Calendar(calendarEl, {
    locale:"es",
    headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,listWeek'
    },

    
    

    initialView: 'dayGridMonth'
           

});

calendar.render();
});
