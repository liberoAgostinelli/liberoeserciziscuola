<?php


$domanda = [];
$risposta_0 = [];
$risposta_1 = [];
$risposta_2 = [];
$risposta_giusta = [];

$dsn = "mysql:host=localhost;dbname=ProvaEsercizi";
$username = "libero";
$pass = "Leomolly123?";
try{
    $PDOconn = new PDO($dsn, $username, $pass);
    $PDOconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $st = $PDOconn->query("select * from sistemi_e_reti_router_esercizio_1");

    $i = 0;
    $record = [];
    while($record = $st->fetch()){

        $domanda[$i] = $record['domanda'];
        $risposta_0[$i] = $record['risposta_1'];
        $risposta_1[$i] = $record['risposta_2'];
        $risposta_2[$i] = $record['risposta_3'];
        $risposta_giusta[$i] = $record['risposta_giusta'];
        $i++;
    }
    
}catch(PDOException $e){
    $e->getMessage();
}

?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css?ts=<?=time()?>&quot">
    <title>Sistemi e reti</title>
</head>
<body>

<?php
    require_once('../include/header.php');
?>

<div id="main">

    <div id="sideMenu">
        <ul>
            <li class="cap" >Routing</li>
            <li> <a href="../index/index_sistemi_e_reti_esercizio_1.php">Esercizio 1</a></li>
            <li> <a href="../index/index_sistemi_e_reti_esercizio_2.php">Esercizio 2</a></li>
        </ul>
    </div>

    <form action="../server/server_sistemi_e_reti_esercizio_1.php" method="POST" name="modulo">

    <?php for($j = 0; $j< count($domanda); $j++) : ?>
    <div class="requests">
        <span id="domanda"> <?php echo $domanda[$j] ?> </span>
        <div id="check">

            <div class="wrappCheck">
                <span class="spanCheck"> <?php echo $risposta_0[$j] ?> </span>
                <input type="radio" name="risposte<?php echo $j ?>"  value="<?php echo $risposta_0[$j] ?>" id="<?php echo 'r' . $j ?>" >
            </div>

            <div class="wrappCheck">
                <span class="spanCheck"> <?php echo $risposta_1[$j] ?> </span>
                <input type="radio" name="risposte<?php echo $j ?>" value="<?php echo $risposta_1[$j] ?>" id="<?php echo 'ra' . $j ?>">
            </div>

            <div class="wrappCheck">
                <span class="spanCheck"> <?php echo $risposta_2[$j] ?> </span>
                <input type="radio" name="risposte<?php echo $j ?>" value="<?php echo $risposta_2[$j] ?>" id="<?php echo 'rad' . $j ?>">
            </div>

        </div>
    </div>
    <?php endfor; ?>

    <div class="wrappBtn">
        <input type="reset" value="Annulla" class="btn" id="btnAnnulla">
        <input type="submit" value="Verifica" class="btn" id="btnVerifica">
    </div>

    </form>

    
    
</div>
    <?php
        require_once('../include/footer.php');
    ?>
</body>
</html>