<h2>Nos destinations</h2>

<?php if (Service::checkIfUserIsConnected()) { ?>
	<a href="/?page=article_add">Créer une destination</a>
<?php } ?>


<?php foreach ($params["articles"] as $key => $article) { ?>

	<div class="contain-article">

		<div class="contain-article-left">

			<!-- <?php echo htmlspecialchars($article->getId()) ?> -->
			<!-- <?php echo htmlspecialchars($article->getDate_published()->format("d/m/Y")) ?> -->
			<h3>
				<?php echo htmlspecialchars($article->getTitle()) ?>
			</h3>
			<p class="article-content"> 
				<?= htmlspecialchars($article->getContent()) ?> 
			</p>
			<p class="article-duration"> 
				<?php echo htmlspecialchars($article->getDuration()) ?> 
			</p>
			<p class="article-price"> 
				<?php echo htmlspecialchars($article->getPrice()) ?>€
			</p>

			<div class="article-activity">
				<div class="title-activity">
					<p>Loisirs</p>
					<img src="img/destinations/man-standing-with-arms-up-svgrepo-com.svg" class="man-standing">
					<p>Activités</p>
				</div>
				<p> 
					<?php echo htmlspecialchars($article->getActivity()) ?>
				</p>
			</div>

			<div class="article-btn">
				<!-- <a href="/?page=article_show&article_id=<?php echo htmlspecialchars($article->getId()) ?>">Voir</a> -->
				<?php if (Service::checkIfUserIsConnected()) {?>
					<a href="/?page=article_update&article_id=<?= $article->getId(); ?>">Modifier</a>
					<button type="button" class="js_article_button_deleted" data-article_id="<?= $article->getId(); ?>">
						Supprimer
					</button>
				<?php } ?>			
			</div>

		</div>

		<div class="contain-article-right">
			<img src="<?php echo htmlspecialchars($article->getFile_path_image()); ?>">
		</div>
	
	</div>

<?php } ?>


<?php 
	if (Service::checkIfUserIsConnected()) {
		include_once dirname(__DIR__) . "/article/template_part/__delete_modal.php";
	}
?>