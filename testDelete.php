<?php
include 'DB.php';
include './Article.php';

$article = new Article;


$article->find(13);
$article->delete();
