<?php
/**
 * Astra functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Define Constants
 */
define( 'ASTRA_THEME_VERSION', '2.5.5' );
define( 'ASTRA_THEME_SETTINGS', 'astra-settings' );
define( 'ASTRA_THEME_DIR', trailingslashit( get_template_directory() ) );
define( 'ASTRA_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );


/**
 * Minimum Version requirement of the Astra Pro addon.
 * This constant will be used to display the notice asking user to update the Astra addon to latest version.
 */
define( 'ASTRA_EXT_MIN_VER', '2.6.0' );

/**
 * Setup helper functions of Astra.
 */
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-theme-options.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-theme-strings.php';
require_once ASTRA_THEME_DIR . 'inc/core/common-functions.php';

/**
 * Update theme
 */
require_once ASTRA_THEME_DIR . 'inc/theme-update/class-astra-theme-update.php';
require_once ASTRA_THEME_DIR . 'inc/theme-update/astra-update-functions.php';
require_once ASTRA_THEME_DIR . 'inc/theme-update/class-astra-theme-background-updater.php';
require_once ASTRA_THEME_DIR . 'inc/theme-update/class-astra-pb-compatibility.php';


/**
 * Fonts Files
 */
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-font-families.php';
if ( is_admin() ) {
	require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-fonts-data.php';
}

require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-fonts.php';

require_once ASTRA_THEME_DIR . 'inc/core/class-astra-walker-page.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-enqueue-scripts.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-gutenberg-editor-css.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-dynamic-css.php';

/**
 * Custom template tags for this theme.
 */
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-attr.php';
require_once ASTRA_THEME_DIR . 'inc/template-tags.php';

require_once ASTRA_THEME_DIR . 'inc/widgets.php';
require_once ASTRA_THEME_DIR . 'inc/core/theme-hooks.php';
require_once ASTRA_THEME_DIR . 'inc/admin-functions.php';
require_once ASTRA_THEME_DIR . 'inc/core/sidebar-manager.php';

/**
 * Markup Functions
 */
require_once ASTRA_THEME_DIR . 'inc/markup-extras.php';
require_once ASTRA_THEME_DIR . 'inc/extras.php';
require_once ASTRA_THEME_DIR . 'inc/blog/blog-config.php';
require_once ASTRA_THEME_DIR . 'inc/blog/blog.php';
require_once ASTRA_THEME_DIR . 'inc/blog/single-blog.php';
/**
 * Markup Files
 */
require_once ASTRA_THEME_DIR . 'inc/template-parts.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-loop.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-mobile-header.php';

/**
 * Functions and definitions.
 */
require_once ASTRA_THEME_DIR . 'inc/class-astra-after-setup-theme.php';

// Required files.
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-admin-helper.php';

require_once ASTRA_THEME_DIR . 'inc/schema/class-astra-schema.php';

if ( is_admin() ) {

	/**
	 * Admin Menu Settings
	 */
	require_once ASTRA_THEME_DIR . 'inc/core/class-astra-admin-settings.php';
	require_once ASTRA_THEME_DIR . 'inc/lib/notices/class-astra-notices.php';

	/**
	 * Metabox additions.
	 */
	require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-meta-boxes.php';
}

require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-meta-box-operations.php';


/**
 * Customizer additions.
 */
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-customizer.php';


/**
 * Compatibility
 */
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-jetpack.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/woocommerce/class-astra-woocommerce.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/edd/class-astra-edd.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/lifterlms/class-astra-lifterlms.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/learndash/class-astra-learndash.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-beaver-builder.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-bb-ultimate-addon.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-contact-form-7.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-visual-composer.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-site-origin.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-gravity-forms.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-bne-flyout.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-ubermeu.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-divi-builder.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-amp.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-yoast-seo.php';
require_once ASTRA_THEME_DIR . 'inc/addons/transparent-header/class-astra-ext-transparent-header.php';
require_once ASTRA_THEME_DIR . 'inc/addons/breadcrumbs/class-astra-breadcrumbs.php';
require_once ASTRA_THEME_DIR . 'inc/addons/heading-colors/class-astra-heading-colors.php';

// Elementor Compatibility requires PHP 5.4 for namespaces.
if ( version_compare( PHP_VERSION, '5.4', '>=' ) ) {
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-elementor.php';
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-elementor-pro.php';
}

// Beaver Themer compatibility requires PHP 5.3 for anonymus functions.
if ( version_compare( PHP_VERSION, '5.3', '>=' ) ) {
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-beaver-themer.php';
}

/**
 * Load deprecated functions
 */
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-filters.php';
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-hooks.php';
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-functions.php';

function blockusers_init() {
	if (is_admin() && !current_user_can('administrator') && !(defined('DOING_AJAX') && DOING_AJAX)) {
		wp_redirect(home_url()); exit;
	}
}

function register_ad_post_type () {
	register_post_type('ad', [
		'labels' => [
			'name' => 'Oglasi',
			'singular_name' => 'Oglas',
		],
		'public' => true,
	]);
}

function register_ad_category_taxonomy () {
	register_taxonomy('ad_category', 'ad', [
		'labels' => [
			'name' => 'Kategorije',
			'singular_name' => 'Kategorija',
		],
		'hierarchical' => true,
		'show_in_nav_menus' => true,
		'show_in_menu' => true,
		'public' => true,
	]);
}

function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
		show_admin_bar(false);
	}
}

