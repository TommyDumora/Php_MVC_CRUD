<?php

require_once dirname(__DIR__, 2) . "/lib/Controller/AbstractController.php";
require_once dirname(__DIR__) . "/Repository/ArticleRepository.php";
require_once dirname(__DIR__) . "/Repository/CategoryRepository.php";
require_once dirname(__DIR__) . "/Repository/ArticleCategoryRepository.php";
require_once dirname(__DIR__) . "/service/Service.php";

class ArticleController extends AbstractController {

    private ArticleRepository $articleRepository;
    private CategortRepository $categoryRepository;
    private ArticleCategoryRepository $articleCategoryRepository;

    public function __construct() {
        $this->articleRepository = new ArticleRepository();
        $this->categoryRepository = new CategortRepository();
        $this->articleCategoryRepository = new ArticleCategoryRepository();
    }

    public function index():string {

        $articleRepository = new ArticleRepository();
        return $this->renderView("/template/article/article_base.php", [ "articles" => $articleRepository->findAll()]);
        
    }

    public function show() {

        if (isset($_GET["article_id"])) {

            $articleRepository = new ArticleRepository();
            $userRepository = new UserRepository();
            $categoryRepository = new CategortRepository();
            $article = $articleRepository->find(intval($_GET["article_id"]));
    
            return $this->renderView("/template/article/article_show.php" , [
                "article" => $article,
                "user" => $userRepository->find($article->getUser_id()),
                "categories" => $categoryRepository->findByArticle($article)
            ]);

        }

    }

    public function add()
    {
        // Checked if user is connected
        if (
            Service::checkIfUserIsConnected()
        ) {
            $error = null;
            $message =  "";
            $categoryRepository = new CategortRepository();
            $articleRepository = new ArticleRepository();
            if (
                !empty($_POST)
                && isset($_POST["title"], $_POST["content"], $_POST["categories"], $_POST["price"], $_POST["duration"], $_POST["activity"])
                && $_FILES["image"]
            ) {
                if (
                    strlen($title = trim($_POST["title"]))
                    && strlen($content = trim($_POST["content"]))
                    && count($categories = $_POST["categories"])
                    && strlen($price = trim($_POST["price"]))
                    && strlen($duration = trim($_POST["duration"]))
                    && strlen($activity = trim($_POST["activity"]))
                    && $filePath = Service::moveFile($_FILES["image"])
                ) {
                    $article =  new Article();
                    $article->setTitle($title);
                    $article->setContent($content);
                    $article->setDate_published((new DateTime("now"))->format("Y-m-d H:i:s"));
                    $article->setUser_id($_SESSION["user_id"]);
                    $article->setFile_path_image($filePath);
                    $article->setPrice($price);
                    $article->setDuration($duration);
                    $article->setActivity($activity);
                    $articleRepository->add($article);
                    $article = $articleRepository->findLast();
                    $categories = Service::checkCategoriesExist($_POST["categories"]);

                    foreach ($categories as $key => $category) {
                        $articleRepository->insert_article_category($article, $category);
                    }
                    header("Location: /?page=article");
                }
            }
            return $this->renderView("/template/article/article_add.php", [
                "error" => $error,
                "message" => $message,
                "categories" => $categoryRepository->findAll()
            ]);
        }
        header("Location: /?page=home");
    }

    public function deleted() {
        if (
            Service::checkIfUserIsConnected()
            && isset($_GET["article_id"])
            && $article = $this->articleRepository->find($_GET["article_id"])
            ) {
                $this->articleRepository->deletedArticleCategory($article);
                unlink(dirname(__DIR__, 2) . "/public/" . $article->getFile_path_image());
                $this->articleRepository->deleted($article);
                header("Location: /?page=article");
        }
    }

    public function update()
    {
        // Vérification de l'existence de l'article passé en paramètre d'url et déclaration, assignation de article 
        if (
            isset($_GET["article_id"])
            && $article = $this->articleRepository->find($_GET["article_id"])
        ) {
            // Vérification validé des data pour l'article
            if (
                !empty($_POST)
                && isset($_POST["title"], $_POST["content"], $_POST["categories"], $_POST["price"], $_POST["duration"], $_POST["activity"])
                && strlen($title = trim($_POST["title"]))
                && strlen($content = trim($_POST["content"]))
                && count($categories = $_POST["categories"])
                && strlen($price = trim($_POST["price"]))
                && strlen($duration = trim($_POST["duration"]))
                && strlen($activity = trim($_POST["activity"]))
            ) {
                $article->setTitle($title);
                $article->setContent($content);
                $article->setPrice($price);
                $article->setDuration($duration);
                $article->setActivity($activity);
                if ($_FILES["image"]["size"]) {
                    $file_path_image = Service::moveFile($_FILES["image"]);
                    if ($file_path_image) {
                        $file_deleted = dirname(__DIR__, 2) . "/public/" . $article->getFile_path_image();
                        if (file_exists($file_deleted)) unlink($file_deleted);
                        $article->setFile_path_image($file_path_image);
                    }
                }
                $this->articleRepository->update($article);
                // suppression des article_category 
                $this->articleCategoryRepository->deleteByArticle($article);
                // création des nouveaux article_category 
                $categories = Service::checkCategoriesExist($_POST["categories"]);
                foreach ($categories as $key => $category) {
                    $this->articleRepository->insert_article_category($article, $category);
                }
            }
            return $this->renderView(
                "/template/article/article_update.php",
                [
                    "article" => $article,
                    "categories" => $this->categoryRepository->findAll(),
                    "article_category" => $this->categoryRepository->findByArticle($article)
                ]
            );
        }
        header("Location: /?page=home");
    }

}