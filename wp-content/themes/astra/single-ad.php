<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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

		<article class="post-63 ad type-ad status-publish hentry ast-article-single" id="post-63" itemtype="https://schema.org/CreativeWork" itemscope="itemscope">
			<div class="ast-post-format- ast-no-thumb single-layout-1">
				<header class="entry-header ast-no-thumbnail ast-no-meta">
					<div class="ast-single-post-order">
						<h1 class="entry-title" itemprop="headline"><?php the_title() ?></h1>
					</div>

					Autor oglasa:
					<a href="<?= get_author_posts_url($post->post_author) ?>">
						<?php the_author_meta('first_name', $post->post_author) ?>
						<?php the_author_meta('last_name', $post->post_author) ?>
					</a>
					<br>

					Vreme postavljanja oglasa:
					<?php echo get_the_date('d.m.Y. - H:i') ?>
					<br>

					<?php if (!empty($stanje = get_field('stanje'))) { ?>
						Stanje robe:
						<b><?= ($stanje === 'used') ? 'Polovno' : 'Novo' ?></b>
						<br>
					<?php } ?>

					Cena:
					<b><?= price(get_field('cena')) ?></b>
					<br>

					<?php if (!empty($telefon = get_field('telefon'))) { ?>
						Broj telefona: <b><?= $telefon ?></b>
						<br>
					<?php } ?>

					<?php if (!empty($lokacija = get_field('lokacija'))) { ?>
						Lokacija: <b><?= $lokacija ?></b>
						<br>
					<?php } ?>

					<?php if ( !empty($category = get_first_term($post, 'ad_category')) ) { ?>
						Kategorija: <a href="<?= get_term_link($category) ?>"><b><?= $category->name ?></b></a>
						<br>
					<?php } ?>

					<br>

					<img src="<?php the_field('slika') ?>">

				</header>
				<div class="entry-content clear" itemprop="text">
					<?php the_content() ?>
				</div><!-- .entry-content .clear -->
			</div>
		</article><!-- #post-## -->

		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