function price($number, $currency = 'RSD') {
	return number_format($number, 2, ',', '.') . ' ' . $currency;
}

function delete_author_post($post_id) {
	$post = get_post($post_id);

	if (!empty($post) && user_owns_post($post)) {
		wp_delete_post($post_id);
		return true;
	} return false;
}

function user_owns_post($post) {
	return $post->post_author == get_current_user_id();
}

function get_first_term($post, $taxonomy) {
	$terms = get_the_terms($post, $taxonomy);

	if ( !empty($terms) ) {
		return $terms[0];
	} return null;
}

function check_auth() {
	if ( ! is_user_logged_in()) {
		wp_redirect(site_url('/prijava'));
	}
}

function check_guest() {
	if (is_user_logged_in()) {
		wp_redirect(site_url('/'));
	}
}

function old($field) {
	if ( ! empty($_POST[$field]) ) {
		return $_POST[$field];
	} return null;
}

function valid_create_ad_request() {
	return $_SERVER['REQUEST_METHOD'] === 'POST'
		&& !empty(trim($_POST['title']))
		&& !empty(trim($_POST['description']))
		&& !empty($_POST['category'])
		&& !empty($_POST['price']) && is_numeric($_POST['price']) && $_POST['price'] > 0
		&& !empty($_POST['condition']) && in_array($_POST['condition'], ['new', 'used'])
		&& (empty($_FILES['slika']) || is_valid_image($_FILES['slika']));
}

function is_valid_image($file) {
	$mime = mime_content_type($file['tmp_name']);
	return strpos($mime, 'image/') !== false;
}

function create_ad($data) {
	return wp_insert_post([
		'post_type'    => 'ad',
		'post_status'  => 'publish',
		'post_title'   => $data['title'],
		'post_content' => $data['description'],
		'tax_input'    => ['ad_category' => [$data['category']]],
	]);
}

function add_image_to_ad($name, $post_id) {
	$attach_id = media_handle_upload($name, $post_id);

	if ( $attach_id > 0 ) {
		update_post_meta($post_id, $name, $attach_id);
		return true;
	} return false;
}

function add_metas_to_ad($post_id, $metas) {
	foreach ($metas as $key => $value) {
		add_meta_to_ad($post_id, $key, $value);
	}
}

function add_meta_to_ad($post_id, $meta, $value) {
	if (empty($value)) {
        delete_post_meta($post_id, $meta);
    } else if ( ! get_post_meta($post_id, $meta)) {
        add_post_meta($post_id, $meta, $value);
    } else {
        update_post_meta($post_id, $meta, $value);
    }
}

function pretty_date_diff($date) {
	$interval = date_diff(date_create($date), new DateTime);
	$days = $interval->days;

	if ($days === 0) {
		return 'danas';
	} return 'pre '.$days.' dan(a)';
}

function success($message) {
	echo '<div style="padding: 10px; background-color: #9fdf9f; font-weight: bold">'.$message.'</div>';
}

function error($message) {
	echo '<div style="padding: 10px; background-color: #ff8080; font-weight: bold">'.$message.'</div>';
}

function valid_registration_request() {
	return $_SERVER['REQUEST_METHOD'] === 'POST'
		&& !empty(trim($_POST['first_name']))
		&& !empty(trim($_POST['last_name']))
		&& !empty(trim($_POST['username']))
		&& !empty(trim($_POST['email'])) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
		&& !empty($_POST['password']) && strlen($_POST['password']) >= 6
		&& !empty($_POST['password_confirmation']) && $_POST['password'] == $_POST['password_confirmation'];
}

add_action('init', 'register_ad_post_type');
add_action('init', 'register_ad_category_taxonomy');
add_action('init', 'blockusers_init');
add_action('after_setup_theme', 'remove_admin_bar');
