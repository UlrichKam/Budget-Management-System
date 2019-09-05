<!DOCTYPE html>
<html>
	<head>
		<title> UB Budget Management System </title>
	</head>
	<body>
	<?php
		require 'include/library.inc.php';
	?>
	
        <form action="include/signup.inc.php" method="POST">
            User Name: <input type="text" name="userName" placeholder="User Name..."><br>
            Authority: <input type="text" name="userAuthority" placeholder="Level of Authority..."><br>
            Password: <input type="password" name="password" placeholder="Password..." ><br>
            Password Repeat: <input type="password" name="passwordRepeat" placeholder="Password Repeat..." ><br>
            <button type="submit" name="signup-submit">sign up</button><br>
        </form>
        <br><br><br>
        <a href="index.php">home</a>
    </body>
</html>
