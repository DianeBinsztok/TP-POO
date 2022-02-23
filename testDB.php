<?php

include './DB.php';

$testDB = new DB;
// renvoie une nouvelle connexion PDO à chaque fois
var_dump($testDB->pdo);
