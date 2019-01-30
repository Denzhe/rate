<?php
/**
 * Sample layout.
 */
use Core\Language;

?>
<?php require_once 'Controllers/facebookli/Facebook/autoload.php'; ?>

<div class="page-header">
	<h1><?php echo $data['title'] ?></h1>
</div>

<p><?php echo $data['welcome_message'] ?></p>

<a class="btn btn-md btn-success" href="<?php echo DIR; ?>subpage">
	<?php echo Language::show('open_subpage', 'Welcome'); ?>
</a>
<a class="btn btn-md btn-success" href="<?php echo DIR; ?>add_movie.php">
	<?php echo Language::show('open_addmovie', 'Welcome'); ?>
</a>
