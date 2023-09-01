<?php 
/*
Plugin Name:    Simple table of Search filter(TSF)
PLugin URI :    https://wordpress.org/plugins/simple-table-of-search-filter/
Description:    The most universal filters plugin for filtering any data of the table.
Version:        1.0.0
Requires at least: 5.2
Requires PHP:   7.2
Author:         Ajij Rahaman
Author URI:     https://ajijrahaman.com/
Update URI:     https://github.com/ajijrahaman786
License:        GPLv2 or later
Text Domain:    wptsf
*/

// inlcuding css for the site
add_action('wp_enqueue_scripts', 'enqueue_styles_of_site', 10); 
function enqueue_styles_of_site() {
    wp_enqueue_style('wptsf-style', plugin_dir_url(__FILE__) . 'css/wptsf-style.css', array());
}
// including javaScript for the site
add_action('wp_enqueue_scripts', 'enqueue_scripts_of_site', 50);
function enqueue_scripts_of_site(){
  wp_enqueue_script('wptsf-script', plugin_dir_url(__FILE__) . 'js/wptsf-plugin.js', array(), true);
}
// including javaScript for the plugin settings
add_action('admin_footer', 'enqueue_scripts_of_plugin_settings', 50);
function enqueue_scripts_of_plugin_settings(){
  wp_enqueue_script('wptsf-script', plugin_dir_url(__FILE__) . 'js/wptsf-plugin.js', array(), true);
}
// inlcuding css for the plugin settings
add_action('admin_footer', 'enqueue_styles_of_plugin_settings', 10); 
function enqueue_styles_of_plugin_settings() {
    wp_enqueue_style('wptsf-style', plugin_dir_url(__FILE__) . 'admin/css/wptsf-style.css', array());
}

// plugin setting Activation
add_action("wp_head", "TSF_page_html", 10);
function TSF_page_html(){
  include_once "admin/wptsf.php";
  ?>

    
<?php
}


function TSF_main_settings_html(){
  ?>
  <div class="wrap">
		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
		<form action="options.php" method="post">
			<?php
			// output security fields for the registered setting "wptsf_settings"
			settings_fields( 'wptsf_settings' );
			// output setting sections and their fields
			// (sections are registered for "wptsf_settings", each field is registered to a specific section)
			do_settings_sections( 'wptsf_settings' );
			// output save settings button
			submit_button( 'Save Settings' );
			?>
		</form>
	</div>
  <?php

}


// register wptsf_register_menu_page to the admin_init action hook
add_action('admin_menu', 'wptsf_register_menu_page');
function wptsf_register_menu_page(){

  add_menu_page("Table of Search Filter WP", "TSF", "manage_options", "tsf-settings", "TSF_page_html", "dashicons-editor-table", 20);

  add_submenu_page("tsf-settings", "TSF Settings", "Settings", "manage_options", "settings", "TSF_main_settings_html", 10);

}


// register wptsf_settings_init to the admin_init action hook
add_action('admin_init', 'wptsf_settings_init');
function wptsf_settings_init(){
  // Register a new setting for "wptsf" page.
	register_setting( 'wptsf_settings', 'wptsf_table', "wptsf_table_cb");
  // Register a new section in the "wptsf" page.
	add_settings_section("wptsf_settings_section", "wptsf_table_section", "wptsf_table_section_cb", "tsf-settings");
  // Register a new field in the "wptsf" page.
  add_settings_field("wptsf_settings_field", "wptsf_table_field", "wptsf_table_label_cb", "TSF","wptsf_settings_section");

}







?>