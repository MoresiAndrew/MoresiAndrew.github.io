<?php
    
    $firstName = empty($_GET['firstName']) ? 1 : $_GET['firstName'];
    $lastName = empty($_GET['lastName']) ? 1 : $_GET['lastName'];
    $hamming = empty($_GET['hamming']) ? 0 : $_GET['hamming'];
    $password = empty($_POST['password']) ? 1 : $_POST['password'];
    $username = empty($_POST['username']) ? 1 : $_POST['username'];
    $firstList = empty($_GET['firstList']) ? "" : $_GET['firstList'];
    $secondList = empty($_GET['secondList']) ? "" : $_GET['secondList'];
    $height = empty($_GET['height']) ? "" : $_GET['height'];
    $radius = empty($_GET['radius']) ? "" : $_GET['radius'];


    function hammingNumber($number) {
            if($number == 1){
                return "the provided number is a Hamming Number!";
            } else if ($number % 2 == 0) {
                return hammingNumber($number/2);
            } else if ($number % 3 == 0) {
                return hammingNumber($number/3);
            } else if ($number % 5 == 0) {
                return hammingNumber($number/5);
            } else {
                return "the provided number is not a Hamming Number!";
            }
    }


    if( $firstName != 1 and $lastName != 1) {
       print "Hello $firstName $lastName, welcome to my PHP playground, designed to simulate the value of server-side development and use in web development!"; 
    } else if( $hamming >= 1) {
        print(hammingNumber($hamming));
    } else if( $password != 1 and $username != 1) {
        if($password == "test-password" and $username == "test-user"){
            print "Credentials validated with POST";
        } else {
            print "Username or password is incorrect";
        }
    } else if($firstList != "" and $secondList != "") {
        $array = array();
        if(ord($firstList) > ord($secondList)) {
            $length = ord($firstList) - ord($secondList);
            for($i = $length; $i >= 0; $i-- ){
                array_push($array, chr(ord($secondList) + $i));
            }
        } else if(ord($firstList) < ord($secondList)){
            $length = ord($secondList) - ord($firstList);
            for($i = 0; $i <= $length; $i++ ){
                array_push($array, chr(ord($firstList) + $i));
            }
        }
        
        print "[";
        for($i = 0; $i < sizeof($array) -1; $i++) {
            echo $array[$i] . ", ";
        }
        echo end($array);
        print "]";
    } else if(is_numeric($radius) == 1 and is_numeric($height) == 1){
        $result = (2 * pi() * $radius * $height) + (2 * pi() * pow($radius, 2));
        echo "Surface Area = " . number_format($result, 2);
    }

?>