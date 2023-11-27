document.addEventListener('DOMContentLoaded', function() {
    // Fetch notices from the server and display them
    fetchNotices();
});

function fetchNotices() {
    // Make an AJAX request to fetch notices from the server
    // In a real-world scenario, you would use a more secure method (e.g., fetch API with headers)
    fetch('notice.php')
        .then(response => response.json())
        .then(data => {
            displayNotices(data);
        })
        .catch(error => {
            console.error('Error fetching notices:', error);
        });
}

function displayNotices(notices) {
    const noticesContainer = document.getElementById('notices-container');
    noticesContainer.innerHTML = ''; // Clear existing notices

    // Display each notice in the container
    notices.forEach(notice => {
        const noticeElement = document.createElement('div');
        noticeElement.className = 'notice';
        noticeElement.innerHTML = `<h3>${notice.title}</h3><p>${notice.content}</p>`;
        noticesContainer.appendChild(noticeElement);
    });
}
