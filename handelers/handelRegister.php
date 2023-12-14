<?php
    session_start();
    require_once("../authentication/functions.php");
    require_once("../authentication/validations.php");
    $errors =  [];

    if(checkRequestMethod("POST" && checkPostInput("name"))){

        foreach($_POST as $key => $value){
            $$key = sanitizeInput($value);
        }
        // Validations
        // name => required , min:3 , max:20
        if(!requiredVali($name)){
            $errors[] = "Name is required";
        }elseif(!minVali($name,3)){
            $errors[] = "Name Must be Greater Than 3 Chars";
        }elseif(!maxVali($name,20)){
            $errors[] = "Name Must be Less Than 20 Chars";
        }

        // email => required , type(email)
        if(!requiredVali($email)){
            $errors[] = "Email is required";
        }elseif(!emailVali($email)){
            $errors[] = "Please enter a valid email address";
        }

        // Password => required , min:3 , max:20
        if(!requiredVali($password)){
            $errors[] = "Password is required";
        }elseif(!minVali($password,6)){
            $errors[] = "Password Must be Greater Than 6 Chars";
        }elseif(!maxVali($password,20)){
            $errors[] = "Password Must be Less Than 20 Chars";
        }
        
        // Validations for Error Messages
        if(empty($errors)){
            $user_file = fopen("../data/users.csv","r+");
            $user_data = [$name,$email,sha1($password)];
            fputcsv($user_file,$user_data); // Save the User Data
            // Redirect 
            $_SESSION['auth'] = [$name,$email]; // Authenticate User
            redirect("../profile.php");
            die();

        }else{
            $_SESSION['errors'] = $errors;
            redirect("../register.php");
            die();
        }


    }else {
        redirect("../register.php");
    }