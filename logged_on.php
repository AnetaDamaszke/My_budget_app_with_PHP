<?php

    session_start();

    //if (!isset($_SESSION['logged_on'])) {

        if ((!isset($_POST['email'])) || (!isset($_POST['password']))) {
            header('Location: login.php');
            exit();

        }
            
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');

        $email = htmlentities($email, ENT_QUOTES, "UTF-8");
        $password = htmlentities($password, ENT_QUOTES, "UTF-8");

        require_once 'database.php';

        $sql = "SELECT * FROM users WHERE email= :email LIMIT 1";
        $query = $db->prepare($sql);
        $query -> bindValue(':email', $email, PDO::PARAM_STR);
        $query -> execute();

        $user = $query->fetch();

        if(password_verify($password, $user['password'])) {
            $_SESSION['logged_on'] = true;
            $_SESSION['userId'] = $user['id'];
            $_SESSION['name'] = $user['username'];

            unset($_SESSION['error']);

            header('Location: menu.php');
            exit();

        } else {
            $_SESSION['logged_on'] = false;
            $_SESSION['error'] = '<span style="color: red;">Nieprawidłowy e-mail lub hasło!</span>';
            header('Location: login.php');
            exit();
        }
    //} 

?>