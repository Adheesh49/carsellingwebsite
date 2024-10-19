<?php
// Start the session to access the logged-in seller's information
session_start();

// Check if the seller is logged in
if (!isset($_SESSION['seller_id'])) {
    // Redirect to the login page if not logged in
    header("Location: login.html");
    exit();
}

// Step 1: Read form inputs
$make = $_POST['make'];
$model = $_POST['model'];
$year = $_POST['year'];
$mileage = $_POST['mileage'];
$location = $_POST['location'];
$price = $_POST['price'];

// Retrieve the seller ID from the session
$seller_id = $_SESSION['seller_id'];

// Step 2: Connect to the Database
$con = mysqli_connect("localhost", "root", "", "CAR_SELLING");

// Check if the connection was successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Step 3: Insert new car into the database
$query = "INSERT INTO cars (make, model, year, mileage, location, price, seller_id) VALUES ('$make', '$model', '$year', '$mileage', '$location', '$price', '$seller_id')";

// Step 4: Execute the query and check for success
if (mysqli_query($con, $query)) {
    // Acknowledgment message
    echo "<html>
            <head>
                <title>Car Addition Successful</title>
            </head>
            <body bgcolor='yellow'>
                <h1>Car Added Successfully!</h1>
                <p>Thank you! Your car details have been successfully stored.</p>
                <p><a href='index.html'>Go to Home</a></p>
                <p><a href='add_car.html'>Add Another Car</a></p>
            </body>
          </html>";
} else {
    echo "<h1>Failed to add car. Please try again later.</h1>";
}

// Step 5: Close the database connection
mysqli_close($con);
?>
