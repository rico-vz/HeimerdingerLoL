document.addEventListener('DOMContentLoaded', function () {
    const laneFilters = document.querySelectorAll('.lane-filter');
    const championDivs = document.querySelectorAll('.champ-card');

    laneFilters.forEach((filter) => {
        filter.addEventListener('click', function () {
            const selectedLane = filter.getAttribute('data-lane');

            if (filter.classList.contains('opacity-100')) {
                // If the filter is already active, unselect it and show all
                championDivs.forEach((championDiv) => {
                    championDiv.style.display = 'block';
                });
                filter.classList.remove('opacity-100');
                filter.classList.add('opacity-40');
            } else {
                // If the filter is not active, activate it and filter champions
                laneFilters.forEach((otherFilter) => {
                    otherFilter.classList.remove('opacity-100');
                    otherFilter.classList.add('opacity-40');
                });
                filter.classList.remove('opacity-40');
                filter.classList.add('opacity-100');

                championDivs.forEach((championDiv) => {
                    if (selectedLane === 'All' || championDiv.classList.contains('POS-' + selectedLane)) {
                        championDiv.style.display = 'block';
                    } else {
                        championDiv.style.display = 'none';
                    }
                });
            }
        });
    });
});
