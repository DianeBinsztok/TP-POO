<?php
include 'DB.php';
include './Article.php';

$article = new Article;
$article->title = "test";
$article->content = "test content";

$article->save();
