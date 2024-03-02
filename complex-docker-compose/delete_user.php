<?php
    if(isset($_POST['user_id']) && filter_var($_POST['user_id'], FILTER_VALIDATE_INT)) {
        $user_id = $_POST['user_id'];
        
        $servername = "db";
        $username = "admin";
        $password = "password";
        $dbName = "a3db";

        $conn = mysqli_connect($servername, $username, $password, $dbName);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $user_id = mysqli_real_escape_string($conn, $user_id);

        $sql = "DELETE FROM users WHERE id = '$user_id'";
        $result = mysqli_query($conn, $sql);

        mysqli_close($conn);
        header("Location: adminpage.php");
        exit();
    } else {
        header("Location: adminpage.php");
        exit();
    }
?>
