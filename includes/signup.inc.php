<?php


    if(isset($_POST["submit"])){
      

        $first = $_POST["first"];
        $last = $_POST["last"];
        $email = $_POST["email"];
        $uid = $_POST["uid"];
        $pwd = $_POST["pwd"];
        $pwdrepeat = $_POST["pwdrepeat"];

        require_once 'connect.php';
        require_once 'functions.inc.php';

        if(emptyInputSignup($first, $last, $email, $uid, $pwd, $pwdrepeat)!== false){
            header("location: ../signup.php?error=emptyinput");
            exit();
        }

        if(invalidUid($uid)!== false){
            header("location: ../signup.php?error=invaliduid");
            exit();
        }

        if(invalidEmail($email)!== false){
            header("location: ../signup.php?error=invalidemail");
            exit();
        }

        if(pwdMatch($pwd,$pwdrepeat)!== false){
            header("location: ../signup.php?error=passwordnomatch");
            exit();
        }

        if(uidExists($conn, $uid, $email)!== false){
            header("location: ../signup.php?error=usernametaken");
            exit();
        }

        createUser($conn, $first, $last, $email, $uid, $pwd);

        header("location: ../signup.php");
        exit();
    
    }
    else{
        header("location: ../signup.php");
        exit();
    }


  
    
