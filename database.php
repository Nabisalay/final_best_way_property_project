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

if (isset($_POST['listingdata'])) {
  // Decode the JSON string to retrieve the review object
  $add_listingdata_info = json_decode($_POST['listingdata'], true);

  $tableName = $add_listingdata_info["table_name"];

  // Access the properties of the review object
  $property_title = mysqli_real_escape_string($conn, $add_listingdata_info['property_title']);
  $property_price = mysqli_real_escape_string($conn, $add_listingdata_info['property_price']);
  $property_status = mysqli_real_escape_string($conn, $add_listingdata_info['property_status']);
  $property_seller_name = mysqli_real_escape_string($conn, $add_listingdata_info['property_seller_name']);
  $property_beds = mysqli_real_escape_string($conn, $add_listingdata_info['property_bed']);
  $property_baths = mysqli_real_escape_string($conn, $add_listingdata_info['property_bath']);
  $property_sqft = mysqli_real_escape_string($conn, $add_listingdata_info['property_sqft']);
  $property_seller_img = mysqli_real_escape_string($conn, $add_listingdata_info['property_seller_img']);
  $property_img = mysqli_real_escape_string($conn, $add_listingdata_info['property_img']);
  $property_description = mysqli_real_escape_string($conn, $add_listingdata_info['property_concern']);

    // Prepare the INSERT statement based on the table name
    if ($tableName === "properties_collection_basic") {
    // Shift existing data to subsequent rows
// Shift existing data to subsequent rows
$conn->query("UPDATE properties_collection_basic SET id = id + 1, all_properties_id = all_properties_id + 1 ORDER BY id DESC");

    // // Fetch the maximum value of the all_properties_id column
    // $result = $conn->query("SELECT MAX(all_properties_id) AS max_all_properties_id FROM properties_collection_basic");
    // $row = $result->fetch_assoc();
    // $maxAllPropertiesId = $row['max_all_properties_id'];
    // $newAllPropertiesId = $maxAllPropertiesId + 1;

  // Prepare and bind the statement to prevent SQL injection
  $stmt1 = $conn->prepare("INSERT INTO properties_collection_basic (id, all_properties_id, name, price, status, seller_name, beds, baths, sqft, seller_img, image, small_description)

   VALUES (1, 1, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE all_properties_id = VALUES(all_properties_id), name = VALUES(name), price = VALUES(price), status = VALUES(status), seller_name = VALUES(seller_name), beds = VALUES(beds), baths = VALUES(baths), sqft = VALUES(sqft), seller_img = VALUES(seller_img), image = VALUES(image), small_description = VALUES(small_description)");

  $stmt1->bind_param("ssssssssss", $property_title, $property_price, $property_status, $property_seller_name, $property_beds, $property_baths, $property_sqft, $property_seller_img, $property_img, $property_description);

    // Execute the statement for properties_collection_basic table
    $stmt1->execute();

    // Close the prepared statement for properties_collection_basic table
    $stmt1->close();

       // Shift existing data to subsequent rows
       $conn->query("UPDATE main_properties_collection SET all_properties_id = all_properties_id   + 1 ORDER BY all_properties_id   DESC");

       // Prepare and bind the statement to prevent SQL injection
       $stmt2 = $conn->prepare("INSERT INTO main_properties_collection (all_properties_id, name, price, status, seller_name, beds, baths, sqft, seller_img, image, small_description)
        VALUES (1, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE name = VALUES(name), price = VALUES(price), status = VALUES(status), seller_name = VALUES(seller_name), beds = VALUES(beds), baths = VALUES(baths), sqft = VALUES(sqft), seller_img = VALUES(seller_img), image = VALUES(image), small_description = VALUES(small_description)"); 

  $stmt2->bind_param("ssssssssss", $property_title, $property_price, $property_status, $property_seller_name, $property_beds, $property_baths, $property_sqft, $property_seller_img, $property_img, $property_description);

      // Execute the statement for main_properties_collection table
      $stmt2->execute();

      // Close the prepared statement for main_properties_collection table
      $stmt2->close();

   }
     else if ($tableName === "main_properties_collection") {
    // Shift existing data to subsequent rows
    $conn->query("UPDATE main_properties_collection SET all_properties_id = all_properties_id   + 1 ORDER BY all_properties_id   DESC");

  // Prepare and bind the statement to prevent SQL injection
  $stmt = $conn->prepare("INSERT INTO main_properties_collection (all_properties_id, name, price, status, seller_name, beds, baths, sqft, seller_img, image, small_description)
   VALUES (1, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE name = VALUES(name), price = VALUES(price), status = VALUES(status), seller_name = VALUES(seller_name), beds = VALUES(beds), baths = VALUES(baths), sqft = VALUES(sqft), seller_img = VALUES(seller_img), image = VALUES(image), small_description = VALUES(small_description)");   
    }


  $stmt->bind_param("ssssssssss", $property_title, $property_price, $property_status, $property_seller_name, $property_beds, $property_baths, $property_sqft, $property_seller_img, $property_img, $property_description);

  // Execute the statement
  $stmt->execute();

  // Close the prepared statement
  $stmt->close();

  // Set the content type header to application/json
  header('Content-Type: application/json');

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
//  this is to select more image of properties
$sql_property_images = "SELECT * FROM property_images";
$result_property_images = $conn->query($sql_property_images);

// Create an array to hold the properties data
$all_sql_property_images = array();

// Check if the query returned any results
if ($result_property_images->num_rows > 0) {
  // Loop through the results and add each property to the array
  while($row = $result_property_images->fetch_assoc()) {
    $all_sql_property_images[] = $row;
  }
}

//  this is to select  location of properties
$sql_property_location = "SELECT * FROM property_location";
$result_property_location = $conn->query($sql_property_location);

// Create an array to hold the properties data
$all_sql_property_location = array();

// Check if the query returned any results
if ($result_property_location->num_rows > 0) {
  // Loop through the results and add each property to the array
  while($row = $result_property_location->fetch_assoc()) {
    $all_sql_property_location[] = $row;
  }
}

//  this is to select description of properties
$sql_property_detail_description = "SELECT * FROM property_detail_description";
$result_property_detail_description = $conn->query($sql_property_detail_description);

// Create an array to hold the properties data
$all_sql_detail_description = array();

// Check if the query returned any results
if ($result_property_detail_description->num_rows > 0) {
  // Loop through the results and add each property to the array
  while($row = $result_property_detail_description->fetch_assoc()) {
    $all_sql_detail_description[] = $row;
  }
}

//  this is to select details of properties
$sql_property_details = "SELECT * FROM property_details";
$result_property_details = $conn->query($sql_property_details);

// Create an array to hold the properties data
$all_sql_property_details = array();

// Check if the query returned any results
if ($result_property_details->num_rows > 0) {
  // Loop through the results and add each property to the array
  while($row = $result_property_details->fetch_assoc()) {
    $all_sql_property_details[] = $row;
  }
}

//  this is to select iinterior details of properties
$sql_interior_details = "SELECT * FROM interior_details";
$result_interior_details = $conn->query($sql_interior_details);

// Create an array to hold the properties data
$all_sql_interior_details = array();

// Check if the query returned any results
if ($result_interior_details->num_rows > 0) {
  // Loop through the results and add each property to the array
  while($row = $result_interior_details->fetch_assoc()) {
    $all_sql_interior_details[] = $row;
  }
}

//  this is to select outdoor details of properties
$sql_outdoor_details = "SELECT * FROM outdoor_details";
$result_outdoor_details = $conn->query($sql_outdoor_details);

// Create an array to hold the properties data
$all_sql_outdoor_details = array();

// Check if the query returned any results
if ($result_outdoor_details->num_rows > 0) {
  // Loop through the results and add each property to the array
  while($row = $result_outdoor_details->fetch_assoc()) {
    $all_sql_outdoor_details[] = $row;
  }
}

//  this is to select utilities details of properties
$sql_property_utilities = "SELECT * FROM property_utilities";
$result_property_utilities = $conn->query($sql_property_utilities);

// Create an array to hold the properties data
$all_sql_property_utilities = array();

// Check if the query returned any results
if ($result_property_utilities->num_rows > 0) {
  // Loop through the results and add each property to the array
  while($row = $result_property_utilities->fetch_assoc()) {
    $all_sql_property_utilities[] = $row;
  }
}

//  this is to select other features of properties
$sql_properties_other_features = "SELECT * FROM properties_other_features";
$result_properties_other_features = $conn->query($sql_properties_other_features);

// Create an array to hold the properties data
$all_sql_properties_other_features = array();

// Check if the query returned any results
if ($result_properties_other_features->num_rows > 0) {
  // Loop through the results and add each property to the array
  while($row = $result_properties_other_features->fetch_assoc()) {
    $all_sql_properties_other_features[] = $row;
  }
}

//  this is to select past year property price of properties
$sql_property_past_prices = "SELECT * FROM property_past_prices";
$result_property_past_prices = $conn->query($sql_property_past_prices);

// Create an array to hold the properties data
$all_sql_property_past_prices = array();

// Check if the query returned any results
if ($result_property_past_prices->num_rows > 0) {
  // Loop through the results and add each property to the array
  while($row = $result_property_past_prices->fetch_assoc()) {
    $all_sql_property_past_prices[] = $row;
  }
}

//  this is to select property_overview of properties
$sql_property_overview = "SELECT * FROM property_overview";
$result_property_overview = $conn->query($sql_property_overview);

// Create an array to hold the properties data
$all_sql_property_overview = array();

// Check if the query returned any results
if ($result_property_overview->num_rows > 0) {
  // Loop through the results and add each property to the array
  while($row = $result_property_overview->fetch_assoc()) {
    $all_sql_property_overview[] = $row;
  }
}


// Set the content type header to application/json
header('Content-Type: application/json');

$data = array(
  'properties' => $properties,
  'client_reviews' => $client_review_data,
  'all_properties_data' => $all_properties_collection,
  'all_sql_property_images' => $all_sql_property_images,
  'all_sql_property_location' => $all_sql_property_location,
  'all_sql_detail_description' => $all_sql_detail_description,
  'all_sql_property_details' => $all_sql_property_details,
  'all_sql_interior_details' => $all_sql_interior_details,
  'all_sql_outdoor_details' => $all_sql_outdoor_details,
  'all_sql_property_utilities' => $all_sql_property_utilities,
  'all_sql_properties_other_features' => $all_sql_properties_other_features,
  'all_sql_property_past_prices' => $all_sql_property_past_prices,
  'all_sql_property_overview' => $all_sql_property_overview
);
echo json_encode($data);



// Close the database connection
$conn->close();
?>