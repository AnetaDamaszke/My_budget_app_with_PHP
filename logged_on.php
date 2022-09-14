<?php

    session_start();

    //if (!isset($_SESSION['logged_on'])) {

        if ((isset($_POST['email']))) {
            
            $email = filter_input(INPUT_POST, 'email');
            $password = filter_input(INPUT_POST, 'password');

            require_once 'database.php';

            $sql = "SELECT * FROM users WHERE email= :email LIMIT 1";
            $query = $db->prepare($sql);
            $query -> bindValue(':email', $email, PDO::PARAM_STR);
            $query -> execute();

            $user = $query->fetch();

            if(password_verify($password, $user['password'])) {
                $_SESSION['logged_on'] = true;
                $_SESSION['name'] = $user['username'];
                header('Location: menu.php');
                exit();

            } else {
                $_SESSION['logged_on'] = false;
                header('Location: login.php');
                exit();
            }
            
        } else {
            header('Location: login.php');
            exit();
        }

    //} 

?>