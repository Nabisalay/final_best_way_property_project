// Check for the presence of a session variable or authentication cookie
// Check for the presence of a session token or authentication status

//     let currentUrl = window.location.href;
//     if (currentUrl.indexOf('admin-panel.html') > -1){
//     if (!localStorage.getItem("sessionToken")) {
//       // Redirect the user back to the login page
//       window.location.href = "signup.html";
//     }
// }
function login(event) {
    event.preventDefault();
  
    const usernameInput = document.querySelector('#username');
    const passwordInput = document.querySelector('#password');
  
    // Make a POST request to the server with the login credentials
    fetch('serverscript.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: `username=${usernameInput.value}&password=${passwordInput.value}`
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        // Store the session tokSen in localStorage
        sessionStorage.setItem('sessionToken', data.sessionToken);
        confirm('login Successfully');
        passwordInput.style.border = "1px solid green";
        usernameInput.style.border = "1px solid green";
  
        // Redirect the user to the admin panel
        window.location.href = 'admin-panel.php';
      } else {
        // Display an error message
        confirm(data.error);
        passwordInput.style.border = "1px solid red";
        usernameInput.style.border = "1px solid red";
  

      }
    })
    .catch(error => {
      console.error('Error:', error);
    });
  }

// this is to show the password1
function showpassword(){
    document.getElementById('password').type = 'text'
};
// this is to hide the password1

function hidepassword(){
    document.getElementById('password').type = 'password'
};
// this is to show the password2

// this is for trending properties on the home page 



