<?php
require 'include/library.inc.php';
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>UB Budget Management</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
        <script src="main.js"></script>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <script src="bootstrap/jquery.min.js"></script>
        <script src="bootstrap/popper.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </head>
<body>
    <div class="container">
        <div class="header">
            <?php require 'header.php'; ?>
        </div>
        <div class="container" style="float:left">
            <div class="sidenav">
            <?php 
                if( isset($_SESSION["user"]) ){
                    echo '<ul >';
                    echo '<li ><a class="nav-link" href="?menu=dashboard&account=0&budgetline=0"> Dashboard </a></li> ';
                    echo '<li ><a class="nav-link" href="?menu=incomes&account=0&budgetline=0"> Incomes </a>';
                    echo '<a href="?menu=newincome&account='.( isset($_GET["account"])? $_GET["account"] : 0 ).'&budgetline='.( isset($_GET["budgetline"])? $_GET["budgetline"] : 0 ).'">. + </a></li> ';
                    echo '<li ><a class="nav-link" href="?menu=expenses&account=0"> Expenses </a>';
                    echo '<a href="?menu=newexpense&account='.( isset($_GET["account"])? $_GET["account"] : 0 ).'&budgetline='.( isset($_GET["budgetline"])? $_GET["budgetline"] : 0 ).'">. + </a></li> ';
                    echo '<li ><a class="nav-link" href="?menu=history&account=0"> History </a></li> ';
                    echo '<li ><a class="nav-link" href="?menu=statistics&account=0"> Statistics </a></li> ';
                    echo '</ul>';
                }
            ?>
            </div>
            <div class="container">
                <div class="acc-nav-bar">
                <?php if( isset($_SESSION["user"]) ){require 'accountNavBar.php';}?>
                </div>
                <div class="main-display">
                    <?php 
                        if ( !isset($_SESSION["user"]) ){
                           echo' Please Log-in to access your account';
                        }
                        else {
                            if ( !isset($_GET["menu"]) ){
                                echo 'WELCOME to the UB Budet Management Systemm Platform';
                            }
                            else{
                                if( $_GET["menu"] == "dashboard" ){
									require 'pages/dashboard.php';
                                }
                                if( $_GET["menu"] == "incomes" ){
                                    require 'pages/incomes.php';
                                }
                                if( $_GET["menu"] == "expenses" ){
                                    require 'pages/expenses.php';
                                }
                                if( $_GET["menu"] == "history" ){
									require 'pages/history.php';
								}
                                if( $_GET["menu"] == "statistics" ){
									require 'pages/statistics.php';
                                }
                                if( $_GET["menu"] == "newaccount" ){
									require 'pages/newAccount.php';
                                }
                                if( $_GET["menu"] == "newbudgetline" ){
									require 'pages/newBudgetLine.php';
                                }
                                if( $_GET["menu"] == "newincome" ){
									require 'pages/newIncome.php';
                                }
                                if( $_GET["menu"] == "newexpense" ){
									require 'pages/newExpense.php';
								}
                                
                            }
                           
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="footer">
            my footer
        </div>       
    </div>
</body>
</html>