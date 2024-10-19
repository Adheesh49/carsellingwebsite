<?php
// Start the session to track logged-in users
session_start();

// Step 1: Read form inputs
$username = $_POST['username'];
$password = $_POST['password'];

// Step 2: Connect to the Database
$con = mysqli_connect("localhost", "root", "", "CAR_SELLING");

// Check if the connection was successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Step 3: Fetch the seller details from the database
$query = "SELECT * FROM sellers WHERE username = '$username'";
$result = mysqli_query($con, $query);

// Step 4: Validate user credentials
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    // Check if the password matches (here assuming password is stored in plain text)
    if ($row['password'] == $password) {
        // Login successful: Set session variables
        $_SESSION['seller_id'] = $row['seller_id']; // Store seller ID in session
        $_SESSION['username'] = $row['username']; // Store username in session
        
        // Redirect to the Add Car page
        header("Location: add_car.html");
        exit();
    } else {
        // Invalid password
        header("Location: login.html?error=Invalid username or password");
        exit();
    }
} else {
    // No such user found
    header("Location: login.html?error=Invalid username or password");
    exit();
}

// Step 5: Close the database connection
mysqli_close($con);
?>
