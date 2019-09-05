<header>
    <div class="container">
        <?php
            if(!isset($_SESSION["user"])){
                echo ' UB Budget Management System';
            }
            else{
                echo ' Welcome <b>'.$_SESSION["user"]->name."</b>";
            }
        ?>
    </div>
    <div class="container">
        <?php
            if(!isset($_SESSION["user"])){
                echo'   <form action="include/login.inc.php" method="POST">
                            <input type="text" name="userName" placeholder="User Name/ E-mail..."><br>
                            <input type="password" name="password" placeholder="Password..." ><br>
                            <button type="submit" name="login-submit">login</button><br>
                        </form>

                                
                        <form action="signup.php">
                            <button type="submit" name="signup-submit">signUp</button>
                        </form>
                ';
            }
            else{
                echo '  <form action="include/logout.inc.php">
                            <button type="submit" name="logout-submit">logout</button>
                        </form>
                ';
            }
        ?>
    </div>
   
</header>
