<?php 
/*
Plugin Name:    simple search filter
PLugin URI :    https://wordpress.org/plugins/simple-search-filter/
Description:    Currency calculator, converts amounts between currencies.
Version:        1.0.0
Requires at least: 5.2
Requires PHP:   7.2
Author:         Ajij Rahaman
Author URI:     https://ajijrahaman.com/
Update URI:     https://github.com/ajijrahaman786
License:        GPLv2 or later
Text Domain:    ssf
*/

// inlcuding css
add_action('wp_enqueue_scripts', 'enqueue_plugin_styles', 10); 
function enqueue_plugin_styles() {
    wp_enqueue_style('sttt-style', plugin_dir_url(__FILE__) . 'css/sttt-style.css', array());
}
// including javaScript
add_action('wp_enqueue_scripts', 'enqueue_plugin_scripts', 50);
function enqueue_plugin_scripts(){
  wp_enqueue_script('sttt-script', plugin_dir_url(__FILE__) . 'js/sttt-plugin.js', array(), true);
}

// js plugin setting Activation

function sttt_tic_tac_toe(){
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

    
<?php
}

add_action("wp_head", "sttt_tic_tac_toe", 30);


?>