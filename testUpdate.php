<?php
include 'DB.php';
include './Article.php';

$article = new Article;


$article->find(12);
$article->title = "Updated title";
$article->content = "Updated content";
$article->update();
