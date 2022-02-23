<?php

class DB
{
    // La prop $pdo contiendra la connexion à la bdd
    public $pdo;
    public function __construct()
    {
        // A chaque instanciation de DB, $pdo sera une instance de la classe PDO qui connectera à la bdd.
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=tp-poo', '###', '###');
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
