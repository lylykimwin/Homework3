function toggleDirectorDetails(directorId) {
    const details = document.getElementById(`details-${directorId}`);
    details.style.display = details.style.display === 'none' ? 'block' : 'none';
}

function addHoverEffect(showId) {
    const show = document.getElementById(`show-${showId}`);
    show.onmouseover = () => { show.style.backgroundColor = "#f0f8ff"; };
    show.onmouseout = () => { show.style.backgroundColor = ""; };
}

function validateShowForm() {
    const title = document.getElementById("show-title").value;
    const year = document.getElementById("release-year").value;
    if (!title || !year || isNaN(year)) {
        alert("Please enter a valid title and release year.");
        return false;
    }
    return true;
}

function sortShowsByYear() {
    const showsContainer = document.getElementById("shows-container");
    const shows = Array.from(showsContainer.children);
    shows.sort((a, b) => {
        const yearA = parseInt(a.dataset.year);
        const yearB = parseInt(b.dataset.year);
        return yearA - yearB;
    });
    showsContainer.innerHTML = '';
    shows.forEach(show => showsContainer.appendChild(show));
}

function confirmDirectorDeletion(directorName) {
    return confirm(`Are you sure you want to delete the director: ${directorName}?`);
}