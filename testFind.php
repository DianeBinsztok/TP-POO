<?php
include 'DB.php';
include './Article.php';


$article = new Article;
// je modifie $article en donnant un argument à une de ses méthodes.
$article->find(3);
var_dump($article);





function hydrateArticle(object $instance, $id)
{
    $instance->find($id);
    return $instance;
}

var_dump(hydrateArticle(new Article, 3));
