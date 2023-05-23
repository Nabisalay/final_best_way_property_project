<?php
// Replace the database credentials with your own
$servername = "localhost";
$username = "Nabisalay";
$password = "Nabisalayroot";
$dbname = "best_way_properties";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


// // Check if the review data is present in the POST request
if (isset($_POST['review'])) {

  // Decode the JSON string to retrieve the review object
  $review = json_decode($_POST['review'], true);


        // Access the properties of the review object
  $img = mysqli_real_escape_string($conn, $review['img']);
  $name = mysqli_real_escape_string($conn, $review['name']);
  $status = mysqli_real_escape_string($conn, $review['status']);
  $reviewText = mysqli_real_escape_string($conn, $review['review']);
  $complement = mysqli_real_escape_string($conn, $review['complement']);
  $rating = mysqli_real_escape_string($conn, $review['rating']);

      // Shift existing data to subsequent rows
      $conn->query("UPDATE client_reviews SET review_id  = review_id  + 1 ORDER BY review_id  DESC");
      
    // Prepare and bind the statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO client_reviews (review_id, image, name, status, review, complement, ratting) 
    VALUES (1, ?, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE image = VALUES(image), name = VALUES(name), status = VALUES(status), review = VALUES(review), complement = VALUES(complement), ratting = VALUES(ratting)");
    $stmt->bind_param("ssssss", $img, $name, $status, $reviewText, $complement, $rating);

      // Execute the statement
  $stmt->execute();

  // Close the prepared statement
  $stmt->close();

    // Set the content type header to application/json
    header('Content-Type: application/json');

// main issue have to ask from  the sir 

    // echo json_encode(['success' => true]);
  // } else {
  // //   // If the review data is not present, send an error response
  //   echo json_encode(['success' => false, 'error' => 'Review data not received']);
  }



if (isset($_POST['add_listing_message1'])) {
  // Decode the JSON string to retrieve the review object
  $add_listing_message = json_decode($_POST['add_listing_message1'], true);

  // Access the properties of the review object
  $listingname = mysqli_real_escape_string($conn, $add_listing_message['listing_name']);
  $listngemail = mysqli_real_escape_string($conn, $add_listing_message['listing_email']);
  $listingphone = mysqli_real_escape_string($conn, $add_listing_message['listing_phone']);
  $listinglocation = mysqli_real_escape_string($conn, $add_listing_message['location']);
  $listingconcern = mysqli_real_escape_string($conn, $add_listing_message['concern']);

    // Shift existing data to subsequent rows
    $conn->query("UPDATE property_listing_contact_info SET listing_msg_id = listing_msg_id + 1 ORDER BY listing_msg_id DESC");

  // Prepare and bind the statement to prevent SQL injection
  $stmt = $conn->prepare("INSERT INTO property_listing_contact_info (listing_msg_id, name, email, phone_number, property_location, concern)
   VALUES (1, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE name = VALUES(name), email = VALUES(email), phone_number = VALUES(phone_number), property_location = VALUES(property_location), concern = VALUES(concern)");
  $stmt->bind_param("sssss", $listingname, $listngemail, $listingphone, $listinglocation, $listingconcern);

  // Execute the statement
  $stmt->execute();

  // Close the prepared statement
  $stmt->close();

  // Set the content type header to application/json
  header('Content-Type: application/json');

}

// this is for the contact us info filled by user 

if (isset($_POST['add_contact_info'])) {
  // Decode the JSON string to retrieve the review object
  $contact_info = json_decode($_POST['add_contact_info'], true);

  // Access the properties of the review object
  $infofrist_name = mysqli_real_escape_string($conn, $contact_info['first_name']);
  $infolast_name = mysqli_real_escape_string($conn, $contact_info['last_name']);
  $infoemail = mysqli_real_escape_string($conn, $contact_info['email']);
  $infophone = mysqli_real_escape_string($conn, $contact_info['phone_number']);
  $infomessage = mysqli_real_escape_string($conn, $contact_info['message']);

    // Shift existing data to subsequent rows
    $conn->query("UPDATE contact_us_form_info SET customer_id  = customer_id  + 1 ORDER BY customer_id  DESC");

  // Prepare and bind the statement to prevent SQL injection
  $stmt = $conn->prepare("INSERT INTO contact_us_form_info (customer_id, first_name, last_name, email, Phone_no, message)
   VALUES (1, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE first_name = VALUES(first_name), last_name = VALUES(last_name), email = VALUES(email), Phone_no = VALUES(Phone_no),  message = VALUES(message)");
  $stmt->bind_param("sssss", $infofrist_name, $infolast_name, $infoemail, $infophone, $infomessage);

  // Execute the statement
  $stmt->execute();

  // Close the prepared statement
  $stmt->close();

  // Set the content type header to application/json
  header('Content-Type: application/json');

}
// this is for the schedule contact us info filled by user 

if (isset($_POST['add_Schedule_contact_info'])) {
  // Decode the JSON string to retrieve the review object
  $Schedule_contact_info = json_decode($_POST['add_Schedule_contact_info'], true);

  // Access the properties of the review object
  $Schedulefrist_name = mysqli_real_escape_string($conn, $Schedule_contact_info['first_name']);
  $Schedulelast_name = mysqli_real_escape_string($conn, $Schedule_contact_info['last_name']);
  $Schedule_email = mysqli_real_escape_string($conn, $Schedule_contact_info['email']);
  $Schedule_phone = mysqli_real_escape_string($conn, $Schedule_contact_info['phone_number']);
  $Schedule_date = mysqli_real_escape_string($conn, $Schedule_contact_info['date']);
  $Schedule_days = mysqli_real_escape_string($conn, $Schedule_contact_info['selectedDay']);
  $Schedule_year = mysqli_real_escape_string($conn, $Schedule_contact_info['year']);
  $Schedule_time = mysqli_real_escape_string($conn, $Schedule_contact_info['time']);
  $Schedule_message = mysqli_real_escape_string($conn, $Schedule_contact_info['message']);

    // Shift existing data to subsequent rows
    $conn->query("UPDATE tour_contact_info SET tour_customer_id  = tour_customer_id  + 1 ORDER BY tour_customer_id  DESC");

  // Prepare and bind the statement to prevent SQL injection
  $stmt = $conn->prepare("INSERT INTO tour_contact_info (tour_customer_id, first_name, last_name, email, Phone_no, date, day, year, time, message)
   VALUES (1, ?, ?, ?, ?, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE first_name = VALUES(first_name), last_name = VALUES(last_name), email = VALUES(email), Phone_no = VALUES(Phone_no), date = VALUES(date), day = VALUES(day), year = VALUES(year), time = VALUES(time), message = VALUES(message)");
  $stmt->bind_param("sssssssss", $Schedulefrist_name, $Schedulelast_name, $Schedule_email, $Schedule_phone, $Schedule_date, $Schedule_days, $Schedule_year, $Schedule_time, $Schedule_message);

  // Execute the statement
  $stmt->execute();

  // Close the prepared statement
  $stmt->close();

  // Set the content type header to application/json
  header('Content-Type: application/json');

}
if (isset($_POST['subscription_email'])) {
  // Decode the JSON string to retrieve the email object
  $email_subscription = json_decode($_POST['subscription_email'], true);

  // Access the properties of the email object
  $email = mysqli_real_escape_string($conn, $email_subscription['email']);

  // Shift existing data to subsequent rows
  $conn->query("UPDATE newsletter_subscription SET subscription_id = subscription_id + 1 ORDER BY subscription_id DESC");

  // Prepare and bind the statement to prevent SQL injection
  $stmt = $conn->prepare("INSERT INTO newsletter_subscription (subscription_id, email_address) 
    VALUES (1, ?) ON DUPLICATE KEY UPDATE email_address = VALUES(email_address)");
  $stmt->bind_param("s", $email);

  // Execute the statement
  $stmt->execute();

  // Close the prepared statement
  $stmt->close();

  // Set the content type header to application/json
  header('Content-Type: application/json');

  // Echo a success response
  // echo json_encode(['success' => true]);
}

// if (isset($_POST['add_listing_message1'])) {

//   // Decode the JSON string to retrieve the review object
//   $add_listing_message = json_decode($_POST['add_listing_message1'], true);

//   // Access the properties of the review object
//   $listingname = mysqli_real_escape_string($conn, $add_listing_message['listing_name']);
//   $listngemail = mysqli_real_escape_string($conn, $add_listing_message['listing_email']);
//   $listingphone = mysqli_real_escape_string($conn, $add_listing_message['listing_phone']);
//   $listinglocation = mysqli_real_escape_string($conn, $add_listing_message['location']);
//   $listingconcern = mysqli_real_escape_string($conn, $add_listing_message['concern']);

//   // Prepare and bind the statement to prevent SQL injection
//   $stmt = $conn->prepare("INSERT INTO property_listing_contact_info (name, email, phone_number, property_location, concern) VALUES (?, ?, ?, ?, ?)");
//   $stmt->bind_param("sssss", $listingname, $listngemail, $listingphone, $listinglocation, $listingconcern);

//   // Execute the statement
//   $stmt->execute();

//   // Close the prepared statement
//   $stmt->close();

//   // Set the content type header to application/json
//   header('Content-Type: application/json');

//   // Add the data entered by the user to the first row of the table, and if the data already exists in the table, it will update the existing data with the new data
//   $sql = "UPDATE property_listing_contact_info SET first_column = name WHERE listing_msg_id = 1";
//   $result = mysqli_query($conn, $sql);

//   // Check if the query was successful
// //   if ($result) {
// //       // Success
// //       echo json_encode(['success' => true]);
// //   } else {
// //       // Failure
// //       echo json_encode(['success' => false, 'error' => 'Error updating data']);
// //   }

// // } else {
// //   // Review data not received
// //   echo json_encode(['success' => false, 'error' => 'Review data not received']);
// }



// Run the SQL query to get the properties from the database
$sql_property = "SELECT * FROM properties_collection_basic";
$result_property = $conn->query($sql_property);

// Create an array to hold the properties data
$properties = array();

// Check if the query returned any results
if ($result_property->num_rows > 0) {
  // Loop through the results and add each property to the array
  while($row = $result_property->fetch_assoc()) {
    $properties[] = $row;
  }
}


// Run the SQL query to get the client reviews from the database
$sql_client_review = "SELECT * FROM client_reviews ";
$result_client_review = $conn->query($sql_client_review);

// Create an array to hold the properties data
$client_review_data = array();

// Check if the query returned any results
if ($result_client_review->num_rows > 0) {
  // Loop through the results and add each property to the array
  while($row = $result_client_review->fetch_assoc()) {
    $client_review_data[] = $row;
  }
}

// Run the SQL query to get the client reviews from the database
$sql_all_properties = "SELECT * FROM main_properties_collection";
$result_all_properties = $conn->query($sql_all_properties);

// Create an array to hold the properties data
$all_properties_collection = array();

// Check if the query returned any results
if ($result_all_properties->num_rows > 0) {
  // Loop through the results and add each property to the array
  while($row = $result_all_properties->fetch_assoc()) {
    $all_properties_collection[] = $row;
  }
}

// Set the content type header to application/json
header('Content-Type: application/json');

$data = array(
  'properties' => $properties,
  'client_reviews' => $client_review_data,
  'all_properties_data' => $all_properties_collection
);
echo json_encode($data);



// Close the database connection
$conn->close();
?>