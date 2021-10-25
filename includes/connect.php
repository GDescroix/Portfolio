<?php
// Ce fichier se connecte à la base de données
// On définit les informations de connexion dans des constantes
// DBHOST = serveur de base de données
// define('DBHOST', 'localhost');
const DBHOST = 'localhost';

// DBUSER = Identifiant utilisateur de la base
const DBUSER = 'guyd';

// DBPASS = Mot de passe de la base de données
const DBPASS = 'i0fm6I4C3DLHvQ==';

// DBNAME = Nom de la base de données
const DBNAME = 'guyd_messages';

// NE RIEN MODIFIER CI-DESSOUS !!!!!!!!
// On définit le DSN (Data Source Name) MySQL
$dsn = 'mysql:dbname=' . DBNAME . ';host=' . DBHOST;

// On tente de se connecter au serveur
try{
    // exécutée quoi qu'il arrive
    $db = new PDO($dsn, DBUSER, DBPASS);

    // On définit la méthode de fetch par défaut
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // On définit le charset des transferts de données en UTF8
    $db->exec('SET NAMES utf8');

}catch(PDOException $e){ // On attrape l'exception PDO
    // Exécutée si le code dans try échoue
    die($e->getMessage());
}