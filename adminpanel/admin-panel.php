<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best Way Properties</title>

    
    <!-- Favicon  -->
    <link rel="icon" type="image/x-icon" href="./PICS/new-icon.png">

    

    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">




    <!-- Font Awesome -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.css">
    
            <!-- custom.css -->

            <link rel="stylesheet" href="styles.css">

  </head>
  <body>
    <div class="wrapper">
      <div class="main-container">
       <div class="right-side">

      </div>

      <div class="left-side">

      </div>

      </div>
    </div>
                               <!-- jQuery -->
                               <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
                               
                               <!-- Bootstrap JavaScript -->
                               <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
                               

                               <!-- <script src="databs.js" ></script> -->
                               <!-- custom javacript  -->
                               <script src="signup.js"></script>

                               <script>
                                    if (!sessionStorage.getItem("sessionToken")) {
      // Redirect the user back to the login page
      window.location.href = "signup.html";
    }

// Add an event listener to clear the session token when the user exits the page
window.addEventListener('beforeunload', function() {
  sessionStorage.removeItem('sessionToken');
});
                               </script>
   
                </body>
                </html>