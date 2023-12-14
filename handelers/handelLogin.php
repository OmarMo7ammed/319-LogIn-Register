<?php
    session_start();
    require_once("../authentication/functions.php");
    require_once("../authentication/validations.php");
    $log_errors = [];
    
    // Check request Method
    if(checkRequestMethod("POST" && checkPostInput("email"))){
    
        foreach($_POST as $key => $value){
            $$key = sanitizeInput($value);
        }
        // Validate Inputs
        //email => required / validEmail
        if(!requiredVali($email)){
            $log_errors[] = "Email is required"; 
        }elseif(!emailVali($email)){
            $log_errors[] = "Please enter aq valid email";
        }

        if(!requiredVali($password)){
            $log_errors[] = "Password is required";
        }

        if (isset($_SESSION['auth'])) {
            header('location:../index.php');
            die;
        }
        $error = '';
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $users = json_decode(file_get_contents('../data/users.csv'), true);
            $user = $users[0];
            if ($user['email'] == $email && $user['password'] == sha1($password)) {
                $_SESSION['auth'] = true;
                header("location:../profile.php");
                die;
            } else {
                $error = "not correct email or password";
            }
        }

        // if(empty($log_errors)){
        //     $csv = "../data/users.csv";
        //     $file = fopen($csv,'r');  
        //     while(list($name,$email,$password) = fgetcsv($file,1024,',')){
        //        $validemail = array_values($email);
        //        $validpassword = array_values($password);
        //        if($email == $validemail && $password == $validpassword){
        //            $_SESSION['auth'] = [$email,$password];
        //            redirect("../index.php");
        //        }
        //     }      
        //     redirect("../profile.php");
        // }else{
        //     $_SESSION['log_errors'] = $log_errors;
        //     redirect("../login.php");
        //     die();
        // }

    }else{
        redirect("../login.php");
    }