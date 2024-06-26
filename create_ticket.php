<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Ticket</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <form action="create_ticket.php" method="post">
            <h2>Create Ticket</h2>
            <input type="text" name="title" placeholder="Title" required><br>
            <textarea name="description" placeholder="Description" required></textarea><br>
            <input type="submit" value="Create Ticket">
        </form>
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

$title = $_POST['title'];
$description = $_POST['description'];
$user_id = $_SESSION['user_id']; // Assuming user is logged in and user_id is stored in session

$sql = "INSERT INTO tickets (user_id, title, description) VALUES ('$user_id', '$title', '$description')";

if ($conn->query($sql) === TRUE) {
    echo "Ticket created successfully";
    header("Location: index.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
</html>

