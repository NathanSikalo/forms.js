// JavaScript function to validate form
function validateForm() {
    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirmPassword").value;
    var errorMessage = "";


    // Validation rules
    if (username.trim() == "") {
        errorMessage += "Username cannot be empty.\n";
    }

    // Email validation
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        errorMessage += "Invalid email address.\n";
    }

    // Password validation
    if (password.length < 8) {
        errorMessage += "Password must be at least 8 characters long.\n";
    }

    // Confirm password validation
    if (password !== confirmPassword) {
        errorMessage += "Passwords do not match.\n";
    }

    // Display error message if any
    if (errorMessage !== "") {
        alert(errorMessage);
        return false; // Prevent form submission
    }
    return true; // Form is valid
}