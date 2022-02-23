<?php
// la machine a besoin de lire DB.php avant Article.php car Article.php contient une méthode qui fait appel à DB.php
include 'DB.php';
include './Article.php';

print_r(Article::all());
