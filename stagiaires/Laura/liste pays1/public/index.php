<?php
/*
** Front controller
*/

// chargement de dépendances
//on utilise 'require_' car on veut arrêter
//le script en cas d'erreur, et le '_once'
//car le fichier contient des constantes
//on ne peut en aucun cas les redéfinir
require_once("../config.php");

//on va utilisée un try catch pour géré les erreurs de connection

try{

    
    //on va se connecter à la base de donnée
    // en utilisant PDO
    //utilisant new, si on doit passer des arguments
    //au paramètres, on les mets dans ().
    //une méthode est appelée lorsqu'on utilise new :
    //PDO::__construc(param1, param2, ...)
    $PDOconnect = new PDO(MY_DB_DRIVER.":host=".MY_DB_HOST.";port=".MY_DB_PORT.";dbname=".MY_DB_NAME.";charset=".MY_DB_CHARSET,MY_DB_LOGIN,MY_DB_PASS);
}catch(Exception $e){

    echo "<h3>".($e->getCode())."</h3>";
    die($e->getCode());
}

// Création de la requête dans la variable locale, bonne pratique pour futures requêtes préparée 
$sql = "SELECT * FROM countries";

//Exécution réelle de la requête, on utilise ->query() uniquement pour les SELECT
$query = $PDOconnect->query($sql,$query);

//on va compter le nombre de lignes affectées (chargées) par la requête $query en utilisant la méthode ->rewCount()
$nbPays = $query->rowCount();

//si on a au moin un pays
if($nbPays!==0){
    //conversion des resultats venant de la db en tableau indexé
    $allCountries = $query->fetchAll(PDO::FETCH_ASSOC);
    //avoir plus qu'un résultat utilisée 'fetchALL'

}

//on va charger la vue pour afficher tous les pays récupérés par la requête $query
include_once "../view/homepage.view.php";

//remettre le curseur à 0 pour réutiliser la requête (inutile pour MYSQL et MariaDB)
$query->closeCursor();

//on ferme notre connection (portabilié du code)
$PDOConnect = null;
//var_dump($PDOConnect,$sql,query *)

var_dump($PDOconnect);