<?php
// Authors: Liam McCann, Mitch Hornsby
// Created: 03/09/19
// Purpose: Process that recieves a POST request with information to be added to a database.
//          Adds that data to the database and then sends a confirmation email.

// Server and database specifications here:
  $servername = "localhost";
  $username = "amnestyh_insert";
  $password = "insert1!";
  $dbname = "amnestyh_Data";

// Create connection here:
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection here:
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Base query statement here:
$queryStatement = "INSERT INTO user_info VALUES (";

// Iterate through a list of input data and build SQL query here:
$queryContent = "";
$counter = 0;
foreach ($_POST as $k => $v) {
  $queryContent = $queryContent . "'" . $v . "'";
  $counter += 1;
  if ($counter < sizeof($_POST)) {
    $queryContent = $queryContent . ', ';
  }
}

# Combine query statement and content to make complete SQL query here:
$query = $queryStatement . $queryContent . ");";

# Actually query the DB here:
if (mysqli_query($conn, $query)) {
  # Prints out success message upon success:
  echo "Successfully added information to Database";

  # Sends confirmation email upon successful update of DB:
  mail($_POST['email'], "TESTING", "It worked!");
} else {
  # Prints out error message upon failure:
  echo "Error: " . mysqli_error($conn);
}

?>

<?php
$conn->close();
?> 