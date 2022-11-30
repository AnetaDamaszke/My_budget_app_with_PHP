<?php

    session_start();

    if(!isset($_SESSION['logged_on'])) {
        header('Location: login.php');
        exit();
    } else {

        require_once "database.php";

        $userId = $_SESSION['userId'];

        // ładowanie kategorii użytkownika:
        $getCategoryName=$db->query("SELECT category_name 
        FROM expenses_category_assigned_to_users 
        WHERE user_id='$userId'");
        
        // ładowanie sposobów płatności użytkownika:
        $getPaymentMethod=$db->query("SELECT name
        FROM payment_methods_assigned_to_users 
        WHERE user_id='$userId'");  

        // dodawanie wydatku do bazy:
        if(isset($_POST['expenseValue'])) {
            
            $category = $_POST['category'];
            $payment = $_POST['payment'];
            $value = $_POST['expenseValue'];
            $date = $_POST['expenseDate'];
            $comment = $_POST['comment'];

            // pobierania ID kategorii przychodu:
            $getExpenseId=$db->query("SELECT id FROM expenses_category_assigned_to_users WHERE category_name='$category'");
            $categoryId = $getExpenseId->fetchColumn();

            // pobierania ID metody płatności:
            $getPaymentMethodId=$db->query("SELECT id FROM payment_methods_assigned_to_users WHERE name='$payment'");
            $paymentMethodId = $getPaymentMethodId->fetchColumn();
            
            //dodawanie wydatku do bazy:
            $query = $db->prepare('INSERT INTO expenses VALUES (NULL, :userid, :categoryid, ::paymentmethodid, :value, :date, :comment)');
            $query -> bindValue(':userid', $userId, PDO::PARAM_INT);
            $query -> bindValue(':categoryid', $categoryId, PDO::PARAM_INT);
            $query -> bindValue(':paymentmethodid', $categoryId, PDO::PARAM_INT);
            $query -> bindValue(':value', $value, PDO::PARAM_STR);
            $query -> bindValue(':date', $date, PDO::PARAM_STR);
            $query -> bindValue(':comment', $comment, PDO::PARAM_STR);
            $query -> execute();

            $is_ok = true;
            $_SESSION['comment'] = 'Świetnie! Dodano nowy przychód do bazy!';
        } else {
            $is_ok = false;
            $_SESSION['comment'] = 'Błąd!';
        }
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
                                    <div class="col-md-6">
                                        <div class="form-group pt-3">
                                            <label class="form-check-label d-block mb-2">Kategoria:</label>
                                            <select name="category">
                                                <option selected="selected">Wybierz:</option>
                                                <?php 
                                                    while ($name = $getCategoryName ->fetch())
                                                    {
                                                        echo '<option>'.$name['category_name'].'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group pt-3">
                                            <label class="form-check-label d-block mb-2">Sposób płatności:</label>
                                            <select name="payment">
                                                <option selected="selected">Wybierz:</option>
                                                <?php 
                                                    while ($name = $getPaymentMethod ->fetch())
                                                    {
                                                        echo '<option>'.$name['name'].'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group pt-4">
                                        <label for="comment" class="form-control-label d-block mb-2">Komentarz (opcjonalnie)</label>
                                        <input name="comment" class="form-control d-block w-100 p-3" />
                                    </div>
                                </div>
                                <div class="text-center pt-3">
                                    <?php 
                                        if($is_ok == true)
                                        {
                                            echo '<div>'.$_SESSION['comment'].'</div>';
                                            unset($_SESSION['comment']);
                                        }
                                    ?>
                                </div>
                                <div class="row pt-2">
                                    <div class="col-md-6">
                                        <a href="menu.php" type="button" class="btn form-button__secondary">Anuluj</a>
                                    </div>
                                    <div class="col-md-6">
                                        <button id="addExpenseBtn" type="submit" class="btn form-button">Dodaj</button>
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