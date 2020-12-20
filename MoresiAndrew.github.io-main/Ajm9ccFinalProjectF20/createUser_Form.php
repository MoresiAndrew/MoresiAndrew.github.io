<?php

////    HTTPS redirect
    if ($_SERVER['HTTPS'] !== 'on') {
		$redirectURL = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		header("Location: $redirectURL");
		exit;
	}
//
//
//	// user must be logged in for this to exist
	if(!session_start()) {
		header("Location: error.php");
		exit;
	}
//
    $loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
//
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
        <title>Create User</title>
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
            <h1 class="ui-widget-header">Create An Account</h1>

            <?php
                if ($error) {
                    print "<div class=\"ui-state-error\">$error</div>\n";
                }
            ?>

            <form action="CreateUser.php" method="POST">

                <input type="hidden" name="action" value="do_login">

                <div class="stack">
                    <label for="firstName">First Name:</label>
                    <input type="text" id="firstName" name="firstName" class="ui-widget-content ui-corner-all" required autofocus>
                </div>
                
                <div class="stack">
                    <label for="lastName">Last Name:</label>
                    <input type="text" id="lastName" name="lastName" class="ui-widget-content ui-corner-all" required>
                </div>
                
                <div class="stack">
                    <label for="username">Username:</label>
                    <input type="text" id="newUser" name="newUser" class="ui-widget-content ui-corner-all" value="<?php print $username; ?>" required>
                </div>

                <div class="stack">
                    <label for="newPass">Password:</label>
                    <input type="password" id="newPass" name="newPass" class="ui-widget-content ui-corner-all" required>
                </div>
                
                <div class="stack">
                    <label for="confirm">Confirm Password:</label>
                    <input type="text" id="confirm" name="confirm" class="ui-widget-content ui-corner-all" required>
                </div>
                
                <div class="stack">
                    <label for="birthday">Birthday:</label>
                    <input type="date" id="birthday" name="birthday" class="ui-widget-content ui-corner-all" required>
                </div>
                
                <div class="stack">
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" class="ui-widget-content ui-corner-all" required>
                </div>

                <div class="stack">
                    <input id="createUserSubmit" type="submit" value="Submit">
                </div>
            </form>
        </div> 
    </body>
</html>