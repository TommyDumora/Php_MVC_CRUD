<?php

require_once dirname(__DIR__, 2) . "/lib/Repository/AbstractRepository.php";
require_once dirname(__DIR__) . "/Model/Article.php";

class ArticleRepository extends AbstractRepository {

    public function findAll() {

        $query = "SELECT * FROM article;";
        return $this->executeQuery($query, "Article");

    }

    public function find(int $id) {

        $query = "SELECT * FROM article WHERE id = :id";
        $params = [":id" => $id];
        return $this->executeQuery($query, "Article", $params);

    }

    public function add(Article $article) {
        $query ="INSERT INTO article(title, content, date_published, user_id, file_path_image, price, duration, activity) VALUES(:title, :content, :date_published, :user_id, :file_path_image, :price, :duration, :activity);";
        $params = [
            ":title" => $article->getTitle(),
            ":content" => $article->getContent(),
            ":date_published" => $article->getDate_published()->format("Y-m-d H:i:s"),
            ":user_id" => $article->getUser_id(),
            ":file_path_image" => $article->getFile_path_image(),
            ":price" => $article->getPrice(),
            ":duration" => $article->getDuration(),
            ":activity" => $article->getActivity()
        ];
        return $this->executeQuery($query, "Article", $params);
    }

    public function findLast() {
        $query = "SELECT * FROM article ORDER BY id DESC LIMIT 1;";
        return $this->executeQuery($query, "Article");
    }

    public function insert_article_category(Article $article, Category $category) {

        $query = "INSERT INTO article_category(article_id, category_id) VALUES(:article_id, :category_id);";
        $params = [
            ":article_id" => $article->getId(),
            ":category_id" => $category->getId()
        ];

        return $this->executeQuery($query, "", $params);
    
    }

    public function deletedArticleCategory(Article $article) {
        $query = "DELETE FROM article_category WHERE article_id = :article_id";
        $params = [
            ":article_id" => $article->getId()
        ];
        return $this->executeQuery($query, "", $params);
    }

    public function deleted(Article $article) {
        $query = "DELETE FROM article WHERE id = :id;";
        $params = [
            ":id" => $article->getId()
        ];
        return $this->executeQuery($query, "Article", $params);
    }

    public function update(Article $article) {

        $query ="UPDATE article SET title = :title, content = :content, file_path_image = :file_path_image, price = :price, duration = :duration, activity = :activity WHERE id = :id;";
        $params = [
            ":id" => $article->getId(),
            ":title" => $article->getTitle(),
            ":content" => $article->getContent(),
            ":file_path_image" => $article->getFile_path_image(),
            ":price" => $article->getPrice(),
            ":duration" => $article->getDuration(),
            ":activity" => $article->getActivity()
        ];

        return $this->executeQuery($query, "Article", $params);
    }

}