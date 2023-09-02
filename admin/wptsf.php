<?php
// Enqueue styles and scripts for the admin dashboard
add_action('admin_enqueue_scripts', 'enqueue_admin_styles_and_scripts', 999);
function enqueue_admin_styles_and_scripts() {
    // Enqueue the stylesheet
    wp_enqueue_style('admin-styles', plugin_dir_url(__FILE__) . '/admin/css/wptsf-style.css');

    // Enqueue the JavaScript
    wp_enqueue_script('admin-scripts', plugin_dir_url(__FILE__) . '/admin/js/wptsf-plugin.js', array(), true);
}








?>
   
