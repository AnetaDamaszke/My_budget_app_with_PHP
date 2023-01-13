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

        // ładowanie nazw oraz ID kategorii przychodów użytkownika:
        $getIncomesCategory=$db->query("SELECT *
        FROM incomes_category_assigned_to_users 
        WHERE user_id='$userId'");
        
        // ładowanie nazw oraz ID kategorii wydatków użytkownika:
        $getExpensesCategory=$db->query("SELECT * 
        FROM expenses_category_assigned_to_users 
        WHERE user_id='$userId' ");

        //całkowita suma przychodów:
        $totalIncomesSum=$db->query("SELECT SUM(amount) FROM incomes WHERE user_id='$userId' AND date_of_income BETWEEN '$date1' AND '$date2'");
        $totalIncomes = $totalIncomesSum->fetchColumn();

        //całkowita suma wydatków:
        $totalExpensesSum=$db->query("SELECT SUM(amount) FROM expenses WHERE user_id='$userId' AND date_of_expense BETWEEN '$date1' AND '$date2'");
        $totalExpenses = $totalExpensesSum->fetchColumn();

        //bilns całkowity:
        $totalBalance = $totalIncomes - $totalExpenses;

        $colors = array();
        $parts = array();
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
                <h1 id="balanceHeader" class="text-center add-header"><?php echo $_SESSION['balanceTitle'] ?></h1>
                <div class="row">
                    <div class="col-lg-6 px-3 px-md-5">
                        <h2 class="text-uppercase text-center balance-subheader">Wydatki</h2>
                        <div class="box balance-box" style="background-color: #4FC6A8;">
                            <div class="accordion" id="accordionExpenseBalance">
                                <div class="accordion" id="accordionExpenseBalance1">
                                    <div class="accordion-item">
                                            <?php
                                                $number = 1;
                                                while ($category = $getExpensesCategory ->fetch())
                                                {
                                                    $expenseCategoryId = $category['id'];

                                                    //ładownie wydatków użytkownika w kategorii:
                                                    $userExpensesCategory=$db->query("SELECT * FROM expenses 
                                                    WHERE expense_category_assigned_to_user_id='$expenseCategoryId' 
                                                    AND date_of_expense BETWEEN '$date1' AND '$date2'");

                                                    // suma wydatków w kategorii:
                                                    $totalCategoryExpenses = $db->query("SELECT SUM(amount) FROM expenses 
                                                    WHERE expense_category_assigned_to_user_id='$expenseCategoryId' 
                                                    AND date_of_expense BETWEEN '$date1' AND '$date2'");
                                                    $totalSumCategoryExpenses = $totalCategoryExpenses->fetchColumn();

                                                    if($totalSumCategoryExpenses > 0) {
                                                        echo '
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="heading'.$number.'">
                                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" 
                                                                data-bs-target="#collapse'.$number.'" aria-expanded="true" aria-controls="collapse'.$number.'">
                                                                    <span class="">'.$category['category_name'].'</span>
                                                                </button>
                                                            </h2>
                                                        </div>
                                                        <div id="collapse'.$number.'" class="accordion-collapse collapse" aria-labelledby="heading'.$number.'" 
                                                        data-bs-parent="#accordionBalance'.$number.'">
                                                            <div class="accordion-body">
                                                                <table>';  

                                                                    while ($userExpense = $userExpensesCategory->fetch())
                                                                    {
                                                                        echo '<tr><td class="accordion__bold-text">'.$userExpense['expense_comment'].'</td>';
                                                                        echo '<td>'.$userExpense['date_of_expense'].'</td>';
                                                                        echo '<td>'.$userExpense['amount'].'</td></tr>'; 
                                                                    }
                                                                    
                                                                    echo '
                                                                        <tr>
                                                                            <td colspan="2" class="accordion__bold-text">Suma:</td> <td class="accordion__sum">
                                                                                <span>'.$totalSumCategoryExpenses.'</span> zł
                                                                            </td>
                                                                        </tr>
                                                                </table>
                                                            </div>
                                                        </div>';
                                                    }

                                                    $number++;
                                                }
                                            ?>
                                    </div>  
                                </div>
                            </div>
                            <div class="d-flex mt-4 mb-3">
                                <h3 class="text-uppercase balance-box__item-subheader">Całkowita suma wydatków:</h3>
                                <div class="box balance-box__sum">
                                    <?php
                                        echo '<span id="allExpensesSum">'.$totalExpenses.' zł</span>';
                                    ?>
                                </div>
                            </div>
                            <div class="piechart mt-5">
                                <h2 class="balance-subheader">Wykres Twoich wydatków:</h2> 
                                <div class="text-center piechart__key mb-5">
                                    <?php
  
                                        $getExpensesCategory=$db->query("SELECT * 
                                        FROM expenses_category_assigned_to_users 
                                        WHERE user_id='$userId' ");
                                        
                                        $n=0;
                                        $i=0;

                                        while($category = $getExpensesCategory ->fetch())
                                        {
                                            $expenseCategoryId = $category['id'];
                                                                                        
                                            $totalCategoryExpenses = $db->query("SELECT SUM(amount) FROM expenses 
                                            WHERE expense_category_assigned_to_user_id='$expenseCategoryId' 
                                            AND date_of_expense BETWEEN '$date1' AND '$date2'");
                                            $totalSumCategoryExpenses = $totalCategoryExpenses->fetchColumn();

                                            // losowy kolor:
                                            
                                            $color = dechex(rand(0x000000,0xFFFFCD));
                                            $backgroundColor = str_pad($color, 6, '0', STR_PAD_LEFT);
                                            

                                            if($totalSumCategoryExpenses > 0)
                                            {
                                                echo '
                                                <div class="d-flex mb-1">
                                                    <div class="small-square" style="background-color: #'.$backgroundColor.';"></div>
                                                    <span>'.$category['category_name'].'</span>
                                                </div>';
                                                $i++;
                                                $colors[$i] = $backgroundColor;
                                                $parts[$i] = ($totalSumCategoryExpenses / $totalExpenses)*360;
                                                $n++;
                                                $_SESSION['number'] = $n;
                                            } 
                                        }   
                                    ?>
                                    <style>
                                    .piechart__item {
                                        background-image: conic-gradient(
                                            <?php
                                                $sum = 0;
                                                for($i=1; $i <= $_SESSION['number']; $i++) {
                                                    
                                                    
                                                    if($i == 1) {
                                                        echo '#'.$colors[1].' '.$parts[1].'deg, ';
                                                    } else if($i == $_SESSION['number']) {
                                                        echo '#'.$colors[$i].' '.$sum.'deg';
                                                    } else {
                                                        echo '#'.$colors[$i].' '.$sum.'deg '.$parts[$i]+$sum.'deg, ';
                                                    }

                                                    $sum = $sum + $parts[$i];
                                                }
                                            ?>);
                                    }
                                </style>
                                <div class="piechart__item mx-auto"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-6 px-3 px-md-5">
                    <h2 class="text-uppercase text-center balance-subheader">Przychody</h2>
                        <div class="box balance-box" style="background-color: #99DDCC;">
                            <div class="accordion" id="accordionIncomeBalance01">
                                <div class="accordion-item">
                                        <?php
                                            $number = 1;
                                            while ($category = $getIncomesCategory ->fetch())
                                            {
                                                $incomeCategoryId = $category['id'];

                                                //ładownie przychodów użytkownika w kategorii:
                                                $userIncomesCategory=$db->query("SELECT * FROM incomes 
                                                WHERE income_category_assigned_to_user_id='$incomeCategoryId' 
                                                AND date_of_income BETWEEN '$date1' AND '$date2'");

                                                // suma przychodów w kategorii:
                                                $totalCategoryIncomes = $db->query("SELECT SUM(amount) FROM incomes WHERE income_category_assigned_to_user_id='$incomeCategoryId' 
                                                AND date_of_income BETWEEN '$date1' AND '$date2'");
                                                $totalSumCategoryIncomes = $totalCategoryIncomes->fetchColumn();

                                                if($totalSumCategoryIncomes > 0) {
                                                    echo '
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="heading0'.$number.'">
                                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse0'.$number.'" aria-expanded="true" aria-controls="collapse0'.$number.'">
                                                                <span class="">'.$category['category_name'].'</span>
                                                            </button>
                                                        </h2>
                                                    </div>
                                                    <div id="collapse0'.$number.'" class="accordion-collapse collapse" aria-labelledby="heading0'.$number.'" data-bs-parent="#accordionBalance0'.$number.'">
                                                        <div class="accordion-body text-center">
                                                            <table>
                                                                ';                                                  

                                                                    while ($userIncome = $userIncomesCategory->fetch())
                                                                    {
                                                                        echo '<tr><td class="accordion__bold-text">'.$userIncome['income_comment'].'</td>';
                                                                        echo '<td>'.$userIncome['date_of_income'].'</td>';
                                                                        echo '<td>'.$userIncome['amount'].'</td></tr>'; 
                                                                    }
                                                                    
                                                                    echo '
                                                                        <tr>
                                                                            <td colspan="2" class="accordion__bold-text">Suma:</td> <td class="accordion__sum">
                                                                                 <span id="incomes1Sum">'.$totalSumCategoryIncomes.'</span> zł
                                                                            </td>
                                                                        </tr>
                                                            </table>
                                                        </div>
                                                    </div>';
                                                }

                                                $number++;
                                            }
                                        ?>
                                </div>  
                            </div>
                            <div class="d-flex mt-4">
                                <h3 class="text-uppercase balance-box__item-subheader">Całkowita suma przychodów:</h3>
                                <div class="box balance-box__sum">
                                    <?php
                                        echo '<span id="allIncomesSum">'.$totalIncomes.' zł</span>';
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <img class="img-fluid" src="img/ECONOMY_ANALYSIS.png" alt="budżet domowy" />
                        </div>

                        <div class="box balance-box mt-5" style="background-color: #EAEAEB;">
                            <h3 class="balance-subheader pb-2">Twój całkowity bilans wynosi:</h3>
                            <div class="box balance-box__sum mb-2" style="font-size: 24px;">
                                <?php 
                                    echo '<span id="balanceSum" type="number" step="0.01">'.$totalBalance.' zł</span>';
                                ?>
                            </div>
                            <h4 class="text-center mt-4">
                                <?php 
                                    if( $totalBalance < 0) echo 'Uważaj! Wpadasz w długi!';
                                    else echo 'Gratulacje! Świetnie zarządzasz finansami!';
                                ?>
                            </h4>
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