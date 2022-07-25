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
                            <form action="">
                                <div class="form-group">
                                    <label for="name" class="form-control-label">Imię i nazwisko</label>
                                    <input type="text" id="name" placeholder="np. Jan Kowalski" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="form-control-label">E-mail</label>
                                    <input type="email" id="email" placeholder="np. jan@kowalski.com" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label for="password1" class="form-control-label">Hasło</label>
                                    <div class="d-flex"> 
                                        <input type="password" id="password1" class="form-control" style="border-radius: 3px 0 0 3px; border-right: 0;"/>
                                        <button id="showPassword" type="button" value="OFF" class="show-password__btn"><img src="img/eye.png" width="20px" alt=""></button>
                                    </div>
                                   
                                </div>
                                <div id="statement" class="registration-statement"></div>
                                <div class="text-center">
                                    <button type="button" id="reigistrationButton" class="btn text-uppercase text-white form-button" onclick="validateForm()">Załóż konto</button>
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
        <script src="js/registration.js"></script>

    </body>
</html>