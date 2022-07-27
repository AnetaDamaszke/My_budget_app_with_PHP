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
                <a class="navbar-brand" href="#">
                    <img class="menu-logo" src="img/MYBUDGET.svg" alt="logo" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navContent">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navContent">
                    <div class="navbar-nav">
                        <a href="#" class="nav-item nav-link menu-link">Witaj, Użytkowniku!</a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- User menu -->
        <section class="user-menu">
            <div class="container">
                <div class="m-auto user-menu__box">
                    <a href="income.html" class="btn d-block text-uppercase user-menu__button" type="button">
                        Dodaj przychód
                    </a>
                    <a href="expense.html" class="btn d-block text-uppercase user-menu__button" type="button">
                        Dodaj wydatek
                    </a>
                    <a href="balance.html" class="btn d-block text-uppercase user-menu__button" type="button">
                        Zobacz bilans
                    </a>
                    <div class="py-2"></div>
                    <a href="setting.html" class="btn d-block text-uppercase user-menu__button" type="button">
                        Ustawienia konta
                    </a>
                    <a href="index.html" class="btn d-block text-uppercase user-menu__button" type="button">
                        Wyloguj się
                    </a>
                </div>
                <img class="img-fluid user-menu__img" src="img/REBUILD_THE_ECONOMY.png" alt="budżet domowy" />
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