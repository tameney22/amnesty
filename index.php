<?php
// Authors: Liam McCann, Mitch Hornsby
// Created: 03/09/19
// Purpose: PHP main index page. Contains the HTML to display and gather information from 
//          users, and is linked to server processes that process information and update 
//          the webpage.

// Specifies the database information here:
$servername = "localhost";
$username = "hornsbym_insert";
$password = "Password123";
$dbname = "hornsbym_testDB";

// Create connection here:
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection here:
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>First PHP Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() { // When the page has loaded completely...
            $('#ajax').on('click', function(e) { // ... binds the php process to the submit button for an on-click event.
                e.preventDefault(); // Keeps page from refreshing.
                $.post( // Sends data here using code at process.php.
                        'process.php', // Specify the process to run on click.
                        {
                            email: $("#email").val(),
                            firstname: $("#firstname").val(),
                            lastname: $("#lastname").val(),
                            phone: $("#phone").val(),
                            streetnum: $("#streetnum").val(),
                            streetname: $("#streetname").val(),
                            phone: $("#phone").val(),
                            city: $("#city").val(),
                            state: $("#state").val(),
                            zip: $("#zip").val()
                        }
                    )
                    .done(function(data) {
                        // Updates webpage to confirm that database has been updated here:
                        $('#results').html(data);

                        // Not really sure what this does, currently, but it's vital:
                        <?php $conn->query(data) ?>
                    });
            });
        });
    </script>
</head>
<body>
    <h2>AJAX Form</h2>
    <form action="process.php" method="post">
        <div>
            <label for="firstname">Your First Name:</label>
            <input type="text" name="firstname" id="firstname">
        </div>
        <div>
            <label for="lastname">Your Last Name:</label>
            <input type="text" name="lastname" id="lastname">
        </div>
        <div>
            <label for="email">Your Email:</label>
            <input type="email" name="email" id="email">
        </div>
        <div>
            <label for="phone">Your Phone Number:</label>
            <input type="text" name="phone" id="phone">
        </div>
        <div>
            <label for="streetnum">Street Number:</label>
            <input type="text" name="streetnum" id="streetnum">
        </div>
        <div>
            <label for="streetname">Street Name:</label>
            <input type="text" name="streetname" id="streetname">
        </div>
        <div>
            <label for="city">City:</label>
            <input type="text" name="city" id="city">
        </div>
        <div>
            <label for="state">State:</label>
            <input type="text" name="state" id="state">
        </div>
        <div>
            <label for="zip">Zip Code:</label>
            <input type="text" name="zip" id="zip">
        </div>
        <div>
            <button name="submit" id="ajax">Submit</button>
        </div>
    </form>
    <div id="results"></div>
</body>
</html>

<?php
$conn->close();
?> 