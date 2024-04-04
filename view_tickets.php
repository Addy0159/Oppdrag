<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Tickets</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Your Tickets</h2>
        <div class="tickets-container">
            <!-- PHP code to display tickets will go here -->
        </div>
    </div>
</body>
<?php
session_start();
$servername = "localhost";
$username = "Addy";
$password = "Kazuha@05";
$dbname = "sak";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id']; // Assuming user is logged in and user_id is stored in session

$sql = "SELECT * FROM tickets WHERE user_id='$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Title: " . $row["title"]. " - Description: " . $row["description"]. "<br>";
    }
} else {
    echo "No tickets found";
}

$conn->close();
?>
</html>

