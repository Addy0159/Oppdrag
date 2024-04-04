<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Tickets</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php
    // Check if the user is already authenticated
    if (!isset($_SERVER['PHP_AUTH_USER'])) {
        // If not authenticated, send authentication headers
        header('WWW-Authenticate: Basic realm="Restricted Area"');
        header('HTTP/1.0 401 Unauthorized');
        echo 'Authorization Required.';
        exit;
    } else {
        // If authenticated, check credentials
        $username = $_SERVER['PHP_AUTH_USER'];
        $password = $_SERVER['PHP_AUTH_PW'];
        
        // Define your actual username and password here
        $valid_username = "Adam";
        $valid_password = "Test";
        
        // Check if credentials match
        if ($username !== $valid_username || $password !== $valid_password) {
            // If credentials don't match, deny access
            header('HTTP/1.0 401 Unauthorized');
            echo 'Invalid username or password.';
            exit;
        }
    }
    ?>

    <div class="container">
        <h2>All Tickets</h2>
        <div class="tickets-container">
            <?php
            // Database connection
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

            // SQL query to retrieve tickets
            $sql = "SELECT * FROM tickets";
            $result = $conn->query($sql);

            // Display tickets
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "Title: " . $row["title"]. " - Description: " . $row["description"]. "<br>";
                }
            } else {
                echo "No tickets found";
            }

            // Close connection
            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>
