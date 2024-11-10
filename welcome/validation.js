function validateForm() {
    // Get the form fields
    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;

    // Name validation
    if (username === "") {
        alert("Name must be filled out");
        return false;
    }

    // Email validation (basic pattern check)
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address");
        return false;
    }
    var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{6,}$/;
    // Validate password
    if (!passwordPattern.test(password)) {
        alert("Password must be at least 6 characters long, contain at least one lowercase letter, one uppercase letter, one number, and one special character.");
        return false;
    }

    // If all validations pass, return true to allow form submission
    //
    return true;
}
