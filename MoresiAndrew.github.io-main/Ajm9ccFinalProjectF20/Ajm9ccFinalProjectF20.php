<?php 

    if (isset($_GET['shift'])) {
        $shift = empty($_GET['shift']) ? '' : $_GET['shift'];
        $message = empty($_GET['message']) ? '' : $_GET['message'];
        $code = empty($_GET['code']) ? '' : $_GET['code'];
        $type = 'caesar';
    } else if (isset($_GET['key'])) {
        $key = empty($_GET['key']) ? '' : $_GET['key'];
        $message = empty($_GET['message']) ? '' : $_GET['message'];
        $code = empty($_GET['code']) ? '' : $_GET['code'];
        $type = 'vigenere';
        
        for($i = 0; $i < strlen($key); $i++){
            if(ctype_upper($key[i])){
                $error = "";
            } else if (ctype_lower($key[$i])){
                $error = "";
            } else {
                $error = "Please enter a valid key";
                echo $error;
                exit;
            }
        }
    } else {
        $error = "Please fill out all fields";
        echo $error;
        exit;
    }


    $output = array();
    $array = str_split($message);

    if($type == 'caesar'){
        
        if($code == 'encode'){
            foreach($array as $char){
                if($shift > 0){  //if shift is positive  
                    if(ctype_upper($char)){ //capitalized letters
                        if((ord($char) + $shift) > 90){ //end of alphabet overshoot
                            array_push($output, chr((ord($char) + $shift - 90) + 64));
                        } else {
                            array_push($output, chr(ord($char) + $shift));
                        }
                    } else if(ctype_lower($char)){ // lowercase letters
                        if((ord($char) + $shift) > 122){ //end of alphabet overshoot
                            array_push($output, chr((ord($char) + $shift - 122) + 96));
                        } else {
                            array_push($output, chr(ord($char) + $shift));
                        }
                    } else { //non alphabetical characters
                        array_push($output, $char);
                    }
                } else if($shift < 0){ // negative shift
                    if(ctype_upper($char)){ //capital letters
                        if((ord($char) + $shift) < 65){ //beginning of alphabet undershoot
                            array_push($output, chr(91 - (65 - (ord($char) + $shift))));
                        } else {
                            array_push($output, chr(ord($char) + $shift));
                        }
                    }  else if(ctype_lower($char)){ // lowercase letters
                        if((ord($char) + $shift) < 97){ //beginning of alphabet undershoot
                            array_push($output, chr(123 - (97 - (ord($char) + $shift))));
                        } else {
                            array_push($output, chr(ord($char) + $shift));
                        }
                    } else { //non alphabetical characters
                        array_push($output, $char);
                    }
                }
            }
        } else if($code == 'decode'){
            foreach($array as $char){
                if($shift < 0){  //if shift is negative
                    if(ctype_upper($char)){ //capital letters
                        if((ord($char) + $shift) > 65){ //beginning of alphabet undershoot
                            array_push($output, chr(91 - (65 - (ord($char) + $shift))));
                        } else {
                            array_push($output, chr(ord($char) + $shift));
                        }
                    }  else if(ctype_lower($char)){ // lowercase letters
                        if((ord($char) + $shift) < 97){ //beginning of alphabet undershoot
                            array_push($output, chr(123 - (97 - (ord($char) + $shift))));
                        } else {
                            array_push($output, chr(ord($char) + $shift));
                        }
                    } else { //non alphabetical characters
                        array_push($output, $char);
                    }
                } else if($shift > 0){ // positive shift
                    if(ctype_upper($char)){ //capitalized letters
                        if((ord($char) + $shift) > 90){ //end of alphabet overshoot
                            array_push($output, chr((ord($char) + $shift - 90) + 64));
                        } else {
                            array_push($output, chr(ord($char) + $shift));
                        }
                    } else if(ctype_lower($char)){ // lowercase letters
                        if((ord($char) + $shift) > 122){ //end of alphabet overshoot
                            array_push($output, chr((ord($char) + $shift - 122) + 96));
                        } else {
                            array_push($output, chr(ord($char) + $shift));
                        }
                    } else { //non alphabetical characters
                        array_push($output, $char);
                    }
                }
            }
        }
    } else if($type == 'vigenere'){

        
        if($code == 'encode'){
            
            $keyArray = str_split($key);
            $offset = array();
            $length = 0;
            foreach($keyArray as $letter){
                if(ctype_upper($letter)){
                    if((ord($letter) - 65) >= 0 and (ord($letter) - 65) <= 25 ){
                        array_push($offset, (ord($letter) - 65));
                    }
                } else if(ctype_lower($letter)){
                    if((ord($letter) - 97) >= 0 and (ord($letter) - 97) <= 25 ){
                        array_push($offset, (ord($letter) - 97));
                    }
                }
            }
            for($i = 0; $i < sizeof($array); $i++){
                if($length >= sizeof($offset)){
                    $length = 0;
                }
                if(ctype_upper($array[$i])){
                    if((ord($array[$i]) + $offset[$length]) > 90){ //end of the alphabet capital
                        array_push($output, chr((ord($array[$i]) + $offset[$length] - 90) + 64));
                    } else {
                        array_push($output, chr(ord($array[$i]) + $offset[$length]));
                    } 
                } else if(ctype_lower($array[$i])) {
                    if((ord($array[$i]) + $offset[$length]) > 122){ // end of the alphabet lowercase
                        array_push($output, chr((ord($array[$i]) + $offset[$length] -122) +96));
                    } else {
                        array_push($output, chr(ord($array[$i]) + $offset[$length]));
                    }
                } else {
                    array_push($output, $array[$i]);
                }
                if($array[$i] != " "){
                    $length++;               
                }
            }  
        } else if($code == 'decode'){
            $key = str_split($key);
            $offset = array();
            $length = 0;
            foreach($key as $letter){
                if(ctype_upper($letter)){
                    if((ord($letter) - 65) >= 0 and (ord($letter) - 65) <= 25 ){
                        array_push($offset, (ord($letter) - 65));
                    }
                } else if(ctype_lower($letter)){
                    if((ord($letter) - 97) >= 0 and (ord($letter) - 97) <= 25 ){
                        array_push($offset, (ord($letter) - 97));
                    }
                }
            }
            for($i = 0; $i < sizeof($array); $i++){
                if($length >= sizeof($offset)){
                    $length = 0;
                }
                if(ctype_upper($array[$i])){
                    if((ord($array[$i]) - $offset[$length]) < 65){ //end of the alphabet capital
                        array_push($output, chr(91 - (65 - (ord($array[$i]) - $offset[$length]))));
                    } else {
                        array_push($output, chr(ord($array[$i]) - $offset[$length]));
                    } 
                } else if(ctype_lower($array[$i])) {
                    if((ord($array[$i]) - $offset[$length]) < 97){ // end of the alphabet lowercase
                        array_push($output, chr(123 - (97 - (ord($array[$i]) - $offset[$length]))));
                    } else {
                        array_push($output, chr(ord($array[$i]) - $offset[$length]));
                    }
                } else {
                    array_push($output, $array[$i]);
                }
                if($array[$i] != " "){
                    $length++;               
                }
            }
        }
    }
    
    $final = implode("", $output);
    echo json_encode($final);
?>