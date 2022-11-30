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
                        <a href="income.html" class="nav-item nav-link menu-link">Przychód +</a>
                        <a href="expense.html" class="nav-item nav-link menu-link">Wydatek +</a>
                        <a href="setting.html" class="nav-item nav-link ms-2 ms-lg-3 menu-link">Ustawienia</a>
                        <a href="index.html" class="nav-item nav-link ms-2 ms-lg-3 menu-link">Wyloguj</a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Balance -->
        <section class="balance">
            <div class="container">
                <div class="text-center text-md-end pt-5">
                    <button type="button" class="btn btn-lg balance-date__button" data-bs-toggle="modal" data-bs-target="#selectDate">
                        Wybierz zakres dat
                    </button>
                </div>
                <h1 id="balanceHeader" class="text-center add-header">Twój bilans w bieżacym miesiącu:</h1>
                <div class="modal fade" tabindex="-1" role="dialog" id="selectDate">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content px-3">
                            <div class="modal-header">
                                <h5 class="modal-title">Wybierz zakres dat:</h5>
                                <button type="button" class ="close" data-bs-dismiss="modal" style="color:#000D6B; background-color: white;">
                                    <span style="font-size: 36px;">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
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
                                <label class="form-checkbox-input d-block mb-3">
                                    <input type="radio" name="radio" />
                                    <span class="checkmark ms-2"></span>
                                    <span class="font-weight-bold">Niestandardowe:</span>
                                    <div class="d-flex mt-4">
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
                            </div>
                            <div class="modal-footer">
                                <button id="selectDate" type="button" class="btn balance-date__button">Zapisz</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 px-3 px-md-5">
                        <h2 class="text-uppercase balance-subheader">Przychody:</h2>
                        <div class="box balance-box" style="background-color: #99DDCC;">
                            <div class="accordion" id="accordionBalance01">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading01">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse01" aria-expanded="true" aria-controls="collapse01">
                                            <span class="">Wynagrodzenie</span>
                                        </button>
                                    </h2>
                                    <div id="collapse01" class="accordion-collapse collapse" aria-labelledby="heading01" data-bs-parent="#accordionBalance1">
                                        <div class="accordion-body">
                                                <table>
                                                    <tr>
                                                        <td class="accordion__bold-text">Wypłata</td> <td>2022-01-10</td> <td id="income11">4500</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="accordion__bold-text">Premia</td> <td>2022-01-10</td> <td id="income12">500</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="accordion__bold-text">Suma:</td> <td class="accordion__sum"><span id="incomes1Sum">5000</span> zł</td>
                                                    </tr>
                                                </table>
                                         </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading01">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse02" aria-expanded="true" aria-controls="collapse02">
                                            Sprzedaż
                                        </button>
                                    </h2>
                                        <div id="collapse02" class="accordion-collapse collapse" aria-labelledby="heading02" data-bs-parent="#accordionBalance1">
                                            <div class="accordion-body">
                                                <table>
                                                    <tr>
                                                        <td class="accordion__bold-text">Książki</td> <td>2022-01-5</td> <td id="">150.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="accordion__bold-text">Gry</td> <td>2022-01-16</td> <td>300.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="accordion__bold-text">Ubrania</td> <td>2022-01-23</td> <td>250.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="accordion__bold-text">Suma:</td> <td class="accordion__sum"><span id="incomes2Sum"></span> zł</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading01">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse03" aria-expanded="true" aria-controls="collapse03">
                                            Inne
                                        </button>
                                    </h2>
                                    <div id="collapse03" class="accordion-collapse collapse" aria-labelledby="heading03" data-bs-parent="#accordionBalance1">
                                        <div class="accordion-body">
                                            <table>
                                                <tr>
                                                    <td class="accordion__bold-text">Odszkodowanie</td> <td>2022-01-2</td> <td>1500.00</td>
                                                </tr>
                                                <tr>
                                                    <td class="accordion__bold-text">500+</td> <td>2022-01-15</td> <td>500.00</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" class="accordion__bold-text">Suma:</td> <td class="accordion__sum"><span id="incomes3Sum"></span> zł</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex mt-4">
                                <h3 class="text-uppercase balance-box__item-subheader">Całkowita suma przychodów:</h3>
                                <div class="box balance-box__sum">
                                    <span id="allIncomesSum" class="">8500 zł</span>
                                </div>
                            </div>
                        </div>
                        <h2 class="text-uppercase balance-subheader">Wydatki:</h2>
                        <div class="box balance-box" style="background-color: #4FC6A8;">
                            <div class="accordion" id="accordionBalance">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading1">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapseOne">
                                            Jedzenie
                                        </button>
                                    </h2>
                                    <div id="collapse1" class="accordion-collapse collapse" aria-labelledby="heading1" data-bs-parent="#accordionBalance">
                                        <div class="accordion-body">
                                            <table>
                                                <tr>
                                                    <td class="accordion__bold-text">Wypłata</td> <td>2022-01-10</td> <td>4500.00</td>
                                                </tr>
                                                <tr>
                                                    <td class="accordion__bold-text">Premia</td> <td>2022-01-10</td> <td>500.00</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" class="accordion__bold-text">Suma:</td> <td style="font-weight: 700; font-size: 16px;">5000.00 zł</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading2">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
                                            Dom
                                        </button>
                                    </h2>
                                    <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2" data-bs-parent="#accordionBalance">
                                        <div class="accordion-body">
                                            <table>
                                                <tr>
                                                    <td style="font-weight: 700; text-align:left;">Wypłata</td> <td>2022-01-10</td> <td>4500.00</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 700; text-align:left;">Premia</td> <td>2022-01-10</td> <td>500.00</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="font-weight: 700; text-align: right;">Suma:</td> <td style="font-weight: 700; font-size: 16px;">5000.00 zł</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading3">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="true" aria-controls="collapse3">
                                            Transport
                                        </button>
                                    </h2>
                                    <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#accordionBalance">
                                        <div class="accordion-body">
                                            <table>
                                                <tr>
                                                    <td style="font-weight: 700; text-align:left;">Wypłata</td> <td>2022-01-10</td> <td>4500.00</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 700; text-align:left;">Premia</td> <td>2022-01-10</td> <td>500.00</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="font-weight: 700; text-align: right;">Suma:</td> <td style="font-weight: 700; font-size: 16px;">5000.00 zł</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading4">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="true" aria-controls="collapse4">
                                            Telekomunikacja
                                        </button>
                                    </h2>
                                    <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#accordionBalance">
                                        <div class="accordion-body">
                                            <table>
                                                <tr>
                                                    <td style="font-weight: 700; text-align:left;">Wypłata</td> <td>2022-01-10</td> <td>4500.00</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 700; text-align:left;">Premia</td> <td>2022-01-10</td> <td>500.00</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="font-weight: 700; text-align: right;">Suma:</td> <td style="font-weight: 700; font-size: 16px;">5000.00 zł</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading5">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="true" aria-controls="collapse5">
                                            Zdrowie
                                        </button>
                                    </h2>
                                    <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="heading5" data-bs-parent="#accordionBalance">
                                        <div class="accordion-body">
                                            <table>
                                                <tr>
                                                    <td style="font-weight: 700; text-align:left;">Wypłata</td> <td>2022-01-10</td> <td>4500.00</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 700; text-align:left;">Premia</td> <td>2022-01-10</td> <td>500.00</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="font-weight: 700; text-align: right;">Suma:</td> <td style="font-weight: 700; font-size: 16px;">5000.00 zł</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading6">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="true" aria-controls="collapse6">
                                            Higiena
                                        </button>
                                    </h2>
                                    <div id="collapse6" class="accordion-collapse collapse" aria-labelledby="heading6" data-bs-parent="#accordionBalance">
                                        <div class="accordion-body">
                                            <table>
                                                <tr>
                                                    <td style="font-weight: 700; text-align:left;">Wypłata</td> <td>2022-01-10</td> <td>4500.00</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 700; text-align:left;">Premia</td> <td>2022-01-10</td> <td>500.00</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="font-weight: 700; text-align: right;">Suma:</td> <td style="font-weight: 700; font-size: 16px;">5000.00 zł</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading7">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="true" aria-controls="collapse7">
                                            Ubrania
                                        </button>
                                    </h2>
                                    <div id="collapse7" class="accordion-collapse collapse" aria-labelledby="heading7" data-bs-parent="#accordionBalance">
                                        <div class="accordion-body">
                                            <table>
                                                <tr>
                                                    <td style="font-weight: 700; text-align:left;">Wypłata</td> <td>2022-01-10</td> <td>4500.00</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 700; text-align:left;">Premia</td> <td>2022-01-10</td> <td>500.00</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="font-weight: 700; text-align: right;">Suma:</td> <td style="font-weight: 700; font-size: 16px;">5000.00 zł</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading8">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse8" aria-expanded="true" aria-controls="collapse8">
                                            Dzieci
                                        </button>
                                    </h2>
                                    <div id="collapse8" class="accordion-collapse collapse" aria-labelledby="heading8" data-bs-parent="#accordionBalance">
                                        <div class="accordion-body">
                                            <table>
                                                <tr>
                                                    <td style="font-weight: 700; text-align:left;">Wypłata</td> <td>2022-01-10</td> <td>4500.00</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 700; text-align:left;">Premia</td> <td>2022-01-10</td> <td>500.00</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="font-weight: 700; text-align: right;">Suma:</td> <td style="font-weight: 700; font-size: 16px;">5000.00 zł</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading9">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse9" aria-expanded="true" aria-controls="collapse9">
                                            Rozrywka
                                        </button>
                                    </h2>
                                    <div id="collapse9" class="accordion-collapse collapse" aria-labelledby="heading9" data-bs-parent="#accordionBalance">
                                        <div class="accordion-body">
                                            <table>
                                                <tr>
                                                    <td style="font-weight: 700; text-align:left;">Wypłata</td> <td>2022-01-10</td> <td>4500.00</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 700; text-align:left;">Premia</td> <td>2022-01-10</td> <td>500.00</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="font-weight: 700; text-align: right;">Suma:</td> <td style="font-weight: 700; font-size: 16px;">5000.00 zł</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading10">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse10" aria-expanded="true" aria-controls="collapse10">
                                            Spłaty
                                        </button>
                                    </h2>
                                    <div id="collapse10" class="accordion-collapse collapse" aria-labelledby="heading10" data-bs-parent="#accordionBalance">
                                        <div class="accordion-body">
                                            <table>
                                                <tr>
                                                    <td style="font-weight: 700; text-align:left;">Wypłata</td> <td>2022-01-10</td> <td>4500.00</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 700; text-align:left;">Premia</td> <td>2022-01-10</td> <td>500.00</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="font-weight: 700; text-align: right;">Suma:</td> <td style="font-weight: 700; font-size: 16px;">5000.00 zł</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading11">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse11" aria-expanded="true" aria-controls="collapseOne">
                                            Inne
                                        </button>
                                    </h2>
                                    <div id="collapse11" class="accordion-collapse collapse" aria-labelledby="heading11" data-bs-parent="#accordionBalance">
                                        <div class="accordion-body">
                                            <table>
                                                <tr>
                                                    <td style="font-weight: 700; text-align:left;">Wypłata</td> 
                                                    <td>2022-01-10</td> <td>4500.00</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 700; text-align:left;">Premia</td> 
                                                    <td>2022-01-10</td> <td>500.00</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="font-weight: 700; text-align: right;">Suma:</td> 
                                                    <td style="font-weight: 700; font-size: 16px;">5000.00 zł</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex mt-4">
                                <h3 class="text-uppercase balance-box__item-subheader">Całkowita suma wydatków:</h3>
                                <div class="box balance-box__sum">
                                    8500<span> zł</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 px-3 px-md-5">
                        <img class="img-fluid" src="img/ECONOMY_ANALYSIS.png" alt="budżet domowy" />
                        <div class="box balance-box mt-5" style="background-color: #EAEAEB;">
                            <h3 class="balance-subheader pb-2">Twój całkowity bilans wynosi:</h3>
                            <div class="box balance-box__sum mb-2" style="font-size: 24px;"><span id="balanceSum" type="number">15000</span> zł</div>
                            <h4 id="balanceSumStatement" class="text-center mt-4"></h4>
                        </div>
                        <div class="piechart">
                            <h2 class="text-uppercase balance-subheader">Wykres Twoich wydatków:</h2>
                            <div class="piechart__item mx-auto"></div>
                            <div class="text-center piechart__key mb-5">
                                <div class="d-flex mb-1">
                                    <div class="small-square" style="background-color: #99DDCC;"></div>
                                    <span>Jedzenie</span>
                                </div>
                                <div class="d-flex mb-1">
                                    <div class="small-square" style="background-color: #CA2ACD;"></div>
                                    <span>Transport</span>
                                </div>
                                <div class="d-flex mb-1">
                                    <div class="small-square" style="background-color: #000D6B;"></div>
                                    <span>Rachunki</span>
                                </div>
                            </div>
                        </div>
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
        <script src="js/balance.js"></script>
    </body>
</html>