<?php
    $servername = "db";
    $username = "admin";
    $password = "password";
    $dbName = "a3db";

    $conn = mysqli_connect($servername, $username, $password, $dbName);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $usernameProvided = htmlspecialchars($_POST["username"]);
    $sql = "SELECT * FROM users WHERE username='$usernameProvided'";
    $result = mysqli_query($conn, $sql);
    $numRows = $result->num_rows;
    if ($numRows < 1) {
        $passwordProvided = htmlspecialchars($_POST["password"]);
        $sql = "INSERT INTO users (username, password, role) VALUES ('$usernameProvided', '$passwordProvided', 'user')";
        $result = mysqli_query($conn, $sql);
    } else {
        $row = mysqli_fetch_array($result);
        if($row["role"]=="admin"){
            header("Location: adminpage.php");
            exit();
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Assignment 3 - Stevan Beljic</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="userpage.css">
</head>
<body>
    <div id="welcome">
        <?php 
            if($numRows < 1){
                echo "<label>Welcome, ". $usernameProvided .". You have been registered.</label>";
            } else {
                echo "<label>Welcome back, ". $usernameProvided ."</label>";
            }
        ?>
    </div>
</body>
</html>
