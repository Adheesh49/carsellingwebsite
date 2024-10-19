<?php
// Step 1: Read form inputs
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password']; // Storing the password as plain text

// Step 2: Connect to the Database
$con = mysqli_connect("localhost", "root", "", "CAR_SELLING");

// Check if the connection was successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Step 3: Insert new seller into the database
$query = "INSERT INTO sellers (name, address, phone, email, username, password) VALUES ('$name', '$address', '$phone', '$email', '$username', '$password')";

// Step 4: Execute the query and check for success
if (mysqli_query($con, $query)) {
    // Acknowledgment message
    echo "<html>
            <head>
                <title>Registration Successful</title>
            </head>
            <body bgcolor='yellow'>
                <h1>Registration Successful!</h1>
                <p>Thank you, $name! Your details have been successfully stored.</p>
                <p><a href='index.html'>Go to Home</a></p>
                <p><a href='login.html'>Go to login page</a></p>
            </body>
          </html>";
} else {
    echo "<h1>Registration failed. Please try again later.</h1>";
}

// Step 5: Close the database connection
mysqli_close($con);
?>
