<h2>Show article</h2>

<h3><?php echo htmlspecialchars($params["article"]->getTitle()); ?></h3>
<div>
    <div>
        <p>
            Créé par <?php echo htmlspecialchars($params["user"]->getLastname() . " " . $params["user"]->getFirstname()) ?>
            le <?php echo htmlspecialchars($params["article"]->getDate_published()->format("d/m/Y")); ?>
        </p>
    </div>
    <div>
        <p>
            <?php foreach ($params["categories"] as $key => $category) { ?>
                <span> #<?php echo htmlspecialchars($category->getName()); ?></span>
            <?php } ?>
        </p>
    </div>
    <div>
        <p><?php echo htmlspecialchars($params["article"]->getContent()); ?></p>
    </div>
    <div>
        <img src="<?php echo htmlspecialchars($params["article"]->getFile_path_image()); ?>">
    </div>
    <div>
        <p><?php echo htmlspecialchars($params["article"]->getPrice()); ?></p>
    </div>
    <div>
        <p><?php echo htmlspecialchars($params["article"]->getDuration()); ?></p>
    </div>
    <div>
        <p><?php echo htmlspecialchars($params["article"]->getActivity()); ?></p>
    </div>
</div>