// formPersistence.js
document.addEventListener('DOMContentLoaded', function () {
    // Check if form data is stored in sessionStorage
    if (sessionStorage.getItem('formData')) {
        const formData = JSON.parse(sessionStorage.getItem('formData'));
        document.getElementById('name').value = formData.name;
        document.getElementById('email').value = formData.email;
        document.getElementById('mobile').value = formData.mobile;
        // Populate other form fields
    }

    // Save form data to sessionStorage when the form is submitted
    document.getElementById('register-form').addEventListener('submit', function (event) {
        event.preventDefault();
        const formData = {
            name: document.getElementById('name').value,
            email: document.getElementById('email').value,
            mobile: document.getElementById('mobile').value,
            // Gather other form field values
        };
        sessionStorage.setItem('formData', JSON.stringify(formData));
        // Submit the form to the server if needed
    });
});
