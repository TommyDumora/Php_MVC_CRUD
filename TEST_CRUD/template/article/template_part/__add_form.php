<?php
$title = null;
$content = null;
$article_category = [];
$file_path_image = null;
$price = null;
$duration = null;
$activity = null;

if (isset($params["article"], $params["article_category"])) {
    $title = $params["article"]->getTitle();
    $content = $params["article"]->getContent();
    $file_path_image = $params["article"]->getFile_path_image();
    $price = $params["article"]->getPrice();
    $duration = $params["article"]->getDuration();
    $activity = $params["article"]->getActivity();
    foreach ($params["article_category"] as $key => $category_article) $article_category[] = $category_article->getId();
}

?>

<form method="post" enctype="multipart/form-data">

    <label for="title">Titre</label>
    <input type="text" name="title" id="title" value="<?php if(!empty($title)) echo htmlspecialchars($title); ?>">

    <label for="category">Catégorie</label>
    <select id="categories" multiple name="categories[]">
        <?php foreach ($params["categories"] as $key => $category) { ?>
            <option value="<?php echo htmlspecialchars($category->getId()); ?>" <?php if (in_array($category->getId(), $article_category)) echo "selected"; ?>>
                <?php echo htmlspecialchars($category->getName()); ?>
            </option>
        <?php } ?>
    </select>

    <?php if (!empty($file_path_image)) { ?>
        <img src="<?= $file_path_image; ?>">
    <?php } ?>
    <label for="image">Image</label>
    <input type="file" name="image" id="image">

    <label for="content">Contenu</label>
    <textarea name="content" id="content">
        <?php if (!empty($content)) echo htmlspecialchars($content) ?>
    </textarea>

    <label for="price">Prix</label>
    <input type="text" name="price" id="price" value="<?php if(!empty($price)) echo htmlspecialchars($price); ?>">

    <label for="duration">Durée</label>
    <input type="text" name="duration" id="duration" value="<?php if(!empty($duration)) echo htmlspecialchars($duration); ?>">

    <label for="activity">Activités</label>
    <input type="text" name="activity" id="activity" value="<?php if(!empty($activity)) echo htmlspecialchars($activity); ?>">

    <input type="submit" value="Créér">

</form>