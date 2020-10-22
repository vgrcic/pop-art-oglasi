<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

check_auth();

require_once(ABSPATH . "wp-admin" . '/includes/image.php');
require_once(ABSPATH . "wp-admin" . '/includes/file.php');
require_once(ABSPATH . "wp-admin" . '/includes/media.php');

if (valid_create_ad_request()) {
	$post_id = create_ad([
		'title'       => $_POST['title'],
		'description' => $_POST['description'],
		'category'    => $_POST['category'],
	]);

	add_image_to_ad('slika', $post_id);

	add_metas_to_ad($post_id, [
		'cena' => $_POST['price'],
		'stanje' => $_POST['condition'],
		'telefon' => $_POST['telefon'] ?? null,
		'lokacija' => $_POST['lokacija'] ?? null,
	]);
}

$categories = get_terms([
	'taxonomy' => 'ad_category',
	'hide_empty' => false,
]);

get_header(); ?>

<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

	<div id="primary" <?php astra_primary_class(); ?>>

		<?php astra_primary_content_top(); ?>

		<section class="ast-author-box ast-archive-description">
			<div class="ast-author-bio">
				<h1 class='page-title ast-archive-title'>
					<?php the_title() ?>
				</h1>
			</div>
		</section>
		<main id="main" class="site-main">
			<div class="ast-row">

				<form method="POST" enctype="multipart/form-data">

					<div>
						<label for="title">Naslov: </label>
						<input type="text" name="title" id="title" value="<?= old('title') ?>" required>
					</div>

					<div>
						<label for="description">Opis: </label>
						<textarea name="description" id="description" required><?= old('description') ?></textarea>
					</div>

					<div>
						<label for="price">Cena: </label>
						<input type="number" name="price" id="price" value="<?= old('price') ?>" required>
					</div>

					<div>
						<?php $old_condition = old('condition') ?>
						<label for="condition">Stanje robe: </label>
						<select name="condition" id="condition">
							<option value="new" <?php if ($old_condition === 'new') { ?> selected <?php } ?> >Novo</option>
							<option value="used" <?php if ($old_condition === 'used') { ?> selected <?php } ?> >Polovno</option>
						</select>
					</div>

					<div>
						<?php $old_category = old('category') ?>
						<label for="category">Kategorija: </label>
						<select name="category" id="category">
							<?php foreach ($categories as $item) { ?>
								<option value="<?= $item->term_id ?>" <?php if ($old_category == $item->term_id) { ?> selected <?php } ?> >
									<?= $item->name ?>
								</option>
							<?php } ?>
						</select>
					</div>

					<div>
						<label for="slika">Slika: </label>
						<input type="file" name="slika" id="slika" accept="image/*" required>
					</div>

					<div>
						<label for="telefon">Kontakt telefon: </label>
						<input type="text" name="telefon" id="telefon" value="<?= old('telefon') ?>">
					</div>

					<div>
						<label for="lokacija">Lokacija: </label>
						<input type="text" name="lokacija" id="lokacija" value="<?= old('lokacija') ?>">
					</div>

					<button>Kreiraj</button>

				</form>

			</div>
		</main>

		<?php // astra_pagination(); ?>

		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>

<script>
	//
</script>
