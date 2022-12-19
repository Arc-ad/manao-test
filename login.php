<!doctype html>
<head>
    <link rel="stylesheet" href="styles/style.css">
</head>
<form action="controller/LoginController.php" method="post" name="signin-form">
    <div class="form-element">
        <label for="">login</label>
        <input type="text" name="log" required >
    </div>
    <div class="form-element">
        <label for="">Password</label>
        <input type="password" name="password" required>
    </div>
    <div class="form-submit">
        <button type="submit" name="loginIn" value="loginIn">Log in</button>
        <a href="register.php">Register</a>
    </div>
    
</form>