<?php 
    if( !isset($_SESSION["user"]) ){
        //change side-nav visibility to false OR display nothing
    }
    else{
        $_SESSION["accounts"] = getAccounts( $_SESSION["user"]->id );
        if ( isset($_SESSION["accounts"]) && is_array($_SESSION["accounts"]) ){
            foreach($_SESSION["accounts"] as $account)
                if (isset($_GET["account"]) && $_GET["account"] === $account->name){
                        $_SESSION["currentAccount"] = $account;
                    } 
        }
        else{
            $_SESSION["accounts"] = 0;
            $_SESSION["currentAccount"] = 0;
            $_SESSION["budgetLines"] = 0;
            $_SESSION["currentBudgetLine"] = 0;
        }


        if ( isset($_SESSION["currentAccount"]) && is_object($_SESSION["currentAccount"]) ){
            $_SESSION["budgetLines"] = getBudgetLines($_SESSION["currentAccount"]->id);
            if ( isset($_GET["budgetline"]) &&  is_array($_SESSION["budgetLines"]) ) {
                foreach($_SESSION["budgetLines"] as $budgetLine)
                    if ($_GET["budgetline"] === $budgetLine->name){
                        $_SESSION["currentBudgetLine"] = $budgetLine;
                    }
                    else{
                        $_SESSION["currentBudgetLine"] = 0;
                    }   
            }
            else{
                $_SESSION["currentBudgetLine"] = 0;
            }
        }
    }
        


        $accounts = getAccounts($_SESSION["user"]->id);
        if ( !is_array($_SESSION["accounts"]) ){
            echo '<li class"menu-item"><a href="?menu=newaccount&account=0"> new Account </a></li>';
        }
        else{
            echo '<ul class"menu">';
            echo '<li class"menu-item"><a href="?menu=newaccount&account=0"> new Account </a></li>';           
            echo '<li class="menu-item ';
            if( isset($_GET["account"]) && $_SESSION["currentAccount"] === 0)echo ' acitve';
            echo '"><a href="?menu='.$_GET["menu"].'&account=0"> all Accounts </a></li>';
            
            foreach($accounts as $account){
                $budgetLines = getBudgetLines($account->id);
                echo '<li class="menu-item ';
                if($_SESSION["currentAccount"]->id === $account->id)echo ' acitve';
                echo '"><a href="?menu='.$_GET["menu"].'&account='.$account->name.'&budgetline=0"> '.$account->name.'</a></li>';
                if ( !is_array($budgetLines) ){
                    echo '<ul class"menu"><li class="menu-item"><a href="?menu=newbudgetline&account='.$account->name.'"> Create new Budget Line </a></li></ul>';
                }
                else  if ( isset($budgetLines) && is_array($budgetLines) && is_object($account) ){
                    
                    echo '<ul class"menu">';
                    echo '<li class="menu-item"><a href="?menu=newbudgetline&account='.$account->name.'"> Create new Budget Line </a></li>';
                    echo '<li class="menu-item';
                    if($_SESSION["currentBudgetLine"] === 0)echo ' acitve';                           
                    echo '"><a href="?menu='.$_GET["menu"].'&account='.$account->name.'&budgetline=0"> All Budget Lines </a></li>';
                    
                    foreach($budgetLines as $budgetLine){
                        echo '<li class="menu-item';
                        if($_SESSION["currentBudgetLine"] === $budgetLine)echo ' acitve';                           
                        echo '"><a href="?menu='.$_GET["menu"].'&account='.$account->name.'&budgetline='.$budgetLine->name.'"> '.$budgetLine->name.'</a></li>';
                    }
                    echo '</ul>';
                }
            }
            echo '</ul>';
            
            
            
        }
    
    
?>
