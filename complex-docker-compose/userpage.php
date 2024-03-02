<!DOCTYPE html>
<html>
<head>
    <title>Assignment 3 - Stevan Beljic</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="userpage.css">
</head>
<body>
    <?php
        $servername = "db";
        $username = "admin";
        $password = "password";
        $dbName = "a3db";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbName);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    ?>
    <div id="welcome">
        <?php
            $usernameProvided = htmlspecialchars($_POST["username"]);
            $sql = "SELECT username FROM users WHERE username='$usernameProvided'";
            $result = mysqli_query($conn, $sql);
            if ($result->num_rows < 1) {
                $passwordProvided = htmlspecialchars($_POST["password"]);
                $sql = "INSERT INTO users (username, password, role) VALUES ('$usernameProvided', '$passwordProvided', 'user')";
                $result = mysqli_query($conn, $sql);
                echo "<label>Welcome " . $usernameProvided . "!! You have been registered.</label>";
            } else{
                echo "<label>Welcome back, " . $usernameProvided . ".</label>";
            }
        ?>
    </div>
    
</body>
</html>
