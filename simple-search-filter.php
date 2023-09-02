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

// Enqueue styles and scripts for the main site
add_action('wp_enqueue_scripts', 'enqueue_frontend_styles_and_scripts', 10);
function enqueue_frontend_styles_and_scripts() {
    // Check if we're not in the admin area
    if (!is_admin()) {
        // Enqueue the stylesheet
        wp_enqueue_style('frontend-styles', plugin_dir_url(__FILE__) . 'css/wptsf-style.css');

        // Enqueue the JavaScript
        wp_enqueue_script('frontend-scripts', plugin_dir_url(__FILE__) . 'js/wptsf-plugin.js', array(), true);
    }
}

// plugin setting Activation
add_action("wp_head", "TSF_page_html", 30);
function TSF_page_html(){
  // include_once "admin/wptsf.php";
  ?>
  <h2>Ice Cream Collection</h2>
    <div class="search-bar">
        <input type="text" placeholder="Search" id="search-bar" value="">
    </div>
    <table id="table-wrapper">
        <thead id="table-header-row">

        </thead>
        <tbody id="table-body">

        </tbody>
    </table>
    <button type="button" id="addRow">Add Row</button>
    <button type="button" id="deleteRow">Delete Row</button>

    
<?php
}

// TSF plugin main settings html
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
  // TSF plugin main settings menu added
  add_submenu_page("tsf-settings", "TSF Settings", "Settings", "manage_options", "settings", "TSF_main_settings_html", 10);

}





?>