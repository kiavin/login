function matchPasskey() {
document
    .getElementById("register-form")
    .addEventListener("submit", function (event) {
        var pass1 = document.getElementById("pass1").value;
        var pass2 = document.getElementById("pass2").value;

        if (pass1 !== pass2) {
            event.preventDefault(); // Prevent form submission
            document.getElementById("errorText").textContent =
                "Passwords do not match.";
            document.getElementById("pass1").value = "";
            document.getElementById("pass2").value = "";
        } else {
            document.getElementById("errorText").textContent = "";
        }
    });
// Reset the password fields and error message when changing the values
document.getElementById("pass1").addEventListener("input", function () {
    document.getElementById("errorText").textContent = "";
});

document.getElementById("pass2").addEventListener("input", function () {
    document.getElementById("errorText").textContent = "";
});
} 
