document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('search');

    searchInput.addEventListener('keyup', function () {
        const query = this.value;

        fetch(`/dashboard?search=${query}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.text())
        .then(html => {
            document.getElementById('ticket-table').innerHTML = html;
        });
    });
});