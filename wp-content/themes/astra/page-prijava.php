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

check_guest();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$result = wp_signon([
		'user_login' => $_POST['username'],
		'user_password' => $_POST['password'],
	]);

	if ($result instanceof WP_Error) {
		wp_redirect(site_url('prijava?error=1'));
	} else wp_redirect(site_url('moji-oglasi'));
}

get_header(); ?>

<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

	<div id="primary" <?php astra_primary_class(); ?>>

		<?php astra_primary_content_top(); ?>

		<?php astra_content_page_loop(); ?>

		<?php if (!empty($_REQUEST['error'])) { error('Niste uneli ispravne podatke. Pokušajte ponovo.'); } ?>

		<form method="POST">

			<table>
				<tr>
					<th>Korisničko ime</th>
					<td><input type="text" name="username" required></td>
				</tr>
				<tr>
					<th>Lozinka</th>
					<td><input type="password" name="password" required></td>
				</tr>
			</table>
			<div>
				<button>Prijava</button>
			</div>
		</form>

		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
