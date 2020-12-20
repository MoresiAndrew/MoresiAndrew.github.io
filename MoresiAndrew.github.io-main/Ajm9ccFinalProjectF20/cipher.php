<?php
     //login information acquired from User Authentication lecture: cookie_cache

    // redirects to HTTPS if not already there
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
	
	// if user is not logged in, cookie doesnt exist, return to login
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
	if (!$loggedIn) {
		header("Location: login.php");
        $isLoggedIn = "Login";
		exit;
	} else {
        $isLoggedIn = "Logged in";
    }
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Cipher</title>
        
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


        
        <div id="mainCipherWrapper">
            <ul>
                <li><a href="#caesarTab">Caesar Cipher</a></li>
                <li><a href="#vigenereTab">Vigenere Cipher</a></li>
            </ul> 
            <!-- The tab for the Caesar Cipher (default) -->
            <div id="caesarTab">
                <form id="form1" method="get">
                    <label class="codeLabel" for="cCode">Encode</label>
                    <input type="radio" class="encode tabItem caesarCode" value="encode" name="cCode" checked="checked">
                    <label class="codeLabel" for="cCode">Decode</label>
                    <input type="radio" class="encode tabItem caesarCode" value="decode" name="cCode">
                    <br>
                    <textarea id="caesarMessage" class="message tabItem" name="message" placeholder="Enter a Message"></textarea>
                    <br>
                    <label id="caesarShiftLabel" class="tabItem" for="shift">Character Shift:<br>(Positive numbers shift right. Negative numbers shift left)</label><br>
                    <input class="tabItem" type="number" name="shift" id="shift">
                    <br>
                    <button id="caesarSubmit" type="button" name="caesar" class="tabItem submit">Cipher</button>
                    <br>
                    <textarea id="caesarOutput" class="output tabItem" placeholder="Ciphered Data"></textarea>
                </form>
            </div>
            <!-- The tab for the Vigenere Cipher (Requires user authentication) -->
            <div id="vigenereTab">
            
                <form id="form2" method="get">
                    <label class="codeLabel" for="vCode">Encode</label>
                    <input type="radio" class="encode tabItem vigenereCode" value="encode" name="vCode" checked="checked">
                    <label class="codeLabel" for="vCode">Decode</label>
                    <input type="radio" class="encode tabItem vigenereCode" value="decode" name="vCode">
                    <br>
                    <textarea id="vigenereMessage" class="message tabItem" name="message" placeholder="Enter a Message"></textarea>
                    <br>
                    <label class="tabItem" for="shift">Key:</label><br>
                    <input class="tabItem" type="text" name="key" id="key">
                    <br>
                    <button id="vigenereSubmit" type="button" name="vigenere" class="tabItem submit">Cipher</button>
                    <br>
                    <textarea id="vigenereOutput" class="output tabItem" placeholder="Ciphered Data"></textarea>
                </form>
            </div>
        </div>
    </body>
</html>