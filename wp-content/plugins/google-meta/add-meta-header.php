<?php
/*
Plugin Name: Add Meta
Plugin URI:  http://link to your plugin homepage
Description: Describe what your plugin is all about in a few short sentences
Version:     1.0
Author:      Your name (Yay! Here comes fame... )
Author URI:  http://link to your website
License:     GPL2 etc
License URI: http://link to your plugin license
*/
add_action('wp_head', 'wpse_43672_wp_head');
function wpse_43672_wp_head(){
    //Close PHP tags 
    ?>
    <meta name="google-site-verification" content="v4xcYjxCwzKAnGLlN4UzlljoIRdVPhuQn72uGC0ZKIs" />
    <?php //Open PHP tags
}

