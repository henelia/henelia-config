<?php

add_action( 'wp_enqueue_scripts', 'cookie_assets');

	function cookie_assets(){

	    /*=========================================
	    =            Chargement assets            =
	    =========================================*/

	    /*----------  Header  ----------*/

	    wp_enqueue_style('cookie', plugin_dir_url( __FILE__ ).'cookie.css', false, 1, 'all');

	    /*----------  Footer  ----------*/

	    // Scripts projet
	    wp_register_script('cookie', plugin_dir_url( __FILE__ ).'cookie.js', array( 'jquery' ), '1.0.0', false);
	    wp_enqueue_script('cookie', plugin_dir_url( __FILE__ ).'cookie.js', array( 'jquery' ), '1.0.0', true);

	    /*=====  End of Chargement assets  ======*/
	}

?>