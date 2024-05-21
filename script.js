








// Check if user is logged in
    function isLoggedIn() {
        // You can implement your own logic here to check if the user is logged in
        // For demonstration purpose, I'll use a simple boolean variable
        var isLoggedIn = false; // Change this to true if the user is logged in
        return isLoggedIn;
    }

    // Handle form submission
    document.getElementById("registrationForm").onsubmit = function() {
        if (!isLoggedIn()) {
            alert("You need to be logged in to register.");
            return false; // Prevent form submission
        }
        
    };


   

//name



//email
function validateEmail(email) {
    // Regular expression to validate email
    var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    // Check if email matches the regex pattern
    if (emailRegex.test(email)) {
        return true;
    } else {
        
        return false; // Return false to indicate validation failure
    }
}


//phone 
 document.getElementById('phonenumber').addEventListener('input', function (e) {
        var phoneInput = e.target.value;
        var phoneError = document.getElementById('phoneError');
        
        if (!/^\d{10}$/.test(phoneInput)) {
            phoneError.textContent = 'Please enter a 10-digit phone number.';
        } else {
            phoneError.textContent = '';
        }
    });



//date
 // Get the input element
    var datePicker = document.getElementById('dob');

    // Get the current date
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; // January is 0!
    var yyyy = today.getFullYear();

    if (dd < 10) {
        dd = '0' + dd;
    }

    if (mm < 10) {
        mm = '0' + mm;
    }

    today = yyyy + '-' + mm + '-' + dd;

    // Set the minimum date for the input field
    datePicker.setAttribute('max', today);


