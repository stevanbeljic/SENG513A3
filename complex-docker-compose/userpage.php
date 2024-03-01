<!DOCTYPE html>
<html>
<head>
    <title>Assignment 3 - Stevan Beljic</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php
        $servername = "localhost";
        $username = "username";
        $password = "password";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password);

        // Check connection
        if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        }
        echo "Connected successfully";
    ?>
    <div>
        <label>
            Welcome <?php echo $_POST["username"]; ?> 
        </label>
    </div>
    
</body>
</html>
