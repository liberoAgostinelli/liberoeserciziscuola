<?php
$punteggio = 0;

$domanda = [];
$risposta_1 = [];
$risposta_2 = [];
$risposta_3 = [];
$risposta_giusta = [];

$dsn = "mysql:host=localhost;dbname=ProvaEsercizi";
$username = "libero";
$pass = "Leomolly123?";
try{
    $PDOconn = new PDO($dsn, $username, $pass);
    $PDOconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $st = $PDOconn->query("select * from italiano_illuminismo_esercizio_1");

    $i = 0;
    $record = [];
    while($record = $st->fetch()){
        //echo $record['id_domanda'] . '<br>';
        //var_dump($record);
        $domanda[$i] = $record['domanda'];
        $risposta_1[$i] = $record['risposta_1'];
        $risposta_2[$i] = $record['risposta_2'];
        $risposta_3[$i] = $record['risposta_3'];
        $risposta_giusta[$i] = $record['risposta_giusta'];
        // echo $domanda[$i] . '<br>';
        // echo $risposta_1[$i] . '<br>';
        // echo $risposta_2[$i] . '<br>';
        // echo $risposta_3[$i] . '<br>';
        // echo $risposta_giusta[$i] . '<br>';
        $i++;
        //var_dump($domanda);
    }
    // echo $_POST['risposte0'] . '<br>';
    // echo $_POST['risposte1'] . '<br>';
    // echo $_POST['risposte2'] . '<br>';

    // echo $risposta_2[0] . '<br>';
    // echo $risposta_2[1] . '<br>';
    // echo $risposta_2[2] . '<br>';
    
    // if($risposta_3[$j] === $_POST['risposte'.$j] && $_POST['risposte'.$j] === $risposta_giusta[]){
    //     echo 'esatto';
    // }else echo 'sbagliato';
}catch(PDOException $e){
    $e->getMessage();
}

function checked($c): string{
    switch ($c){
        case 'check_1': return 'checked'; break;
        case 'check_2': return 'checked'; break;
        case 'check_3': return 'checked'; break;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Italiano correzione</title>
</head>
<body>

<?php
    require_once('../include/header.php');
?>

<div id="main">

    

    <?php for($j = 0; $j< count($domanda); $j++) : ?>
    <div class="requests">
        <span id="domanda"> <?php echo $domanda[$j] ?> </span>
        <div id="check">

            <div class="wrappCheck">
                <span class="spanCheck"> <?php echo $risposta_1[$j] ?> </span>

                <div class="<?php if( $risposta_1[$j] === $_POST['risposte'.$j] && $_POST['risposte'.$j] === $risposta_giusta[$j]){ echo 'radioGiusto'; $punteggio++;}else{echo 'radioSbagliato';} ?>">
                    <input type="radio" name="risposte<?php echo $j ?>" 
                    <?php echo 'disabled ' ?>  id="<?php echo 'r' . $j ?>"  
                    <?php if($_POST['risposte'.$j] === $risposta_1[$j]){ echo ' checked';}?>>
                </div>
            </div>

            <div class="wrappCheck">
                <span class="spanCheck"> <?php echo $risposta_2[$j] ?> </span>
                <div class="<?php if($risposta_2[$j] === $_POST['risposte'.$j] && $_POST['risposte'.$j] === $risposta_giusta[$j]){ echo 'radioGiusto'; $punteggio++;}else{echo 'radioSbagliato';} ?>">
                    <input type="radio" name="risposte<?php echo $j ?>" 
                    <?php echo 'disabled '; ?> id="<?php echo 'ra' . $j ?>"
                    <?php if($_POST['risposte'.$j] === $risposta_2[$j]){ echo ' checked';}?>>
                </div>    
            </div>

            <div class="wrappCheck">
                <span class="spanCheck"> <?php echo $risposta_3[$j] ?> </span>
                <div class="<?php if($risposta_3[$j] === $_POST['risposte'.$j] && $_POST['risposte'.$j] === $risposta_giusta[$j]){ echo 'radioGiusto'; $punteggio++;}else{echo 'radioSbagliato';} ?>">
                    <input type="radio" name="risposte<?php echo $j ?>" 
                    <?php echo 'disabled '; ?> id="<?php echo 'rad' . $j ?>"
                    <?php if($_POST['risposte'.$j] === $risposta_3[$j]){ echo ' checked';}?>>
                </div>
            </div>

        </div>
    </div>
    <?php endfor; ?>

    <div class="wrappBtn">
        <span id="punt" class="btnServer">Punteggio <?php echo $punteggio;?></span>
        <a href="../index/index_italiano_illuminismo_esercizio_1.php" id="rip" class="btnServer">Ripeti</a>
    </div>
    
    
</div>
    <?php
        require_once('../include/footer.php');
    ?>
</body>
</html>