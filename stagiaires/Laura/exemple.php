<?php
// on essaye d'executer le code
try{
    // création d'une instance (object) de la classe PDO
    // non valide
    $connection = new PDO("mysql:host=localhost; port=3307;dbname=listepays;charset=utf8mb4;","root");
    //si on a une erreur dans le try, elle est "attrapée"
    //par le catch (donc non affichée par défaut dans l'horrible onglet orange) et mise dans le $e (convention
    // de nommage) qui contient, en cas d'erreur
    //seulement, une instance de la classe Exeption
}catch(PDOException $e){
    // on vérifie le code erreur
    switch($e->getCode()){
        //2002 -> pas de connection au sereur de DB
        case 2002:
            die("Connecetion impossible au serveur de DB, vérifiez les attaques");
            break;
            //tentative de connection non valide
            //mauvais login mauvais mots de passe
            case 1045:
                //header et erreur 500
                header("HTTP/1.1 500");
                //arrêt du script
                exp();
                //redirection avec header (lien ->"location")
            //les autres cas
    default:
    }
    //on peut affichée le code erreur
    echo "Code erreur : ".$e->getCode();
    //on peut arrêter le code en affichant le message
    die("<br>Erreur : ".$e->getmessage());
}