const loginText = document.querySelector(".title-text .login");
const loginForm = document.querySelector("form.login");
const loginBtn = document.querySelector("label.login");
const signupBtn = document.querySelector("label.signup");
const signupLink = document.querySelector("form .signup-link a");
signupBtn.onclick = () => {
  loginForm.style.marginLeft = "-50%";
  loginText.style.marginLeft = "-50%";
};
loginBtn.onclick = () => {
  loginForm.style.marginLeft = "0%";
  loginText.style.marginLeft = "0%";
};
signupLink.onclick = () => {
  signupBtn.click();
  return false;
};


// validation in js implementation of the signup 
function validate() {
    var uname = document.forms["signupForm"]["uname"].value;
    var pwd = document.forms["signupForm"]["pwd"].value;
    var cpwd = document.forms["signupForm"]["cpwd"].value;

    if (uname == null || uname === "") {
        alert("Username Should not be empty");
        return false;
    }
    if (pwd == null || pwd === "") {
        alert("Password Should not be empty");
        return false;
    }
    if (pwd.length < 6) {
        alert("Password must be greater than 6 characters");
        return false;
    }
    if (cpwd !== pwd) {
        alert("Confirm Password must match with password");
        return false;
    }
    else {
        alert("Registration Successful !!!!!");
        return true;
    }
}
//jquery implementation of the login

$(document).ready(function () {
    $('form[name="loginForm"]').submit(function (event) {
        event.preventDefault();

        // Reset error messages
        $('.error').text('');

        // Get input values
        var username = $('input[name="uname"]').val();
        var password = $('input[name="pwd"]').val();

        if (username.trim() === '') {
            $('#usernameError').text('Username is required');
            return;
        }

        if (password.trim() === '') {
            $('#passwordError').text('Password is required');
            return;
        }

        // If all validations pass, submit the form
        this.submit();
    });
});

