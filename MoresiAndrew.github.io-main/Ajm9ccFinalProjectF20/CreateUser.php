<?php

     //HTTPS redirect
     if ($_SERVER['HTTPS'] !== 'on') {
 		$redirectURL = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
 		header("Location: $redirectURL");
 		exit;
 	}
	
	// http://us3.php.net/manual/en/function.session-start.php
	if(!session_start()) {
		// If the session couldn't start, present an error
		header("Location: error.php");
		exit;
	}
	
	
	// Check to see if the user has already logged in
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
	
	if ($loggedIn) {
		header("Location: cipher.php");
		exit;
	}
	
	
	$action = empty($_POST['action']) ? '' : $_POST['action'];
	
	if ($action == 'do_login') {
		createUser();
	} else {
		login_form();
	}
	
	function createUser() {
		$firstName = empty($_POST['firstName']) ? '' : $_POST['firstName'];
        $lastName = empty($_POST['lastName']) ? '' : $_POST['lastName'];
		$username = empty($_POST['newUser']) ? '' : $_POST['newUser'];
		$password = empty($_POST['newPass']) ? '' : $_POST['newPass'];
        $confirmPass = empty($_POST['confirm']) ? '' : $_POST['confirm'];
        $birthday = empty($_POST['birthday']) ? '' : $_POST['birthday'];
        $email = empty($_POST['email']) ? '' : $_POST['email'];
        
		echo $firstName;
		echo $lastName;
		echo $username;
		echo $password;
		echo $confirmPass;
		echo $birthday;
		echo $email;
	
       	
    
        
        if(strcmp($password, $confirmPass) == 0){
           // Require the credentials
            require_once 'db.conf';

            // Connect to the database
            $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

            // Check for errors
            if ($mysqli->connect_error) {
                $error = 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
                require "login_form.php";
                exit;
            }

            // http://php.net/manual/en/mysqli.real-escape-string.php
            $firstName = $mysqli->real_escape_string($firstName);
            $lastName = $mysqli->real_escape_string($lastName);
            $username = $mysqli->real_escape_string($username);
            $password = $mysqli->real_escape_string($password);
            $birthday = $mysqli->real_escape_string($birthday);
            $email = $mysqli->real_escape_string($email);

            // Build query
            $query = "INSERT INTO users (firstName, lastName, username, userPassword, email, birthday) VALUES ('$firstName', '$lastName', '$username', sha1('$password'), '$email', STR_TO_DATE('$birthday', '%Y-%m-%d'))";

            // Sometimes it's nice to print the query. That way you know what SQL you're working with.
            //print $query;
            //exit;

            // Run the query

            // If there was a result...
            if ($mysqli->query($query) === TRUE) {

                    $error = 'New User Created Successfully!';
                    require "login_form.php";
//                    exit;
            } else {
                $error = 'Insert Error: ' . $query . '<br>' . $mysqli->error;
                require "createUser_Form.php";
//                exit;
            }
            $mysqli->close();
            exit;
        } else {
            $error = "Error: Passwords do not match!";
            require "createUser_Form.php";
            exit;
        }
             
	}
	
	function login_form() {
		$username = "";
		$error = "";
		require "login_form.php";
        exit;
	}

?>