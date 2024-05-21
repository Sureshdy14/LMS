
// Function to handle logout and redirection
function logoutAndRedirect() {
    // Redirect to the desired page
    window.location.href = "login.php"; // Change "redirect_page.html" to your desired page
    
    // Alternatively, if you want to redirect to a different URL, you can use:
    // window.location.href = "https://example.com";
}

// Adding click event listener to the logout button
document.getElementById("logoutButton").addEventListener("click", logoutAndRedirect);


