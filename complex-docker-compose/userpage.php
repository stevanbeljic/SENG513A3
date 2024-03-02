<?php
    session_start();

    $servername = "db";
    $username = "admin";
    $password = file_get_contents("password.txt");
    $dbName = "a3db";

    $conn = mysqli_connect($servername, $username, $password, $dbName);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $usernameProvided = htmlspecialchars($_POST["username"]);
    $sql = "SELECT * FROM users WHERE username='$usernameProvided'";
    $result = mysqli_query($conn, $sql);
    $numRows = $result->num_rows;
    if ($numRows < 1 && isset($_POST['register'])) {
        $passwordProvided = htmlspecialchars($_POST["password"]);
        $sql = "INSERT INTO users (username, password, role) VALUES ('$usernameProvided', '$passwordProvided', 'user')";
        $result = mysqli_query($conn, $sql);
        $sql = "SELECT * FROM users WHERE username='$usernameProvided'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
    } elseif($numRows < 1 && !isset($_POST['register'])) {
        header("Location: index.php");
        exit();
    } else {
        $row = mysqli_fetch_array($result);

        $passwordProvided = htmlspecialchars($_POST["password"]);
        if ($row["password"] != $passwordProvided) {
            $_SESSION['error'] = "Wrong password";
            header("Location: index.php");
            exit();
        }

        $_SESSION['role'] = $row["role"];
        if($row["role"]=="admin"){
            header("Location: adminpage.php");
            exit();
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>User - Stevan Beljic</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="userpage.css">
</head>
<body>
    <div id="top">
        <div>
        <?php 
            if($numRows < 1){
                echo "<p>Welcome, ". $usernameProvided .". You have been registered.</p>";
            } else {
                echo "<p >Welcome back, ". $usernameProvided .".</p>";
            }
        ?>
        </div>
        <div id="logoutDiv">
        <form action='index.php'>
            <button type='submit'>Log Out</button>
        </form>
        <form method='post' action='delete_user.php'>
            <?php echo "<input type='hidden' name='user_id' value='" . $row['id'] . "'>" ?>
            <button type='submit'>Delete Account</button>
        </form>
    </div>
    </div>
</body>
</html>
