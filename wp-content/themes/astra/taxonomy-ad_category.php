<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$page = get_queried_object();

get_header(); ?>

<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

	<div id="primary" <?php astra_primary_class(); ?>>

		<h1><?= single_term_title() ?></h1>

		<?php

			$query = new WP_Query([
				'post_type' => 'ad',
				'tax_query' => [
					[
						'taxonomy' => 'ad_category',
						'field'    => 'slug',
						'terms'    => $page->slug,
					]
				]
			]);

		?>

		<?php if ($query->have_posts()) : ?>
			<?php while ($query->have_posts()) : $query->the_post() ?>

				<a href="<?php the_permalink() ?>">
					<div>
						<h2><?php the_title() ?></h2>

						<?= wp_get_attachment_image(get_field('slika')) ?>

						<?php the_excerpt() ?>
					</div>
				</a>

			<?php endwhile; wp_reset_postdata(); ?>
		<?php endif; ?>

		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
