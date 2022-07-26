<?php

    session_start();

    if(isset($_POST['email']))
    {
        //udana walidacja:
        $is_OK = true;

        //sprawdź poprawność nazwy użytkownika:
        $username = $_POST['username'];

        //sprawdzenie długości nazwy użytkownika:
        if((strlen($username)<3) || (strlen($username)>50))
        {
            $is_OK = false;
            $_SESSION['e_username']="Nazwa użytkownika musi posiadać od 3 do 50 znaków!";
        }

        //sprawdzenie czy nazwa użytkownika składa się z dozwolonych znaków:
        if(ctype_alnum($username)==false)
        {
            $is_OK = false;
            $_SESSION['e_username'] = "Nazwa użytkownika może składać się tylko z liter!";
        }

        //sprawdź poprawność adresu e-mail:
        $email = $_POST['email'];
        $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);

        if((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
        {
            $is_OK = false;
            $_SESSION['e_email'] = "Podaj poprawny adres e-mail!";
        }

        //sprawdź poprawnośc hasła:
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];

        if((strlen($password1)<8) || (strlen($password1)>20))
        {
            $is_OK = false;
            $_SESSION['e_password1'] = "Hasło musi posiadać od 8 do 20 znaków!";
        }

        if($password1 != $password2)
        {
            $is_OK = false;
            $_SESSION['e_password2'] = "Hasła musą być takie same!";
        }

        $password_hash = password_hash($password1, PASSWORD_DEFAULT);

        //czy zaakceptowano rgulamin:

        if(!isset($_POST['rules']))
        {
            $is_OK = false;
            $_SESSION['e_rules'] = "Potwierdź akceptację regulaminu!";
        }

        //czy użytkownik jest botem?
        $secret = "6Lf_Wx0hAAAAAIn6-WV5StrvcKdSmetmifZnCnbO";

        $check = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']); 
        $answer = json_decode($check);

        if($answer->success == false)
        {
            $is_OK = false;
            $_SESSION['e_bot'] = "Potwierdź, że nie jesteś robotem";
        }

        //Zapamiętaj dane:
        $_SESSION['fr_username']=$username;
        $_SESSION['fr_email']=$email;
        $_SESSION['fr_password1']=$password1;
        $_SESSION['fr_password2']=$password2;
        if(isset($_POST['rules'])) $_SESSION['fr_rules']=true;

        require_once "connect.php";
        mysqli_report(MYSQLI_REPORT_STRICT);

        try 
        {
            $db_connect = new mysqli($host, $db_user, $db_password, $db_name);
            if ($db_connect->connect_errno!=0)
	        {
		        throw new Exception(mysqli_connect_errno());
	        }
            else
            {
                //czy email już istnieje?
                $result = $db_connect->query("SELECT id FROM users WHERE email='$email'");

                if(!$result) throw new Exception($db_connect->error);

                $how_many_emails = $result->num_rows;
                if($how_many_emails>0)
                {
                    $is_OK = false;
                    $_SESSION['e_email'] = "Istnieje juz konto przypisane do tego adresu e-mail";
                }

                
        }

        catch(Exception $e)
        {
            echo '<span class="error";>Błąd serwera! Przepraszamy za niedogdności!</span>';
            echo '<br />Informacja deweloperska: '.$e;
        }
    }
?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Project for course">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>My Budget App - rejestracja konta</title>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <link href="https://fonts.googleapis.com/css2?family=Concert+One&family=Raleway:wght@300;400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/custom.css">
    </head>
    <body>

        <!-- Navbar -->
        <nav class="nav navbar navbar-light navbar-expand-md menu">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <img class="menu-logo" src="img/MYBUDGET.svg" alt="logo" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navContent">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navContent">
                    <div class="navbar-nav">
                        <a href="index.html" class="nav-item nav-link menu-link">Home</a>
                        <a href="about.html" class="nav-item nav-link ms-2 ms-lg-3 menu-link">O porgramie</a>
                        <a href="login.html" class="nav-item nav-link ms-2 ms-lg-3 active menu-link">Zaloguj</a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Registartion -->
        <section class="registration">
            <div class="container">
                <div class="intro">
                    <h1 class="text-center intro-header">Zyskaj kontrolę nad swoim budżetem</h1>
                    <p class="text-center intro-text">Notowanie wydatków i przychodów pozwoli spojrzeć na własne finanse z szerszej perspektywy. Załóż konto, przeglądaj bilans i zapanuj nad swoim portfelem!</p>
                </div>
                <div class="row">
                    <div class="col-lg-5">
                        <div class="registartion-box">
                            <h2 class="text-center text-uppercase registration-header">Nie masz konta? Zarejestruj się:</h2>
                            
                            <form method="post">
                                <div class="form-group">
                                    <label for="username" class="form-control-label">Imię i nazwisko</label>
                                    <input type="text" name="username" value="<?php
                                        if(isset($_SESSION['fr_username']))
                                        {
                                            echo $_SESSION['fr_username'];
                                            unset($_SESSION['fr_username']);
                                        }
                                    
                                    ?>" id="username" placeholder="np. Jan Kowalski" class="form-control"/>
                                    
                                    <?php
                                    if(isset($_SESSION['e_username']))
                                    {
                                        echo '<div class="error">'.$_SESSION['e_username'].'</div>';
                                        unset($_SESSION['e_username']);
                                    }
                                    ?>

                                </div>
                                <div class="form-group">
                                    <label for="email" class="form-control-label">E-mail</label>
                                    <input type="email" name="email" value="<?php
                                    if(isset($_SESSION['fr_email']))
                                    {
                                        echo $_SESSION['fr_email'];
                                        unset($_SESSION['fr_email']);
                                    }
                                    ?>" id="email" placeholder="np. jan@kowalski.com" class="form-control"/>
                                    
                                    <?php
                                    if(isset($_SESSION['e_email']))
                                    {
                                        echo '<div class="error">'.$_SESSION['e_email'].'</div>';
                                        unset($_SESSION['e_email']);
                                    }
                                    ?>

                                </div>
                                <div class="form-group">
                                    <label for="password1" class="form-control-label">Hasło</label>
                                    <div class="d-flex"> 
                                        <input type="password" name="password1" value="<?php
                                        if(isset($_SESSION['fr_password1']))
                                        {
                                            echo $_SESSION['fr_password1'];
                                            unset($_SESSION['fr_password1']);
                                        }
                                    
                                        ?>" id="password1" class="form-control" style="border-radius: 3px 0 0 3px; border-right: 0;"/>
                                        <button id="showPassword" type="button" value="OFF" class="show-password__btn"><img src="img/eye.png" width="20px" alt=""></button>
                                    </div>
                                    
                                    <?php

                                    if(isset($_SESSION['e_password1']))
                                    {
                                        echo '<div class="error">'.$_SESSION['e_password1'].'</div>';
                                        unset($_SESSION['e_password1']);
                                    }

                                    ?>
                                </div>
                                <div class="form-group">
                                    <label for="password1" class="form-control-label">Powtórz hasło</label>
                                    <div class="d-flex"> 
                                        <input type="password" name="password2" value="<?php
                                        if(isset($_SESSION['fr_password2']))
                                        {
                                            echo $_SESSION['fr_password2'];
                                            unset($_SESSION['fr_password2']);
                                        }
                                    
                                        ?>" id="password2" class="form-control" style="border-radius: 3px 0 0 3px; border-right: 0;"/>
                                        <button id="showPassword" type="button" value="OFF" class="show-password__btn"><img src="img/eye.png" width="20px" alt=""></button>
                                    </div>
                                    
                                    <?php

                                    if(isset($_SESSION['e_password2']))
                                    {
                                        echo '<div class="error">'.$_SESSION['e_password2'].'</div>';
                                        unset($_SESSION['e_password2']);
                                    }

                                    ?>
                                </div>
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="rules" <?php
                                        if(isset($_SESSION['fr_regulamin']))
                                        {
                                            echo "checked";
                                            unset($_SESSION['fr_regulamin']);
                                        }

                                        ?>/> Akceptuję regulmin
                                    </label> 
                                    
                                    <?php
                                    if(isset($_SESSION['e_rules']))
                                    {
                                        echo '<div class="error">'.$_SESSION['e_rules'].'</div>';
                                        unset($_SESSION['e_rules']);
                                    }

                                    ?>

                                </div>
                                <div class="g-recaptcha" data-sitekey="6Lf_Wx0hAAAAAM2LCmn8OaSkTJySryUvDoh0eHRP"></div>
                                <?php
                                if(isset($_SESSION['e_bot']))
                                {
                                    echo '<div class="error">'.$_SESSION['e_bot'].'</div>';
                                    unset($_SESSION['e_bot']);
                                }

                                ?>
                                <div id="statement" class="registration-statement"></div>
                                <div class="text-center">
                                    <button type="submit" id="reigistrationButton" class="btn text-uppercase text-white form-button">Załóż konto</button>
                                </div>
                                
                            </form>

                        </div>
                    </div>
                    <div class="col-lg-7">
                        <img class="img-fluid align-self-end registration-img" src="img/BUDGETTING.png" alt="budżet domowy">
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="text-white site-footer">
            <div class="container">
                <div class="row pb-3">
                    <div class="col-md-6 pt-3 text-center text-md-start">
                        <img class="" src="img/MYBUDGET_FOOTER.svg" alt="logo" />
                    </div>
                    <div class="col-md-6 pt-3 text-center text-md-end">
                        Designed by Aneta Damaszke 2022
                    </div>
                    
                </div>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://www.google.com/recaptcha/enterprise.js?render=6Lf_Wx0hAAAAAM2LCmn8OaSkTJySryUvDoh0eHRP"></script>
        <script>

            grecaptcha.enterprise.ready(function() 
            {
                grecaptcha.enterprise.execute('6Lf_Wx0hAAAAAM2LCmn8OaSkTJySryUvDoh0eHRP', {action: 'login'}).then(function(token) {
                var elms = document.getElementsByClassName('recaptchaResponse');
                for (var i = 0; i < elms.length; i++) {
                    elms[i].setAttribute("value", token); 
                });
            });

        </script>
    </body>
</html>