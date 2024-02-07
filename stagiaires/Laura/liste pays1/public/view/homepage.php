<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les pays du monde</title>
</head>
<body>
    <h1> Les pays du monde</h1>
    <h3>Nombre de pays dans notre liste : <?=$nbpays?></h3>
    <p>Utilisation de la boucle while avec fetch pour lister tout les pays.</p>
    <pre><code>
        <div>
        <?php
    //Tant qu'on a des pays à lister, on peut le fait avec while et nos résultats ligne par ligne avec fetch et PDO::FETCH_ASSOC qui convertit les lignes en tableau assoctiatif
        while($item = $query->fetch(PDO::FETCH_ASSOC)):
            ?>
    <p><?=$item['nom']?></p>
    <?phpendwhile;

    ?>
</code></pre>
    </div>

</body>
</html>