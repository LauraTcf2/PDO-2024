<?php
// chef d'orchestre
// A chaque requête/Click balise <a>, il est appelé

//Once permet d'importer le fichier une seule fois.
//Cela veux dire que si on essaye a l'avenir de re importer le fichier il ne le fera pas
//On fusionne config.php avec l'indes.php
require "../config.php";
//on incorpore notre model
require_once "../model/CountriesModel.php"

//new permet de créer un NOUVEAU objet  de la class PDO
//une nouvelle instance de PDO
//(dsn = driver source non)
$dsn = DB_DRIVER . ":host=" . DB_HOST . ";port=" . DB_PORT . ";dbname" . DB_NAME . ";charset=" . DB_CHARSET;

try{
    
    $myPDO = new PDO($dsn, DB_LOGIN, DB_PASS);

}catch(Exception $e){
        //SI une erreur PDO se produit, on arrête tout en affichant le message d'erreur
        die($e->getMessage());
}
        





//Permet de récupérer la variable pg dans la barre d'url
//$GET["pg"]
//Montre la variable en format HTML avec un <pre>
//Adresse + ligne +type + value + length
//Var_dump($_GET["pg"]);





$content = "home_page.php";
//Si $_GET["pg"] existe et qu'il n'y a PAS vide
if(!empty($_GET["pg"])){
    switch($_GET["pg"]){
        case "pagination":
            $allCountries = getALLCountries($myPDO);
            $content = "pagination.php";
            break; //permet de ne pas lire default ou les autres cas si il y en a en dessous
            
            //si aucun cas si dessus n'a été validé, le default est lu
            default:
            $content = "error404.php";
            break;
    }
}

// On intégre/import le fichier HTML
// On fusionne le fichier avec index.php
include "../view/$content";