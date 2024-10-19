<?php
// Start session to access logged-in seller's information if needed
session_start();

// Step 2: Connect to the Database
$con = mysqli_connect("localhost", "root", "", "CAR_SELLING");

// Check if the connection was successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Step 3: Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $model = mysqli_real_escape_string($con, $_POST['model']); // Sanitize input
    $location = mysqli_real_escape_string($con, $_POST['location']); // Sanitize input

    // Step 4: Prepare and execute the query
    $query = "SELECT * FROM cars WHERE model LIKE '%$model%' AND location LIKE '%$location%'";
    $result = mysqli_query($con, $query);

    // Step 5: Display search results
    echo "<h3>Search Results:</h3>";
    if (mysqli_num_rows($result) > 0) {
        echo "<ul>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li>";
            echo "Make: " . ($row['make']) . "<br>";
            echo "Model: " . ($row['model']) . "<br>";
            echo "Year: " .($row['year']) . "<br>";
            echo "Mileage: " . ($row['mileage']) . " miles<br>";
            echo "Location: " . ($row['location']) . "<br>";
            echo "Price: $" . ($row['price']) . "<br>";
            echo "</li><br>";
        }
        echo "</ul>";
    } else {
        echo "<h3>No cars found matching your criteria.</h3>";
    }
}

// Step 6: Close the database connection
mysqli_close($con);
?>
