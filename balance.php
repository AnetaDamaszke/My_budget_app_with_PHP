<?php

    session_start();

    if(!isset($_SESSION['logged_on'])) {
        header('Location: login.php');
        exit();
    } else {

        require_once "database.php";

        $userId = $_SESSION['userId'];
        
        $date1 = $_SESSION['date1'];
        $date2 = $_SESSION['date2'];

        //$date1 = $db->query("SELECT date_of_income FROM incomes WHERE id='15'");
        //$date = $date1->fetchColumn();
        //$date2 = '2022-11-31';

        // ładowanie kategorii przychodu użytkownika:
        $getIncomeCategoryName=$db->query("SELECT category_name 
        FROM incomes_category_assigned_to_users 
        WHERE user_id='$userId'");
        
         // ładowanie kategorii wydatku użytkownika:
         $getExpenseCategoryName=$db->query("SELECT category_name 
         FROM expenses_category_assigned_to_users 
         WHERE user_id='$userId'");

         //całkowita suma przychodu:
         $totalIncomeSum=$db->query("SELECT SUM(amount) FROM incomes WHERE user_id='$userId' AND date_of_income BETWEEN $date1 AND $date2");
         $total = $totalIncomeSum->fetchColumn();
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
                        <a href="income.php" class="nav-item nav-link menu-link">Przychód +</a>
                        <a href="expense.php" class="nav-item nav-link menu-link">Wydatek +</a>
                        <a href="settings.php" class="nav-item nav-link ms-2 ms-lg-3 menu-link">Ustawienia</a>
                        <a href="logout.php" class="nav-item nav-link ms-2 ms-lg-3 menu-link">Wyloguj</a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Balance -->
        <section class="balance">
            <div class="container">
                <h1 id="balanceHeader" class="text-center add-header">Twój bilans w bieżacym miesiącu:</h1>
                <div class="row">
                    <div class="col-lg-6 px-3 px-md-5">
                        <h2 class="text-uppercase balance-subheader">Przychody:</h2>
                        <div class="box balance-box" style="background-color: #99DDCC;">
                            <div class="accordion" id="accordionBalance01">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading01">
                                        <?php
                                            while ($name = $getIncomeCategoryName ->fetch())
                                            {
                                                echo '
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse01" aria-expanded="true" aria-controls="collapse01">
                                                    <span class="">'.$name['category_name'].'</span>
                                                    </button>';
                                            }
                                        ?>
                                    </h2>
                                    <!-- <div id="collapse01" class="accordion-collapse collapse" aria-labelledby="heading01" data-bs-parent="#accordionBalance1">
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
                                    </div> -->
                                </div>
                            </div>
                            <div class="d-flex mt-4">
                                <h3 class="text-uppercase balance-box__item-subheader">Całkowita suma przychodów:</h3>
                                <div class="box balance-box__sum">
                                    <?php
                                        echo '<span id="allIncomesSum" class="">'.$total.' zł</span>';
                                    ?>
                                </div>
                            </div>
                        </div>
                        <h2 class="text-uppercase balance-subheader">Wydatki:</h2>
                        <div class="box balance-box" style="background-color: #4FC6A8;">
                            <div class="accordion" id="accordionBalance">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading1">
                                    <?php
                                            while ($name = $getExpenseCategoryName ->fetch())
                                            {
                                                echo '
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse01" aria-expanded="true" aria-controls="collapse01">
                                                    <span class="">'.$name['category_name'].'</span>
                                                    </button>';
                                            }
                                        ?>
                                    </h2>
                                <!-- <div id="collapse1" class="accordion-collapse collapse" aria-labelledby="heading1" data-bs-parent="#accordionBalance">
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
                                    </div> -->
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