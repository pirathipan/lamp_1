<?php
    session_start();
    if(empty($_SESSION['choice']))
    {
        $_SESSION['choice'] = rand(0,100);
    }
    if(empty($_SESSION['cpt'])){
        $_SESSION['cpt'] = 0;
    }
    if(empty($_SESSION['best'])){
        
    }

    $choice = $_SESSION['choice'];
    echo($choice);
    $response = null;
    if(!isset($_POST['guess']))
    {
        
        $response = "pas de nombre";
    }else{
        $_SESSION['cpt']++;
        $guess = $_POST['guess'];
        echo('<br>cpt :'.$_SESSION['cpt']);
        if($guess > $choice ){
            $response = "c'est moins";
        }elseif($guess < $choice){
            $response = "c'est plus";
        }else
        {
            $response = "c'est gagne";
            unset($_SESSION['choice']);
            unset($_SESSION['cpt']);
        }
    }

?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <form method="post">
        <input type="text" name="guess">
        <input type="submit">
        <?php 
        echo($response) ;
        ?>
    </form>
</body>
</html>