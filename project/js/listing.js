// js/listing.js

document.addEventListener('DOMContentLoaded', () => {
    // Get query parameters from URL
    const params = new URLSearchParams(window.location.search);
    const filters = {
        location: params.get('location') || '',
        minPrice: params.get('minPrice') || '',
        maxPrice: params.get('maxPrice') || '',
        bedrooms: params.get('bedrooms') || '',
        category: params.get('category') || '',
        sortBy: params.get('sortBy') || 'date_posted'
    };

    // Set filter inputs with existing values
    document.getElementById('location-filter').value = filters.location;
    document.getElementById('min-price-filter').value = filters.minPrice;
    document.getElementById('max-price-filter').value = filters.maxPrice;
    document.getElementById('bedrooms-filter').value = filters.bedrooms;
    document.getElementById('category-filter').value = filters.category;
    document.getElementById('sort-by').value = filters.sortBy;

    // Fetch listings based on filters
    fetchListings(filters);

    // Search button event
    document.getElementById('search-button').addEventListener('click', () => {
        const location = document.getElementById('location-filter').value;
        const minPrice = document.getElementById('min-price-filter').value;
        const maxPrice = document.getElementById('max-price-filter').value;
        const bedrooms = document.getElementById('bedrooms-filter').value;
        const category = document.getElementById('category-filter').value;
        const sortBy = document.getElementById('sort-by').value;

        const queryParams = new URLSearchParams({
            location,
            minPrice,
            maxPrice,
            bedrooms,
            category,
            sortBy
        });

        // Reload page with new query parameters
        window.location.href = `listing.php?${queryParams.toString()}`;
    });
});

function fetchListings(filters) {
    const queryParams = new URLSearchParams(filters);

    fetch(`php/fetch_listings.php?${queryParams.toString()}`)
        .then(response => response.json())
        .then(data => {
            const listingsContainer = document.getElementById('listings-container');
            listingsContainer.innerHTML = ''; // Clear existing listings
            data.forEach(listing => {
                const listingCard = createListingCard(listing);
                listingsContainer.appendChild(listingCard);
            });
        })
        .catch(error => console.error('Error fetching listings:', error));
}

function createListingCard(listing) {
    const card = document.createElement('div');
    card.className = 'listing-card';

    const link = document.createElement('a');
    link.href = `listing_details.php?listing_id=${listing.listing_id}`;

    const img = document.createElement('img');
    img.src = listing.photos[0] || 'images/default.png';
    link.appendChild(img);

    const details = document.createElement('div');
    details.className = 'details';

    const title = document.createElement('h3');
    title.textContent = listing.title;
    details.appendChild(title);

    const price = document.createElement('p');
    price.className = 'price';
    price.textContent = `৳${listing.price}`;
    details.appendChild(price);

    const location = document.createElement('p');
    location.textContent = listing.location;
    details.appendChild(location);

    link.appendChild(details);

    card.appendChild(link);

    return card;
}
