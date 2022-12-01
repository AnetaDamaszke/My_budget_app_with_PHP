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
                        <a href="income.php" class="nav-item nav-link menu-link">Przychód +</a>
                        <a href="expense.php" class="nav-item nav-link menu-link">Wydatek +</a>
                        <a href="settings.php" class="nav-item nav-link ms-2 ms-lg-3 menu-link">Ustawienia</a>
                        <a href="logout.php" class="nav-item nav-link ms-2 ms-lg-3 menu-link">Wyloguj</a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Dates of balance -->
        <section class="dates-menu">
            <div class="container">
                <h1 id="balanceHeader" class="text-center dates-header">Wybierz zakres dat bilansu:</h1>
                <div class="m-auto user-menu__box">
                    <label class="form-checkbox-input d-block mb-3">
                        <input type="radio" checked="checked" name="radio" />
                        <span class="checkmark ms-2"></span>
                        <span class="font-weight-bold">Bieżący miesiąc</span>
                    </label>
                    <label class="form-checkbox-input d-block mb-3">
                        <input type="radio" name="radio" />
                        <span class="checkmark ms-2"></span>
                        <span class="font-weight-bold">Poprzedni miesiąc</span>
                    </label>
                    <label class="form-checkbox-input d-block mb-3">
                        <input type="radio" name="radio" />
                        <span class="checkmark ms-2"></span>
                        <span class="font-weight-bold">Bieżący rok</span>
                    </label>
                    <label class="form-checkbox-input d-block mb-5">
                        <input type="radio" name="radio" />
                        <span class="checkmark ms-2"></span>
                        <span class="font-weight-bold">Niestandardowe:</span>
                        <div class="d-block mt-4">
                            <div class="form-group mx-2">
                                <label for="firstDate" class="form-control-label mb-1">Data początkowa</label>
                                <input type="date" id="firstDate"  class="form-control"/>
                            </div>
                            <div class="form-group mx-2">
                                <label for="secondDate" class="form-control-label mb-1">Data końcowa</label>
                                <input type="date" id="secondDate" class="form-control"/>
                            </div>
                        </div>
                    </label>
                    <div class="text-center">
                        <a href="balance.php" class="btn balance-date__button">Pokaż bilans</a>
                    </div>
                </div>
                <img class="img-fluid dates-menu__img" src="img/ECONOMY_ANALYSIS.png" alt="budżet domowy" />
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
        <script src="js/balance.js"></script>
    </body>
</html>