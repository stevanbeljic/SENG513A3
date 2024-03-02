<?php 
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Stevan Beljic</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <div id="top">
        <h1>Please log in below</h1>
    </div>

    <div>
        <form action="userpage.php" method="post">
            <div class="field">
                <label for="username">Username:</label>
                <input type="username" name="username">
            </div>
            <div class="field">
                <label for="password">Password:</label>
                <input type="password" name="password">
            </div>
            <div class="field">
                <label for="register">Register?</label>
                <input type="checkbox" name="register">
            </div>
            <div class="field">
                <input type="submit" value="Submit" name="submit">
            </div>
        </form>
    </div>
    <div id="note">
        <?php
            if (isset($_SESSION['error'])) {
                echo "<p id='error'>" . $_SESSION['error'] . "</p>";
                unset($_SESSION['error']);
            }
        ?>
    </div>     
    
</body>
</html>
