<script>
    $(document).ready(function() {
        // Initialize DataTable
        $('#genresTable').DataTable();

        // Prepare data for Chart.js
        const genreData = <?php echo json_encode($genres); ?>;
        const labels = genreData.map(item => item.genre_name);
        const data = genreData.map(item => item.num_shows);

        // Create Chart
        const ctx = document.getElementById('genresChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Number of Shows',
                    data: data,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false // Optional: hides the legend
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Number of Shows' // Optional: y-axis label
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Genres' // Optional: x-axis label
                        }
                    }
                }
            }
        });
    });
</script>
