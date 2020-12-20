<?php

    //HTTPS redirect
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
        $isLoggedIn = "Login";
	} else {
        $isLoggedIn = "Logged in";
    }

   

?>
<!DOCTYPE html>
<!--
    Name: Andrew Moresi
    Pawprint: Ajm9cc
    Date: 12/4/2020
    Challenge: Final Project
-->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Ajm9ccFinalProjectF20</title>
        
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

        <div id="mainWrapper">
            <ul>
                <li><a href="#caesarFirst">Caesar Cipher</a></li>
                <li><a href="#vigenereFirst">Vigenere Cipher</a></li>
            </ul> 
<!--             The tab for the Caesar Cipher information (default) -->
            <div id="caesarFirst">
                <h1>Caesar Cipher</h1>
<!--
                 This definition was taken from
                    https://en.wikipedia.org/wiki/Caesar_cipher 
-->
                <p><img src="images/Caesar-cipher-example.png" id="caesarImage" alt="Caesar Cipher example">In cryptography, a Caesar cipher, also known as Caesar's cipher, the shift cipher, Caesar's code or Caesar shift, is one of the simplest and most widely known encryption techniques. It is a type of substitution cipher in which each letter in the plaintext is replaced by a letter some fixed number of positions down the alphabet. For example, with a left shift of 3, D would be replaced by A, E would become B, and so on. The method is named after Julius Caesar, who used it in his private correspondence.</p>
                
                
                
                <iframe width="420" height="315" src="https://www.youtube.com/embed/sMOZf4GN3oc"></iframe>
                <br>
                <a class="cipherLink" href="cipher.php">Create your own cipher</a>
                
            </div>
<!--             The tab for the Vigenere Cipher information -->
            <div id="vigenereFirst">
                
                <h1>Vigenere Cipher</h1>
                
                <!-- This definition taken from 
                https://en.wikipedia.org/wiki/Vigen%C3%A8re_cipher
-->
                <p><img src="images/vigenere-table.png" id="vigenereImage" alt="Vigenere Cipher Table">In a Caesar cipher, each letter of the alphabet is shifted along some number of places. For example, in a Caesar cipher of shift 3, A would become D, B would become E, Y would become B and so on. The Vigenère cipher has several Caesar ciphers in sequence with different shift values.<br><br>

To encrypt, a table of alphabets can be used, termed a tabula recta, Vigenère square or Vigenère table. It has the alphabet written out 26 times in different rows, each alphabet shifted cyclically to the left compared to the previous alphabet, corresponding to the 26 possible Caesar ciphers. At different points in the encryption process, the cipher uses a different alphabet from one of the rows. The alphabet used at each point depends on a repeating keyword.</p>
                
                <iframe width="420" height="315" src="https://www.youtube.com/embed/BgFJD7oCmDE">
                </iframe>
                <br>
                <a class="cipherLink" href="cipher.php">Create your own cipher</a>
            </div>
        </div>
    </body>
</html>