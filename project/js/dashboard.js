// js/dashboard.js

document.addEventListener('DOMContentLoaded', () => {
    // Fetch user data
    fetch('php/api/get_user.php')
        .then(response => response.json())
        .then(user => {
            if (user.error) {
                console.error('Error:', user.error);
                // Redirect to login page if not logged in
                window.location.href = 'login.php';
            } else {
                // Update the DOM with user information
                document.getElementById('user-photo').src = user.photo;
                document.getElementById('user-name').textContent = user.username;
                // Populate edit profile form
                document.getElementById('edit-fullname').value = user.full_name;
                document.getElementById('edit-phone').value = user.phone;
                document.getElementById('edit-nid').value = user.nid;
                document.getElementById('edit-dob').value = user.date_of_birth;
            }
        })
        .catch(error => console.error('Error fetching user data:', error));

    // Fetch user's listings
    fetch('php/api/get_user_listings.php')
        .then(response => response.json())
        .then(listings => {
            const listingsContainer = document.getElementById('listings');
            listings.forEach(listing => {
                const listingCard = createListingCard(listing);
                listingsContainer.appendChild(listingCard);
            });
        })
        .catch(error => console.error('Error fetching user listings:', error));

    // Open and close modals
    const createListingModal = document.getElementById('create-listing-modal');
    const editProfileModal = document.getElementById('edit-profile-modal');
    const editListingModal = document.getElementById('edit-listing-modal');

    document.getElementById('create-listing-button').addEventListener('click', () => {
        createListingModal.style.display = 'block';
    });

    document.getElementById('edit-profile-button').addEventListener('click', () => {
        editProfileModal.style.display = 'block';
    });

    document.getElementById('close-create-modal').addEventListener('click', () => {
        createListingModal.style.display = 'none';
    });

    document.getElementById('close-edit-modal').addEventListener('click', () => {
        editProfileModal.style.display = 'none';
    });

    document.getElementById('close-edit-listing-modal').addEventListener('click', () => {
        editListingModal.style.display = 'none';
    });

    window.onclick = function (event) {
        if (event.target == createListingModal) {
            createListingModal.style.display = 'none';
        }
        if (event.target == editProfileModal) {
            editProfileModal.style.display = 'none';
        }
        if (event.target == editListingModal) {
            editListingModal.style.display = 'none';
        }
    };
});

function createListingCard(listing) {
    const card = document.createElement('div');
    card.className = 'listing-card';

    const img = document.createElement('img');
    img.src = listing.photos[0] || 'images/default.png'; // Default image if none
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

    // Actions
    const actions = document.createElement('div');
    actions.className = 'actions';

    const editButton = document.createElement('button');
    editButton.innerHTML = 'Edit';
    editButton.addEventListener('click', () => {
        openEditListingModal(listing);
    });
    actions.appendChild(editButton);

    const deleteButton = document.createElement('button');
    deleteButton.innerHTML = 'Delete';
    deleteButton.addEventListener('click', () => {
        // Delete listing
        if (confirm('Are you sure you want to delete this listing?')) {
            fetch('php/delete_listing.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `listing_id=${listing.listing_id}`
            })
                .then(response => response.text())
                .then(data => {
                    if (data.includes('successfully')) {
                        card.remove();
                    } else {
                        alert('Error deleting listing: ' + data);
                    }
                })
                .catch(error => console.error('Error deleting listing:', error));
        }
    });
    actions.appendChild(deleteButton);

    card.appendChild(actions);

    return card;
}

// Variables for the Edit Listing Modal
const editListingModal = document.getElementById('edit-listing-modal');
const closeEditListingModalButton = document.getElementById('close-edit-listing-modal');
const editListingForm = document.getElementById('edit-listing-form');

// Function to open the Edit Listing Modal and populate it with data
function openEditListingModal(listing) {
    // Populate the form fields with the existing listing data
    document.getElementById('edit-listing-id').value = listing.listing_id;
    document.getElementById('edit-title').value = listing.title;
    document.getElementById('edit-description').value = listing.description;
    document.getElementById('edit-price').value = listing.price;
    document.getElementById('edit-category').value = listing.category;
    document.getElementById('edit-location').value = listing.location;
    document.getElementById('edit-bedrooms').value = listing.bedrooms;

    // Show the modal
    editListingModal.style.display = 'block';
}

// Close the Edit Listing Modal
closeEditListingModalButton.addEventListener('click', () => {
    editListingModal.style.display = 'none';
});

// Close modal when clicking outside of it
window.onclick = function (event) {
    if (event.target == editListingModal) {
        editListingModal.style.display = 'none';
    }
};
