
let ec = new EventCalendar(document.getElementById('ec'), {
    view: 'timeGridWeek',
    height: '100%',
    outerWidth: '100%',
    headerToolbar: {
        start: 'prev,next today',
        center: 'title',
        end: 'timeGridWeek,timeGridDay,listWeek'
    },
    buttonText: function (texts) {
        texts.resourceTimeGridWeek = 'resources';
        return texts;
    },
    resources: [
        { id: 1, title: 'Resource A' },
        { id: 2, title: 'Resource B' }
    ],
    scrollTime: '09:00:00',
    eventColor: '#5a181a',
    eventTextColor: '#837651',
    events: createEvents(),
    views: {
        timeGridWeek: { pointer: true },
        resourceTimeGridWeek: { pointer: true }
    },
    dayMaxEvents: true,
    nowIndicator: true,
    selectable: false,
    eventStartEditable: false,
    eventDurationEditable: false,

});

function createEvents() {
    let days = [];
    for (let i = 0; i < 7; ++i) {
        let day = new Date();
        let diff = i - day.getDay();
        day.setDate(day.getDate() + diff);
        days[i] = day.getFullYear() + "-" + _pad(day.getMonth() + 1) + "-" + _pad(day.getDate());
    }

    return [
        { start: "2023-08-16T21:26", end: "2023-08-16T22:26", resourceId: 1, title: "The calendar can display background and regular events" },
        { start: days[1] + " 16:00", end: days[2] + " 08:00", resourceId: 2, title: "An event may span to another day" },
        { start: days[2] + " 09:00", end: days[2] + " 13:00", resourceId: 2, title: "Events can be assigned to resources and the calendar has the resources view built-in" },
        { start: days[3] + " 14:00", end: days[3] + " 20:00", resourceId: 1, title: "" },
        { start: days[3] + " 15:00", end: days[3] + " 18:00", resourceId: 1, title: "Overlapping events are positioned properly" },
        { start: days[5] + " 10:00", end: days[5] + " 16:00", resourceId: 2, titleHTML: "You have complete control over the <i><b>display</b></i> of events…" },
        { start: days[5] + " 14:00", end: days[5] + " 19:00", resourceId: 2, title: "…and you can drag and drop the events!" },
        { start: days[5] + " 18:00", end: days[5] + " 21:00", resourceId: 2, title: "" },
    ];
}

function _pad(num) {
    let norm = Math.floor(Math.abs(num));
    return (norm < 10 ? '0' : '') + norm;
}

