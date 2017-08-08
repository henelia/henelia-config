<?php

/**
*
* * Fonctions de gestion du tinyMCE
*
*
**/


/*===============================
=            TinyMCE            =
===============================*/

/*----------  Plugin TinyMCE pour afficher les blocs dans le contenu  ----------*/

add_filter( 'mce_external_plugins', function( $plugins ) {

    $plugins['visualblocks'] = plugin_dir_url( __FILE__ ).'visualblocks/plugin.min.js';
    $plugins['pcanchor'] = plugin_dir_url( __FILE__ ).'he-plugin_anchor/he-plugin_anchor.js';
    $plugins['pcembed'] = plugin_dir_url( __FILE__ ).'media/plugin.min.js';
    return $plugins;

});


/*----------  Feuille de style  ----------*/

add_action( 'admin_init', function() {

    add_editor_style( plugin_dir_url( __FILE__ ).'henelia-config-tinymce.css' );

});

/*----------  Boutons personnalisés  ----------*/

add_filter( 'tiny_mce_before_init', 'he_tinymce_settings' );

    function he_tinymce_settings( $settings ) {

        global $heEditorOptions; // Récupération du tableau

        if ( post_type_supports( get_current_screen()->post_type, 'editor' ) ) {
            
            // Debug:
            // he_var( $settings, true);
            // exit();

            // contenu des barres d'outils
            $settings['toolbar1']                     = $heEditorOptions['tinymce-toolbar1'];
            $settings['toolbar2']                     = $heEditorOptions['tinymce-toolbar2'];
            // menu type de block
            $settings['block_formats']                = $heEditorOptions['tinymce-block'];
            // plugin visual block activation
            $settings['visualblocks_default_state']   = ($heEditorOptions['tinymce-visualblocks'] == 1 ? true : false);
            // copier comme texte activation
            $settings['paste_as_text']                = ($heEditorOptions['tinymce-paste'] == 1 ? true : false);
            // options plugin media
            $settings['media_alt_source']             = false;
            $settings['media_poster']                 = false;

        }

        return $settings;

    }

/*=====  FIN TinyMCE  ======*/
