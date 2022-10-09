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
        FROM user_incomes_categories 
        WHERE user_id='$userId'");                                             

        // dodawanie przychodu do bazy:
        if(isset($_POST['incomeValue'])) {
            
            $value = $_POST['incomeValue'];
            $date = $_POST['incomeDate'];
            $comment = $_POST['comment'];
            $category = $_POST['category'];

            // pobierania ID kategorii przychodu:
            $getIncomeId=$db->query("SELECT id FROM user_incomes_categories WHERE category_name='$category'");
            $categoryId = $getIncomeId->fetchColumn();
            
            $query = $db->prepare('INSERT INTO user_incomes VALUES (NULL, :userid, :value, :date, :categoryid, :comment)');
            $query -> bindValue(':userid', $userId, PDO::PARAM_INT);
            $query -> bindValue(':value', $value, PDO::PARAM_STR);
            $query -> bindValue(':date', $date, PDO::PARAM_STR);
            $query -> bindValue(':categoryid', $categoryId, PDO::PARAM_INT);
            $query -> bindValue(':comment', $comment, PDO::PARAM_STR);
            $query -> execute();

            $is_ok = true;
            $_SESSION['comment'] = 'Świetnie! Dodano nowy przychód do bazy!';
        } else {
            $is_ok = false;
            $_SESSION['comment'] = 'Błąd!';
        }

        // dodawanie nowej kategorii:
        if(isset($_POST['addNewIncomeCat'])) {

            $newCategory = $_POST['addNewIncomeCat'];
            $addNewIncomeCat = $db->prepare('INSERT INTO user_incomes_categories 
            VALUES (NULL, :userid, :newCategoryName)');
            $addNewIncomeCat -> bindValue(':userid', $userId, PDO::PARAM_INT);
            $addNewIncomeCat -> bindValue(':newCategoryName', $newCategory, PDO::PARAM_STR);
            $addNewIncomeCat -> execute();
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
                <a class="navbar-brand" href="index.php">
                    <img class="menu-logo" src="img/MYBUDGET.svg" alt="logo" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navContent">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navContent">
                    <div class="navbar-nav">
                        <a href="expense.php" class="nav-item nav-link menu-link">Dodaj wydatek</a>
                        <a href="balance.php" class="nav-item nav-link menu-link">Zobacz bilans</a>
                        <a href="setting.php" class="nav-item nav-link ms-2 ms-lg-3 menu-link">Ustawienia</a>
                        <a href="logout.php" class="nav-item nav-link ms-2 ms-lg-3 menu-link">Wyloguj</a>
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
                            <form method="post">
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="form-group w-100">
                                            <label for="incomeValue" class="form-control-label mb-2">Kwota w PLN</label>
                                            <input name="incomeValue" placeholder="np. 500.00" class="form-control"/>
                                        </div>
                                    </div> 
                                    <div class="col-md-6">
                                        <div class="form-group w-100">
                                            <label for="incomeDate" class="form-check-label d-block mb-2">Data</label>
                                            <input id="incomeDate" name="incomeDate" class="form-control"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 d-flex">
                                        <div class="d-flex">
                                            <div id="categoryCheck" class="form-check">
                                                <label class="form-check-label d-block mb-2">Kategoria:</label>
                                                <select name="category" class="me-3">
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
                                        <button type="button" class="btn form-sm-button" data-bs-toggle="modal" data-bs-target="#addCatModal">
                                        Dodaj nową
                                        </button>
                                    </div>

                                    <!-- Modal z dodawaniem nowej kategorii -->
                                    <div class="modal fade" id="addCatModal" role="dialog" tabindex="-1" aria-labelledby="addCatModall" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addCatModall">Dodaj nową kategorię przychodu</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-md-6">
                                                <div id="categoryCheck" class="form-check">
                                                    <label class="form-check-label d-block mb-2"></label>
                                                    <div class="form-group pt-4">
                                                        <label for="addNewIncomeCat" class="form-control-label d-block mb-2">Nazwa nowej kategorii:</label>
                                                        <input name="addNewIncomeCat" class="form-control d-block w-100 p-3" />                                
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Anuluj</button>
                                            <button type="submit" class="btn btn-primary">Dodaj do bazy</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    
                                    <div class="form-group pt-4">
                                        <label for="comment" class="form-control-label d-block mb-2">Komentarz (opcjonalnie)</label>
                                        <input name="comment" class="form-control d-block w-100 p-3" />
                                    </div>
                                </div>
                                <div class="text-center statement"></div>
                                <div class="row pt-2 pb-2">
                                    <div class="col-md-6">
                                        <a href="menu.html" type="button" class="btn form-button__secondary">Anuluj</a>
                                    </div>
                                    <div class="col-md-6">
                                        <button id="addIncomeBtn" type="submit" class="btn form-button">Dodaj</button>
                                    </div>
                                </div>
                                <?php 
                                    if($is_ok == true)
                                    {
                                        echo '<div>'.$_SESSION['comment'].'</div>';
                                        unset($_SESSION['comment']);
                                    }
                                ?>
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