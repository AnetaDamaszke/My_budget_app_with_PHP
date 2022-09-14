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
                        <a href="expense.html" class="nav-item nav-link menu-link">Dodaj wydatek</a>
                        <a href="balance.html" class="nav-item nav-link menu-link">Zobacz bilans</a>
                        <a href="setting.html" class="nav-item nav-link ms-2 ms-lg-3 menu-link">Ustawienia</a>
                        <a href="index.html" class="nav-item nav-link ms-2 ms-lg-3 menu-link">Wyloguj</a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Add Income -->
        <section class="add">
            <div class="container">
                <h1 class="text-center add-header">Dodaj przychód</h1>
                <div class="row">
                    <div class="col-12">
                        <div class="add-box mx-auto">
                            <form action="">
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="form-group w-100">
                                            <label for="incomeValue" class="form-control-label mb-2">Kwota w PLN</label>
                                            <input id="incomeValue" type="number" step="0.01" placeholder="np. 500.00" class="form-control"/>
                                        </div>
                                    </div> 
                                    <div class="col-md-6">
                                        <div class="form-group w-100">
                                            <label for="incomeDate" class="form-check-label d-block mb-2">Data</label>
                                            <input id="incomeDate" type="date" value="" class="form-control"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <form action="" id="categoryCheck" class="form-check pt-4">
                                            <label class="form-check-label d-block mb-2">Kategoria:</label>
                                            <label class="form-checkbox-input d-block mb-1">
                                                <input type="radio" checked="checked" name="radio" />
                                                <span class="checkmark"></span>
                                                <span class="add-radio__text ms-2">Wynagrodzenie</span>
                                            </label>
                                            <label class="form-checkbox-input d-block mb-1">
                                                <input type="radio" name="radio" />
                                                <span class="checkmark"></span>
                                                <span class="add-radio__text ms-2">Sprzedaż allegro</span>
                                            </label>
                                            <label class="form-checkbox-input d-block mb-1">
                                                <input type="radio" name="radio" />
                                                <span class="checkmark"></span>
                                                <span class="add-radio__text ms-2">Odsetki bankowe</span>
                                            </label>
                                            <label class="form-checkbox-input d-block mb-1">
                                                <input type="radio" name="radio" />
                                                <span class="checkmark"></span>
                                                <span class="add-radio__text ms-2">Inne</span>
                                            </label>
                                        </form>
                                    </div>
                                    <div class="form-group pt-4">
                                        <label for="incomeDate" class="form-control-label d-block mb-2">Komentarz (opcjonalnie)</label>
                                        <textarea rows="3" cols ="30" class="d-block w-100 p-3"></textarea>
                                    </div>
                                </div>
                                <div class="text-center statement"></div>
                                <div class="row pt-2">
                                    <div class="col-md-6">
                                        <a href="menu.html" type="button" class="btn form-button__secondary">Anuluj</a>
                                    </div>
                                    <div class="col-md-6">
                                        <button id="addIncomeBtn" type="button" class="btn form-button">Dodaj</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <img class="img-fluid align-self-end mx-auto add-img" src="img/INCOME_INEQUALITY.png" alt="budżet domowy" />
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
        <script src="js/income.js"></script>
    </body>
</html>