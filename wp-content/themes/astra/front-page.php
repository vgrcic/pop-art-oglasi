<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

	<div id="primary" <?php astra_primary_class(); ?>>

		<?php astra_primary_content_top(); ?>

		<?php

			$newest = new WP_Query([
				'post_type' => 'ad',
				'posts_per_page' => 15
			]);

		?>

		<?php astra_content_page_loop(); ?>

		<?php if ($newest->have_posts()) { ?>

			<?php while ($newest->have_posts()) : $newest->the_post() ?>

				<a href="<?php the_permalink() ?>">
					<div>
						<h2><?php the_title() ?></h2>
						<img width="200px" src="<?php the_field('slika') ?>">
						<?php the_excerpt() ?>
					</div>
				</a>

			<?php endwhile; ?>

		<?php } ?>

		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
