<?php
/*
Plugin Name: Candidates management tool
Description: A dashboard page used for managing candidates information
Version:     1.0.0
Author:      Benjamin Mordukhovich
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: wporg
Domain Path: /languages
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
define( 'CANDIDATES__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'CANDIDATES__PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'CANDIDATES_VERSION', '1.0' );

/** Step 2 (from text above). */
add_action( 'admin_menu', 'init_candidates_dashboard' );

/** Step 1. */
function init_candidates_dashboard() {
	add_options_page( 'Candidates dashboard', 'Candidates', 'manage_options', 'd400800', 'candidates_dashboard' );
}

/** Step 3. */
function candidates_dashboard() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	require_once( CANDIDATES__PLUGIN_DIR . 'main-view.php' );
}

/** Including styles and scripts */
wp_register_style( 'flexboxgrid.css', CANDIDATES__PLUGIN_URL . 'assets/css/flexboxgrid.css', array(), false );
wp_register_style( 'candidates.css', CANDIDATES__PLUGIN_URL . 'assets/css/candidates.css', array(), false );

wp_enqueue_style( 'flexboxgrid.css');
wp_enqueue_style( 'candidates.css');

wp_register_script( 'angular.js', CANDIDATES__PLUGIN_URL . 'assets/js/angular.min.js', array(), false );
wp_register_script( 'candidates.js', CANDIDATES__PLUGIN_URL . 'assets/js/candidates.js', array('angular.js'), false );

wp_enqueue_script( 'angular.js' );
wp_enqueue_script( 'candidates.js' );

?>