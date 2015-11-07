<?php @session_start();
$_SESSION['login'] = 'bug'; ?><!DOCTYPE html>
<html>
    <head>
        <title>Login  Page</title>
        <link href="../maintenance/css/login-box.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../maintenance/css/custom.css" />
    </head>
    <body>
        <div class="content">
            <div id="login-box">
                <?php
                if ($_POST) {
                    include "../maintenance/configure/connectivity.php";

                    $u = $_POST['username'];
                    $p = $_POST['password'];
                    $sql = "select * from admin where username='$u' and pass='$p'";
                    $query = mysql_query($sql);
                    $num_row = mysql_num_rows($query);
                    $row = mysql_fetch_assoc($query);
                    if ($num_row > 0) {
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['password'] = $row['pass'];
                        $_SESSION['role'] = $row['role'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['login'] = 'done';
                        header("location:welcome.php");
                    } else {
                        echo "<div style='margin-top:15px;font-weight:bold; '>The username or password you entered is incorrect.</div>";
                    }
                }
                ?>
                <H2>Login</H2>
                <br />
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <label for="username">Username:</label>
                    <input type="text" size="20" id="username" name="username"/>
                    <br/><br/>
                    <label for="password">Password:</label>
                    <input style="margin-left:5px;" type="password" size="20" id="passowrd" name="password"/>
                    <br/> <br/>
                    <input type="submit" value="Login"/>
                </form>
            </div>
        </div>
    </body>
</html>