<?php
// Check if the user_id is set and is a valid integer
if(isset($_POST['user_id']) && filter_var($_POST['user_id'], FILTER_VALIDATE_INT)) {
    $user_id = $_POST['user_id'];
    
    // Your database connection code here
    $servername = "db";
    $username = "admin";
    $password = "password";
    $dbName = "a3db";

    $conn = mysqli_connect($servername, $username, $password, $dbName);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare a delete statement
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $user_id);
        
        mysqli_stmt_execute($stmt);
        
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);

    header("Location: adminpage.php");
    exit();
} else {
    header("Location: adminpage.php");
    exit();
}
?>
