// go to the welome page
function welcomePage() {
    window.location.href = 'index.html';
}

// check the inputs, and go to the next page, if everything is good
function signingIn() {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    // checking if the username and the password are empty
    if (username.trim() == '' && password.trim() == '') {
        alert('Username and password cannot be empty');
        return false;
    }

    // checking if the username is empty
    if (username.trim() == '') {
        alert('Username cannot be empty');
        return false;
    }

    // checking if the password is empty
    if (password.trim() == '') {
        alert('Passowrd cannot be empty');
        return false;
    }

    // if everything is good, go to the databoard's page
    window.location.href = "databoard.html";
}