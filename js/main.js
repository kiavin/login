<script>
    // Get references to the password input fields
    const passwordField = document.getElementById('pass');
    const rePasswordField = document.getElementById('re_pass');

    // Get reference to the message element
    const passwordMatchMessage = document.getElementById('password-match-message');

    // Function to check password match and update styling
    function checkPasswordMatch() {
        const password = passwordField.value;
        const reEnteredPassword = rePasswordField.value;

        if (password === reEnteredPassword) {
            // Passwords match
            passwordField.style.borderColor = 'green';
            rePasswordField.style.borderColor = 'green';
            passwordMatchMessage.textContent = 'Passwords match';
            passwordMatchMessage.style.color = 'green';
        } else {
            // Passwords do not match
            passwordField.style.borderColor = 'red';
            rePasswordField.style.borderColor = 'red';
            passwordMatchMessage.textContent = 'Passwords do not match. Please try again.';
            passwordMatchMessage.style.color = 'red';
        }
    }

    // Add event listeners to the password input fields
    passwordField.addEventListener('input', checkPasswordMatch);
    rePasswordField.addEventListener('input', checkPasswordMatch);
</script>
