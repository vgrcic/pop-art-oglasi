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
	wp_insert_user([
		'user_pass' => $_POST['password'],
		'user_login' => $_POST['username'],
		'user_nicename' => $_POST['username'],
		'user_url' => $_POST['username'],
		'user_email' => $_POST['email'],
		'display_name' => $_POST['first_name'] . ' ' . $_POST['last_name'],
		'first_name' => $_POST['first_name'],
		'last_name' => $_POST['last_name'],
		'show_admin_bar_front' => false,
		'role' => 'author'
	]);
}

get_header(); ?>

<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

	<div id="primary" <?php astra_primary_class(); ?>>

		<?php astra_primary_content_top(); ?>

		<?php astra_content_page_loop(); ?>

		<form method="POST">
			<div>
				<label>Ime *</label>
				<input type="text" name="first_name" required>
			</div>
			<div>
				<label>Prezime *</label>
				<input type="text" name="last_name" required>
			</div>
			<div>
				<label>Korisničko ime *</label>
				<input type="text" name="username" required>
			</div>
			<div>
				<label>Email *</label>
				<input type="email" name="email" required>
			</div>
			<div>
				<label>Lozinka *</label>
				<input type="password" name="password" required>
			</div>
			<div>
				<label>Ponovite lozinku *</label>
				<input type="password" name="password_confirmation" required>
			</div>
			<div>
				<button>Registracija</button>
			</div>
		</form>

		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
