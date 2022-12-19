<!doctype html>
<head>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
<form name="signup-form" action="controller/RegisterController.php" method="post">
    <div class="form-element">
        <label>Login</label>
        <input type="text" name="login" >
    </div>
    <div class="form-element">
        <label>Password</label>
        <input type="password" name="password" >
    </div>
    <div class="form-element">
        <label>Confirm password</label>
        <input type="password" name="Confirm_password" >
    </div>
    <div class="form-element">
        <label>Email</label>
        <input type="email" name="email" >
    </div>
    <div class="form-element">
        <label>Name</label>
        <input type="text" name="name" >
    </div>
    <div class="form-submit">
        <button type="submit" name="register" value="register">Register</button>
        <a href="login.php">Log in</a>
    </div>
</form>
</body>
</html>