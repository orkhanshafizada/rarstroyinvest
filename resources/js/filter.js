// resources/js/filter.js
document.addEventListener('DOMContentLoaded', function () {
    const filterForm = document.getElementById('filterForm');

    filterForm.addEventListener('change', function () {
        const formData = new FormData(filterForm);

        fetch(filterForm.action, {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
            },
            body: formData,
        })
            .then(response => response.json())
            .then(data => {
                document.getElementById('housesContainer').innerHTML = data.houses;
                document.getElementById('pagination').innerHTML = data.pagination;
            });
    });
});
