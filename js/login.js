document.addEventListener("DOMContentLoaded", function() {
    // Get the login form element
    const loginForm = document.getElementById("loginForm");

    // Add event listener for form submission
    loginForm.addEventListener("submit", function(event) {
        // Prevent the default form submission
        event.preventDefault();

        // Get form data
        const formData = new FormData(loginForm);

        // Make an AJAX request
        fetch('/login', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            // Handle the response from the server
            console.log(data); // Log the response for debugging

            // Example: Redirect to a new page after successful login
            window.location.href = '/dashboard'; // Replace '/dashboard' with your desired redirect URL
        })
        .catch(error => {
            // Handle errors
            console.error('Error:', error);
            // Example: Display an error message to the user
            alert('An error occurred. Please try again.');
        });
    });
});
