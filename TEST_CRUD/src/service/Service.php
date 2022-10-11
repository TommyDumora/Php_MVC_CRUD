<?php

require_once dirname(__DIR__) . "/Repository/UserRepository.php";
require_once dirname(__DIR__) . "/Repository/CategoryRepository.php";

class Service {

    public static function checkIfUserIsConnected(): bool {

        $userIsConnected = false;

        $userRepository = new UserRepository();

        if (
            isset($_SESSION["user_is_connected"], $_SESSION["user_id"])
            && $_SESSION["user_is_connected"]
            && $userRepository->find(intval($_SESSION["user_id"]))
        ) {
            $userIsConnected = true;
        }

        return $userIsConnected;
    }

    public static function moveFile(array $file): ?string {

        $file_path_image = null;
        $folder = dirname(__DIR__, 2) . "/public/img/upload/";

        if (!file_exists($folder)) {
            mkdir($folder, 0777);
        }
        $filename = self::renameFile($file["name"]);
        if (move_uploaded_file($file["tmp_name"], $folder . $filename)) {
            $file_path_image = "/img/upload/" . $filename;
        }

        return $file_path_image;

    }

    public static function checkCategoriesExist(array $categoriesSearched): ?array {

        $categories = null;

        $categoryRepository = new CategortRepository();
        foreach ($categoriesSearched as $key => $categorySearched) {
            if ($category = $categoryRepository->find(intval($categorySearched))) {
                $categories [] = $category;
            }
        }

        return $categories;

    }

    private static function renameFile(string $filename): string {
        $array = explode(".", $filename);
        return (new DateTime("now"))->format("YmdHis") . "." . end($array);
    }

}