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

    $sql = "SELECT * FROM users WHERE role='user'";
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Page - Stevan Beljic</title>
    <link rel="stylesheet" href="styles/adminpage.css">
</head>
<body>
    <div id="welcome">
        <h1>Admin Page</h1>
        
    </div>
    <div class="content">
        <label id="intro">
            Below are users of this website. You can delete users with admin permissions.
        </label>
    </div>
    <div class="content">
        <?php echo "
            <table>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            ";
            if($result->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['role'] . "</td>";
                    echo "<td>
                            <form method='post' action='delete_user.php'>
                                <input type='hidden' name='user_id' value='" . $row['id'] . "'>
                                <button type='submit' name='delete'>Delete</button>
                            </form>
                          </td>";
                    echo "</tr>";
                }
            }
            echo"</table>";
        ?>
    </div>
    <div id="logoutDiv">
        <form action='index.php'>
            <button type='submit'>Log Out</button>
        </form>
    </div>
</body>
</html>
