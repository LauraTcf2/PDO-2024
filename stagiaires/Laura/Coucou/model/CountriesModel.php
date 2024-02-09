<?php
// Les fonctions sont toujours en camelCase 🐪
function getALLCountries(PDO $myPDO): array{
//je spécifie que $myPDO doit être une instance de PDO
//type $variable
    $sql = "SELECT * FROM countries";
    //On stocke notre commande SQL dans $sql
    //chercher toutes les données qui se situe dans la table countries
    $query = $myPDO->query($sql);

//On utilise $query qui possède tout nos pays et nous y faisons un fetchALL pour tout les récupérer dans $allCountries
//Ici fetchALL n'intéragie pas avec tout les donners
 $allCountries =  $query->fetchALL(PDO::FETCH_ASSOC);

 //Bonne pratique a faire aprés un fetchALL qui permet de remettre le cursor a 0
 $query->closeCursor();

 //On retourner $allCountries afin de pouvoir l'utiliser ailleur (lors de l'appel de la fonction getALLCountries)
 return $allCountries;


}