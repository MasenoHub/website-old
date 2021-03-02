import { Calendar } from "@fullcalendar/core";
import dayGridPlugin from "@fullcalendar/daygrid";
import timeGridPlugin from "@fullcalendar/timegrid";
import listPlugin from "@fullcalendar/list";

const calendarElement = document.getElementById("calendar");

const calendar = new Calendar(calendarElement, {
    plugins: [dayGridPlugin, timeGridPlugin, listPlugin],
    initialView: "dayGridMonth",
    headerToolbar: {
        left: "prev,next today",
        center: "title",
        right: "dayGridMonth,listWeek,timeGridDay",
    },

    events: events,

    weekNumbers: true,
    navLinks: true,

    // businessHours: {
    //     daysOfWeek: [1, 2, 3, 4, 5],
    //     startTime: "07:00",
    //     endTime: "16:00",
    // },

    dayMaxEventRows: true,
    // eventClick: function (info) {
    //     const event = info.event;
    // },
});

calendar.render();