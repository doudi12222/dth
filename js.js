var isSignedUp = false; 

function restrictAccess() {
    if (!isSignedUp) {
        // Show the signup modal
        document.getElementById('overlay').style.display = 'block';
        document.getElementById('signupModal').style.display = 'block';
    } else {
        // Allow access or redirect to the content page
        window.location.href = '/restricted-content';
    }
}



// Optional: Close modal when clicking on a "close" button inside the modal
document.getElementById('closeModalButton').onclick = function() {
    document.getElementById('signupModal').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
};



