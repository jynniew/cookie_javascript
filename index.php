<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <title>Exercice 2</title>
</head>
<body>
<h1 class="d-flex justify-content-center m-4 text-success">Qu'est ce que c'est ?</h1> 


<?php 
$time = time();
if ( !array_key_exists("username", $_COOKIE)) {
    echo "<p> Bonjour utilisateur !</p>" ;

    
    setcookie("username", "Jynnie", $time + 28);
    setcookie("time", $time + 28, $time + 28);
} 

// le cookie existe
else {
    echo "<p> Bon retour parmis nous ".$_COOKIE['username']." !</p>";

    // Afficher le nombre de secondes restantes avant l'expiration du cookie
    // On est obligé de le mettre ici sinon à $expiration = 0 on a une erreure
    $expiration = $_COOKIE['time'] - time();
    if ($expiration < 0) {
        echo "Vous n'avez plus le temps !";
    } else { ?>
        <p>Il reste <span id='remain_time'><?php echo $expiration ?></span> secondes avant l'expiration du cookie !</p>

        <!-- parti script rafraichissement automatique -->
        <script>
            setInterval(function() {
                //recup du temps restant
                var span = document.querySelector("#remain_time");

                //recup de sa valeur en entier
                var remain_time = parseInt(span.innerHTML);

                // Ajout d'une seconde au temps restant
                remain_time = remain_time - 1;
                
                // Si le temps restant est écoulé (<=0), on rafraichit la page
                if(remain_time <=0 ) {
                    location.reload();
                }

                // Rafraichier l'affichage du span avec la nouvelle valeur
                span.innerHTML = remain_time ;
            }, 1000);
        </script>

        <?php
    }
}
echo "Il est ". time()."</p>";









?>
</body>
</html>