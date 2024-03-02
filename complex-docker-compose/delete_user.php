<?php
    session_start();
    if(isset($_POST['user_id'])) {
        $user_id = $_POST['user_id'];
        
        $servername = "db";
        $username = "admin";
        $password = file_get_contents("password.txt");
        $dbName = "a3db";

        $conn = mysqli_connect($servername, $username, $password, $dbName);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $user_id = mysqli_real_escape_string($conn, $user_id);

        $sql = "DELETE FROM users WHERE id = '$user_id'";
        $result = mysqli_query($conn, $sql);

        mysqli_close($conn);
        if ($_SESSION['role'] == 'admin') {
            header("Location: adminpage.php");
        } else {
            header("Location: index.php");
        }
        exit();
    } else {
        header("Location: adminpage.php");
        exit();
    }
?>
