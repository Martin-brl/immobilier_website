document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'fr',
        events: [
            {
                id: '1',
                title: 'Rendez-vous avec Jean-Pierre SEGADO',
                start: '2024-06-12T14:00:00',
                description: 'Adresse: 123 Rue de l\'Immobilier, 75001 Paris, Digicode: 1234'
            },
            // Ajoutez ici d'autres événements de rendez-vous
        ],
        dateClick: function(info) {
            var dateStr = info.dateStr;
            var eventsOnDate = calendar.getEvents().filter(event => event.startStr === dateStr);
            if (eventsOnDate.length > 0) {
                var event = eventsOnDate[0];
                if (confirm('Vous avez un rendez-vous ce jour-là: ' + event.title + '\nDescription: ' + event.extendedProps.description + '\nVoulez-vous annuler ce rendez-vous ?')) {
                    event.remove();
                    alert('Rendez-vous annulé avec succès.');
                }
            } else {
                if (confirm('Aucun rendez-vous ce jour-là. Souhaitez-vous en créer un ?')) {
                    var title = prompt('Entrez le titre du rendez-vous:');
                    var description = prompt('Entrez la description du rendez-vous:');
                    if (title && description) {
                        calendar.addEvent({
                            id: dateStr,
                            title: title,
                            start: dateStr,
                            description: description
                        });
                        alert('Rendez-vous créé avec succès.');
                    }
                }
            }
        },
        eventClick: function(info) {
            if (confirm('Voulez-vous annuler ce rendez-vous: ' + info.event.title + '?')) {
                info.event.remove();
                alert('Rendez-vous annulé avec succès.');
            }
        }
    });

    calendar.render();
});
