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

get_header(); ?>

<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

	<div id="primary" <?php astra_primary_class(); ?>>

		<?php astra_primary_content_top(); ?>

		<section class="ast-author-box ast-archive-description">
			<div class="ast-author-bio">
				<h1 class='page-title ast-archive-title'>
					<?= get_the_author_meta('first_name', $author) ?>
					<?= get_the_author_meta('last_name', $author) ?>
				</h1>
				<p><?= get_the_author_meta('email', $author) ?></p>
			</div>
		</section>
		<main id="main" class="site-main">
			<div class="ast-row">

				<?php $query = new WP_Query([
					'author' => $author,
					'post_type' => 'ad',
				]); ?>


				<?php while ($query->have_posts()) : $query->the_post() ?>
					<article  class="post-1 post type-post status-publish format-standard hentry category-uncategorized ast-col-sm-12 ast-article-post" id="post-1" itemtype="https://schema.org/CreativeWork" itemscope="itemscope">
						<div class="ast-post-format- ast-no-thumb blog-layout-1">
							<div class="post-content ast-col-md-12">
								<div class="ast-blog-featured-section post-thumb ast-col-md-12"></div>
								<header class="entry-header">
									<h2 class="entry-title" itemprop="headline">
										<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title() ?></a>
									</h2>
									<?php if ( !empty($category = get_first_term($post, 'ad_category')) ) { ?>
										<div class="entry-meta">
											<span class="cat-links">
												<a href="<?= get_term_link($category) ?>" rel="category tag"><?= $category->name ?></a>
											</span>
										</div>
									<?php } ?>
								</header>
								<div class="entry-content clear" itemprop="text">
									<?php the_excerpt() ?>
								</div>
							</div>
						</div>
					</article>
				<?php endwhile ?>
			</div>
		</main>

		<?php // astra_pagination(); ?>

		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
