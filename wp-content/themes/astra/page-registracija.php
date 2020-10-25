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

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (valid_registration_request()) {
		$result = wp_insert_user([
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

		if ($result instanceof WP_Error) {
			if (isset($result->errors['existing_user_login'])) {
				$error = 'Nalog sa ovim korisničkim imenom već postoji.';
			} elseif (isset($result->errors['existing_user_email'])) {
				$error = 'Nalog sa ovom email adresom već postoji.';
			} else $error = 'Došlo je do greške. Proverite da li ste pravilno popunili sva polja i pokušajte ponovo.';
		} else {
			wp_signon([
				'user_login' => $_POST['username'],
				'user_password' => $_POST['password'],
			]);
			wp_redirect(site_url('moji-oglasi?register=1'));
		}
	}
}

get_header(); ?>

<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

	<div id="primary" <?php astra_primary_class(); ?>>

		<?php astra_primary_content_top(); ?>

		<?php astra_content_page_loop(); ?>

		<?php if (!empty($error)) { error($error); } ?>

		<form method="POST" onsubmit="return validate_form(this)">
			<table>
				<tr>
					<th>Ime *</th>
					<td><input type="text" name="first_name" value="<?= old('first_name') ?>" required></td>
				</tr>
				<tr>
					<th>Prezime *</th>
					<td><input type="text" name="last_name" value="<?= old('last_name') ?>" required></td>
				</tr>
				<tr>
					<th>Korisničko ime *</th>
					<td><input type="text" name="username" value="<?= old('username') ?>" required></td>
				</tr>
				<tr>
					<th>Email *</th>
					<td><input type="email" name="email" value="<?= old('email') ?>" required></td>
				</tr>
				<tr>
					<th>Lozinka *</th>
					<td><input type="password" name="password" minlength="6" placeholder="Min: 6 karaktera" required></td>
				</tr>
				<tr>
					<th>Ponovite lozinku *</th>
					<td><input type="password" name="password_confirmation" required></td>
				</tr>
			</table>
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

<script>
	function validate_form(form) {
		if (form.password.value !== form.password_confirmation.value) {
			alert('Lozinke se ne poklapaju.'); return false;
		}

		if (form.first_name.value.trim() === '' ||
			form.last_name.value.trim() === '' ||
			form.username.value.trim() === '') {
			alert('Niste popunili obavezna polja.'); return false;
		}

		return true;
	}
</script>
