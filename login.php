<?php

    session_start();

    if(isset($_SESSION['logged_on']) && $_SESSION['logged_on'] == true)
    {
        header('Location: menu.php');
        exit();
    }

?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Project for course">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>My Budget App</title>
        <link href="https://fonts.googleapis.com/css2?family=Concert+One&family=Raleway:wght@300;400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/custom.css">
    </head>
    <body>

        <!-- Navbar -->
        <nav class="nav navbar navbar-light navbar-expand-md menu">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <img class="menu-logo" src="img/MYBUDGET.svg" alt="logo" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navContent">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navContent">
                    <div class="navbar-nav">
                        <a href="index.php" class="nav-item nav-link menu-link">Home</a>
                        <a href="about.php" class="nav-item nav-link ms-2 ms-lg-3 menu-link">O porgramie</a>
                        <a href="login.php" class="nav-item nav-link ms-2 ms-lg-3 active menu-link">Zaloguj</a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Login -->
        <section class="login">
            <div class="container">
                <div class="m-auto login-box">
                    <h2 class="text-center text-uppercase registration-header">Logowanie:</h2>
                    <form action="logged_on.php" method="post">
                        <div class="form-group">
                            <label for="email" class="form-control-label">E-mail</label>
                            <input type="email" name="email" id="email" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-control-label">Hasło</label>
                            <div class="d-flex"> 
                                <input type="password" name="password" id="password" class="form-control"/>
                            </div>
                        </div>
                        <div id="loginStatement" class="login-statement"></div>
                        <div class="text-center">
                            <button type="submit" class="btn text-uppercase text-white form-button mb-3">Zaloguj</button>
                        </div>
                    </form>
                    <?php 
                        if(isset($_SESSION['error'])) echo $_SESSION['error']; ?>
                </div>
                <img class="img-fluid login-img" src="img/BUDGETTING.png" alt="budżet domowy" />
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
    </body>
</html>