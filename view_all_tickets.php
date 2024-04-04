<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Tickets</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>All Tickets</h2>
        <div class="tickets-container">
            <!-- PHP code to display all tickets will go here -->
        </div>
    </div>
</body>
<?php
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

$sql = "SELECT * FROM tickets";
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

