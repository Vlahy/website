<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Assignment</title>
    <?php 
        include('dbconn.php');
    ?>
</head>
<body>
    <div class="header">
        <h1 style="font-family: Arial">Welcome to my assignment!</h1>
    </div><!-- End of #header -->
    <div id="wrapper">
            <form id="loginForm" action="login.php" method="POST" style="border-radius: 0px 0px 10px 10px">
                <h3 style="font-family: Arial">Please login!</h3>
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" placeholder="Username" autocomplete="off" required>
                </div>
                <div class="input-group">
                    <label for="password">Password&nbsp;</label>
                    <input type="password" name="password" placeholder="Password" autocomplete="off" required>
                </div>
                <div class="input-group">
                    <button name="login" class="btn" type="submit">Login</button>
                </div>
            </form>
        
            <form id="registerForm" action="register.php" method="POST">
                <h3 style="font-family: Arial">Don't have account?<br /> You can register right now!</h3>
                <div class="input-group">
                    <label for="usernameReg">Username</label>
                    <input type="text" name="usernameReg" id="usernameReg" placeholder="Username" autocomplete="off" required>
                </div>
                <div class="input-group">
                    <label for="passwordReg">Password&nbsp;</label>
                    <input type="password" name="passwordReg" id="passwordReg" placeholder="Password" autocomplete="off" required>
                </div>
                <div class="input-group">
                    <button name="register" class="btn" type="submit">Register</button>
                </div>
            </form>
    </div><!-- End of #wrapper -->
</body>
</html>