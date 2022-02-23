<?php

class Article
{
    // I - Les attributs
    public $id;
    public $title;
    public $content;
    public $created_at;
    public $updated_at;


    // II - Les méthodes

    // 1 - Trouver tous les articles
    public static function all()
    {
        $db = new DB;
        $allArticles = $db->pdo->query('SELECT * from articles');
        return $allArticles->fetchAll(PDO::FETCH_CLASS);
    }


    // 2 - Récupérer les donnée d'un article et affecter les attributs d'un objet article (new Article)
    public function find(int $id)
    {
        $db = new DB;
        $articleQuery = $db->pdo->query("SELECT * from articles WHERE id=" . $id);
        $articleObject = $articleQuery->fetch(PDO::FETCH_OBJ);
        $this->id = $articleObject->id;
        $this->title = $articleObject->title;
        $this->content = $articleObject->content;
        $this->created_at = $articleObject->created_at;
        $this->updated_at = $articleObject->updated_at;
    }


    // 3 - Enregistrer un article en bdd
    public function save()
    {
        $db = new DB;

        $today = new DateTime('NOW');
        $creationDate = $today->format('Y-m-d H:i:s');

        $newArticleQuery = $db->pdo->prepare("INSERT INTO articles (title, content, created_at, updated_at)
        VALUES(:title, :content, :createdAt, :updateAt)");

        $newArticleQuery->bindParam(':title', $this->title);
        $newArticleQuery->bindParam(':content', $this->content);
        $newArticleQuery->bindParam(':createdAt', $creationDate);
        $newArticleQuery->bindParam(':updateAt', $this->updated_at);
        $newArticleQuery->execute();
    }

    // 4 - Mettre à jour un article
    public function update()
    {
        $db = new DB;

        $today = new DateTime('NOW');
        $modificationDate = $today->format('Y-m-d H:i:s');

        $newArticleQuery = $db->pdo->prepare(
            "UPDATE articles
            SET 
            title = :newTitle,
            content = :newContent,
            updated_at = :updateTime
            WHERE articles.id =:id"

        );

        $newArticleQuery->bindParam(':newTitle', $this->title);
        $newArticleQuery->bindParam(':newContent', $this->content);
        $newArticleQuery->bindParam(':updateTime', $modificationDate);
        $newArticleQuery->bindParam(':id', $this->id);
        $newArticleQuery->execute();
    }

    // 5 - Supprimer un article:

    public function delete()
    {
        $db = new DB;

        $articleQuery = $db->pdo->prepare(
            "DELETE FROM articles
            WHERE id = :id"
        );

        $articleQuery->bindParam(':id', $this->id);
        $articleQuery->execute();
    }
}
