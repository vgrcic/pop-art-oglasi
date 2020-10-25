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

if (!empty($_GET['delete']) && delete_author_post($_GET['delete'])) {
	wp_redirect(site_url('/moji-oglasi?delete_success=1'));
}

get_header(); ?>

<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

	<div id="primary" <?php astra_primary_class(); ?>>

		<?php astra_primary_content_top(); ?>

		<section class="ast-author-box ast-archive-description">
			<div class="ast-author-bio">
				<h1 class='page-title ast-archive-title'>
					<?php the_title() ?> <a href="<?= site_url('/kreiraj-oglas') ?>" class="ast-button">Kreiraj oglas</a>
				</h1>
			</div>
		</section>
		<main id="main" class="site-main">
			<div class="ast-row">

				<?php $query = new WP_Query([
					'author' => $author,
					'post_type' => 'ad',
				]); ?>

				<table>
					<thead>
						<tr>
							<th>Oglas</th>
							<th colspan="3">Akcije</th>
						</tr>
					</thead>
					<tbody>
						<?php while ($query->have_posts()) : $query->the_post() ?>
							<tr>
								<td><?php the_title() ?></td>
								<td><a href="<?php the_permalink() ?>" target="_blank">pregled</a></td>
								<td><a href="<?= site_url('/izmena-oglasi?edit='.get_the_ID()) ?>">izmena</a></td>
								<td><button onclick="delete_ad(<?= get_the_ID() ?>)">brisanje</button></td>
							</tr>
						<?php endwhile; ?>
					</tbody>
				</table>
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
	function delete_ad(id) {
		if (confirm('Da li ste sigurni da želite da obrišete ovaj oglas?')) {
			window.location.href = "<?= site_url('/moji-oglasi?delete=') ?>" + id;
		}
	}
</script>
