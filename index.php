<?php
// Authors: Yoseph Tamene, Abby Nason, Alexander Caines, Liam McCann, Mitch Hornsby, Mary Catherine Greenleaf
// Created: 03/09/19
// Purpose: PHP main index page. Contains the HTML to display and gather information from 
//          users, and is linked to server processes that process information and update 
//          the webpage.

// Specifies the database information here:
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
?>

<!DOCTYPE html>
<html>
<head>
    <link href='https://fonts.googleapis.com/css?family=Source Sans Pro' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=ZCOOL+QingKe+HuangYou" rel="stylesheet">
    <title>Amnesty | Home</title>
    <link href="style.css" type="text/css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() { // When the page has loaded completely...
            $('#submit').on('click', function(e) { // ... binds the php process to the submit button for an on-click event.
                e.preventDefault(); // Keeps page from refreshing.
                $.post( // Sends data here using code at process.php.
                        'process.php', // Specify the process to run on click.
                        {
                            email: $("#emailBox").val(),
                            firstname: $("#fnameBox").val(),
                            lastname: $("#surnameBox").val(),
                            phone: $("#pnBox").val(),
                            streetaddress: $("#addressBox").val(),
                            cityandstate: $("townNameBox").val(),
                            state: $("#state").val()
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
    <script type="text/javascript">
        window.onscroll = function(){
            var nav = document.getElementById("top");
            if (window.pageYOffset < 1){
               nav.style.opacity = 1;
            }
            else{
                nav.style.opacity = .35;

            }
        };
    </script>
    <div id="top">
        <section  id="logo-container">
            <img id="logo" src="images/logoy.jpg" alt="Amnesty Logo">
        </section>
        <section class="container" id="nav-bar">
            <a class="menu" href="about.html">About Us</a>
            <a class="menu" href="map.html">Map</a>
            <a id="activeNav" class="menu" href="index.html">Home</a>
        </section>
    </div>
    <br>
    <div id="intro">
            <!-- Intro to Site !-->
            <p id="introtext">COMMUNITY SPONSORSHIP</p>
    </div>
    <div id="text">
        <section id="left">
            <header>
                <h1>Interested in helping a refugee get settled into your community? Recruit your friends and neighbors to partner with a local resettlement agency to sponsor of a refugee.</h1>
            </header>
            <p id="content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto, odit voluptatibus nobis maxime, nihil ipsa pariatur quasi quia quibusdam omnis necessitatibus, libero voluptatum est sequi eum! Eius ex voluptates nemo!
            Illum ab sint id illo, minus voluptatibus quibusdam dolore iste aliquam quae voluptas ea, mollitia reprehenderit quis voluptatem! Deleniti aperiam, vel consectetur illo quia veniam expedita temporibus delectus repudiandae reiciendis.
            Obcaecati earum, doloremque, sequi eaque quo quos dolores ipsum perspiciatis commodi dolore, perferendis eveniet animi optio nemo. Officia molestias, possimus voluptas repellendus eos commodi fugiat, nisi ut corrupti, harum est?</p>
        </section>
        <section id="right">
                <header>
                    <h1 id="quote"><q>A nation ringed by walls will only imprison itself.</q></h1><p><i>- Barack Obama</i></p>
                </header>
        </section>
    </div>
    <div id="subscribe">
            <header>
                <h1 id="title">SUBSCRIBE TO OUR EMAIL LIST</h1>
            </header>
            <form action="process.php" method="post">
                <span class="field">
                <label for="contact">Your Name:</label>
                <input type="text" name="fnameBox" id="fnameBox" class="input" size="40" maxlength="42" placeholder="First Name" required>
                <input type="text" name="surnameBox" id="surnameBox" class="input" size="40" maxlength="42" placeholder="Last Name" required>
            </span>
                <span class="field">
                <label for="emailBox">Enter your email address:</label>
                <input type="email" name="emailBox" id="emailBox" placeholder="johndoe@mail.wlu.edu" size="40" required>
                </span>
                <span class="field">
                        <label for="pnBox">Enter your phone number:</label>
                        <input type="number" name="pnBox" id="pnBox" placeholder="555-555-5555" size="15" required>
                </span>
                <span class="field">
                                <label for="email">Enter your physical address:</label>
                                <input type="text" name="addressBox" id="addressBox" placeholder="123 Abc ave." size="40" required>
                                <input type="text" name="townNameBox" id="townNameBox" placeholder="Lexington, VA" size="40" required>
                </span>    
                <button name="submit" id="submit">SUBMIT!</button>
                
            </form>
    
        </div>
        <div id="results"></div>
    
    <br>
    <footer>
        <section id="footer-left">
            <p>&copy; 2019 Amnesty International USA</p>
        </section>
        <section id="footer-center">

        </section>
        <section id="footer-right">

        </section>
    </footer>
    <script src="script.js"></script>
</body>
</html>

<?php
$conn->close();
?> 