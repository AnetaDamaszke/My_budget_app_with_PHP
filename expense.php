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
                        <a href="income.php" class="nav-item nav-link menu-link">Dodaj przychód</a>
                        <a href="balance.php" class="nav-item nav-link menu-link">Zobacz bilans</a>
                        <a href="settings.php" class="nav-item nav-link ms-2 ms-lg-3 menu-link">Ustawienia</a>
                        <a href="index.php" class="nav-item nav-link ms-2 ms-lg-3 menu-link">Wyloguj</a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Add Expense -->
        <section class="add">
            <div class="container">
                <h1 class="text-center add-header">Dodaj wydatek</h1>
                <div class="row">
                    <div class="col-12">
                        <div class="add-box mx-auto">
                            <form action="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group w-100">
                                            <label for="expenseValue" class="form-control-label mb-2">Kwota w PLN</label>
                                            <input id="expenseValue" type="number" step="0.01" placeholder="np. 500.00" class="form-control"/>
                                        </div>
                                    </div> 
                                    <div class="col-md-6">
                                        <div class="form-group w-100">
                                            <label for="expenseDate" class="form-check-label d-block mb-2">Data</label>
                                            <input id="expenseDate" type="date" value="" class="form-control"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-check pt-4">
                                            <label class="form-check-label d-block mb-2">Kategoria</label>
                                            <select id="categorySelect">
                                                <option value="0">Wybierz:</option>
                                                <option value="1">Jedzenie</option>
                                                <option value="2">Mieszkanie</option>
                                                <option value="3">Transport</option>
                                                <option value="4">Telekomunikacja</option>
                                                <option value="5">Opieka zdrowotna</option>
                                                <option value="6">Ubranie</option>
                                                <option value="7">Higiena</option>
                                                <option value="8">Dzieci</option>
                                                <option value="9">Rozrywka</option>
                                                <option value="10">Wycieczka</option>
                                                <option value="11">Szkolenia</option>
                                                <option value="12">Hobby</option>
                                                <option value="13">Oszczędności</option>
                                                <option value="14">Spłata kredytu</option>
                                                <option value="15">Rata</option>
                                                <option value="16">Darowizna</option>
                                                <option value="17">Inne</option>
                                              </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-check pt-4">
                                            <label class="form-check-label d-block mb-2">Sposób płatności</label>
                                            <label class="form-checkbox-input d-block mb-1">
                                                <input type="radio" checked="checked" name="radio" />
                                                <span class="checkmark"></span>
                                                <span class="add-radio__text">Gotówka</span>
                                            </label>
                                            <label class="form-checkbox-input d-block mb-1">
                                                <input type="radio" checked="checked" name="radio" />
                                                <span class="checkmark"></span>
                                                <span class="add-radio__text">Karta kredytowa</span>
                                            </label>
                                            <label class="form-checkbox-input d-block mb-1">
                                                <input type="radio" checked="checked" name="radio" />
                                                <span class="checkmark"></span>
                                                <span class="add-radio__text">Karta debetowa</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group pt-4">
                                        <label for="incomeDate" class="form-control-label d-block mb-2">Komentarz (opcjonalnie)</label>
                                        <textarea rows="3" cols ="30" class="d-block w-100"></textarea>
                                    </div>
                                </div>
                                <div class="statement text-center"></div>
                                <div class="row pt-2">
                                    <div class="col-md-6">
                                        <a href="menu.html" type="button" class="btn form-button__secondary">Anuluj</a>
                                    </div>
                                    <div class="col-md-6">
                                        <button id="addExpenseBtn" type="button" class="btn form-button">Dodaj</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <img class="img-fluid align-self-end mx-auto add-img" src="img/BUYING_A_HOUSE.png" alt="budżet domowy" />
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
        <script src="js/expense.js"></script>
    </body>
</html>