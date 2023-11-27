document.addEventListener("DOMContentLoaded", function() {
    loadEvents();
});

function loadEvents() {
    // Fetch and display events using Fetch API
    fetch('events.php?type=notice') // Adjust the URL based on your server setup
        .then(response => response.json())
        .then(events => {
            // Handle the retrieved events
            displayEvents(events, 'upcoming-events');
        })
        .catch(error => console.error('Error fetching events:', error));
}

function uploadEvent() {
    // Get form data
    const title = document.getElementById('event-title').value;
    const date = document.getElementById('event-date').value;
    const type = document.getElementById('event-type').value;
    const fileInput = document.getElementById('event-file');
    const file = fileInput.files[0];

    // Create FormData object to send files
    const formData = new FormData();
    formData.append('title', title);
    formData.append('date', date);
    formData.append('type', type);
    formData.append('file', file);

    // Fetch API for uploading events
    fetch('event.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(result => {
        console.log('Event uploaded successfully:', result);
        // Optionally, update the UI or show a success message
    })
    .catch(error => console.error('Error uploading event:', error));
}

function displayEvents(events, containerId) {
    const container = document.getElementById(containerId);

    // Clear previous content
    container.innerHTML = '';

    // Iterate through events and create elements
    events.forEach(event => {
        const eventElement = document.createElement('div');
        eventElement.innerHTML = `
            <h3>${event.title}</h3>
            <p>Date: ${event.date}</p>
            <p>Type: ${event.type}</p>
            <p><a href="${event.file}" target="_blank">View Event</a></p>
        `;
        container.appendChild(eventElement);
    });
}

