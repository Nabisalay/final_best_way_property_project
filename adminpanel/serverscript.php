<?php
session_start();

// Replace the database credentials with your own
$servername = "localhost";
$username = "Nabisalay";
$password = "Nabisalayroot";
$dbname = "best_way_properties";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the username and password are provided in the POST request
if (isset($_POST['username']) && isset($_POST['password'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Prepare and bind the statement to prevent SQL injection
  $stmt = $conn->prepare("SELECT * FROM admin_panel_pass WHERE username = ? AND password = ?");
  $stmt->bind_param("ss", $username, $password);

  // Execute the statement
  $stmt->execute();

  // Get the result
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    // The credentials are valid

    // Generate a session token
    function generateSessionToken() {
      $length = 32;
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $token = '';

      for ($i = 0; $i < $length; $i++) {
        $randomIndex = mt_rand(0, strlen($characters) - 1);
        $token .= $characters[$randomIndex];
      }

      return $token;
    }

    // Set the session variables
    $_SESSION['loggedin'] = true;
    $_SESSION['sessionToken'] = generateSessionToken();

    // Return the success response with the session token
    echo json_encode(['success' => true, 'sessionToken' => $_SESSION['sessionToken']]);
    exit;
  } else {
    // The credentials are invalid
    echo json_encode(['success' => false, 'error' => 'Invalid username or password']);
    exit;
  }
}

// Close the database connection
$conn->close();
?>
