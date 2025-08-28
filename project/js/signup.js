document.getElementById('signup-form').addEventListener('submit', function (e) {
    const phone = document.getElementById('phone').value;
    const nid = document.getElementById('nid').value;
    const photo = document.getElementById('photo').files[0];

    if (!/^\d{11}$/.test(phone)) {
        alert('Phone number must be 11 digits.');
        e.preventDefault();
    }

    if (!/^\d{10}$/.test(nid)) {
        alert('NID must be 10 digits.');
        e.preventDefault();
    }

    if (!photo) {
        alert('Please upload a profile photo.');
        e.preventDefault();
    }
});
