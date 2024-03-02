<!DOCTYPE html>
<html>
<head>
    <title>Assignment 3 - Stevan Beljic</title>
    <link rel="stylesheet" href="styles.css">
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
                <input type="submit" value="Submit" name="submit">
            </div>
        </form>
    </div>
    <div id="note">
        <label><span>*Unregistered users will be auto-registered</span></label>
    </div>    
    
</body>
</html>
