<?php

//    HTTPS redirect
    if ($_SERVER['HTTPS'] !== 'on') {
		$redirectURL = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		header("Location: $redirectURL");
		exit;
	}


	// user must be logged in for this to exist
	if(!session_start()) {
		header("Location: error.php");
		exit;
	}

    $loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
	if (!$loggedIn) {
        $isLoggedIn = "Login";
	} else {
        $isLoggedIn = "Logged in";
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Login Form</title>
        
        <link href="Ajm9ccFinalProjectF20.css" type="text/css" rel="stylesheet">
        <link href="jquery-ui-1.12.1.custom/jquery-ui.css" type="text/css" rel="stylesheet">
        <script src="jquery-ui-1.12.1.custom/external/jquery/jquery.js"></script>
        <script src="jquery-ui-1.12.1.custom/jquery-ui.js"></script>
        <script src="Ajm9ccFinalProjectF20.js"></script>
        
    </head>
    <body>
        <div id="nav">
            <a href="https://moresiandrew.github.io/Ajm9ccFinalProject/index.php" class="navItems" id="inform">Cipher Information</a>
            <a href="https://moresiandrew.github.io/Ajm9ccFinalProject/cipher.php" class="navItems" id="create">Create a Cipher</a>
            <a href="https://moresiandrew.github.io/Ajm9ccFinalProject/login_form.php" class="navItems"><?php echo $isLoggedIn ?></a>
            <a href="logout.php" class="navItems">Logout</a>
            <a href="../Ajm9ccProjectsF20.html" class="navItems">Back to Projects</a>
        </div>
        
        <div id="loginWidget" class="ui-widget">
        <h1 class="ui-widget-header">Login</h1>
        
        <?php
            if ($error) {
                print "<div class=\"ui-state-error\">$error</div>\n";
            }
        ?>
        
        <form action="login.php" method="POST">
            
            <input type="hidden" name="action" value="do_login">
            
            <div class="stack">
                <label for="username">User name:</label>
                <input type="text" id="username" name="username" class="ui-widget-content ui-corner-all" autofocus value="<?php print $username; ?>">
            </div>
            
            <div class="stack">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="ui-widget-content ui-corner-all">
            </div>
            
            <div class="stack">
                <input id="loginSubmit" type="submit" value="Submit">
            </div>
            <div class="stack">
                <a href="createUser_Form.php">Need an account? Create a user</a>
            </div>
        </form>
    </div>
    </body>
</html>