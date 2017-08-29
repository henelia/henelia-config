<?php

/*
Plugin Name: [He] Henelia Config
Plugin URI: www.henelia.fr
Description: Customisations admin & public 
Version: 0.1.1
Author: Henelia & Collectif Créatif
*/

/**
 *
 * SUMMARY :
 *
 * - Includes
 * - Load Assets
 * - Security
 * - MAJ wordpress
 * - Dev
 *
 *
 */

/*================================
=            Includes            =
================================*/

/*----------  Gestion des Class  ----------*/
/* Outils permettant la mise ne place rapide de dévelloppement */
include 'class/class-add-custom-admin.php';                // Création de pages, field, ... dans l'admin
include 'class/class-user-role.php';                // Gestion des users et droit

/*----------  Gestion des customisations de l'admin  ----------*/

include 'henelia-config-page.php';                // page d'administration
include 'henelia-config-doc.php';				// page de documentation

if ( get_option('he-activate-config') )  {

	$heCustomOptions = get_option('he-custom-option');	// Création du tableau avec les données du module du plugin

	include 'custom/henelia-config-custom-page.php';		// page de customisation du thème
	include 'custom/henelia-config-custom-function.php';	// function associés à la création du thème

}


if ( get_option('he-tinymce') )  {

	$heEditorOptions = get_option('he-tinymce-option');		// Création du tableau

	include 'tinymce/henelia-config-tinymce-page.php';		// page de customisation du tinyMCE
	include 'tinymce/henelia-config-tinymce-function.php';		// function associés à la gestion tinyMCE

}

if ( get_option('he-cookie') )  {

	include 'cookie/henelia-config-cookie-function.php';		// function associés à l'affichage en front du message de Cookie

}

/*=====  End of Includes  ======*/

/*===================================
=            Load Assets            =
===================================*/

add_action( 'admin_enqueue_scripts', 'he_load_assets' );

    function he_load_assets($hook) {
    	
    	global $heCustomOptions;

    	/*----------  Chargement des styles et scripts du plugins  ----------*/
    	// Scripts
    	wp_enqueue_script( 'he-config-scripts', plugin_dir_url( __FILE__ ).'henelia-config-script.js' );

	    // CSS
	    wp_enqueue_style( 'he-config-css', plugin_dir_url( __FILE__ ).'henelia-config-style.css' );

	    /*----------  Chargement des styles et scripts du module Custom  ----------*/

	    // Scripts
    	if ( $heCustomOptions['he-custom-js'] ) {
    		wp_enqueue_script( 'he-config-custom-scripts', plugin_dir_url( __FILE__ ).'custom/henelia-config-custom-script.js' );
    	}

	    // CSS
	    if ( $heCustomOptions['he-custom-css'] ) {
	    	wp_enqueue_style( 'he-config-custom-css', plugin_dir_url( __FILE__ ).'custom/henelia-config-custom-style.css' );
	    }

	    // media uploader
	    wp_enqueue_media();

    }

/*=====  End of Load Assets  ======*/


/*================================
=            Security            =
================================*/

/* rend impossible la modification de fichier depuis l'administration */
define('DISALLOW_FILE_EDIT',true);

/* Bloque l'affichage de message d'erreur de connexion sur la page de login */
add_filter('login_errors', create_function('$a', "return null;"));

/* Suppression de l'affichage de la version du wordpress */
remove_action('wp_head', 'wp_generator');

/*=====  End of Security  ======*/


/*=====================================
=            MAJ Wordpress            =
=====================================*/

/*----------  Masquer les mises à jour pour les non administrateur  ----------*/

add_action( 'admin_head', function() {

	if ( !current_user_can('update_core') ) { remove_action( 'admin_notices', 'update_nag', 3 ); }

}, 1 );

/*=====  End of MAJ Wordpress  ======*/


/*===========================
=            Dev            =
===========================*/

/*----------  Afficher un tableau ou un objet  ----------*/

function he_var($var, $margin = false) {

	$margin == true ? $style = 'style="margin-left:200px"' : $style = '';
	echo '<pre '.$style.'>'.print_r($var,true).'</pre>';

}

/*=====  FIN Dev  ======*/

?>