import './bootstrap';
import AOS from 'aos';
import 'aos/dist/aos.css';

import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import interactionPlugin from '@fullcalendar/interaction';

AOS.init();



document.addEventListener('DOMContentLoaded', () => {
    const calendarEl = document.getElementById('calendar');

    const calendar = new Calendar(calendarEl, {
        plugins: [dayGridPlugin, timeGridPlugin, interactionPlugin],
        initialView: 'dayGridMonth',
        editable: true, // Membolehkan drag-and-drop
        selectable: true, // Membolehkan pemilihan event
        // events: '/api/events', // Endpoint untuk mengambil data event
    });

    calendar.render();
});
