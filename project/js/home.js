document.addEventListener('DOMContentLoaded', () => {
    // Fetch featured listings
    fetch('php/api/get_featured_listings.php')
        .then(response => response.json())
        .then(data => {
            const listingsContainer = document.getElementById('listings-container');
            data.forEach(listing => {
                const listingCard = createListingCard(listing);
                listingsContainer.appendChild(listingCard);
            });
        })
        .catch(error => console.error('Error fetching featured listings:', error));

    // Search button event
    document.getElementById('search-button').addEventListener('click', () => {
        const location = document.getElementById('location-filter').value;
        const minPrice = document.getElementById('min-price-filter').value;
        const maxPrice = document.getElementById('max-price-filter').value;
        const category = document.getElementById('category-filter').value;

        const queryParams = new URLSearchParams({
            location,
            minPrice,
            maxPrice,
            category
        });

        window.location.href = `listing.php?${queryParams.toString()}`;
    });
});

function createListingCard(listing) {
    const card = document.createElement('div');
    card.className = 'listing-card';

    const img = document.createElement('img');
    img.src = listing.photos[0]; // Assuming photos is an array of image URLs
    card.appendChild(img);

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

    card.appendChild(details);

    return card;
}
