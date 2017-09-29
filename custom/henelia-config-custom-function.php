<?php

/**
 *
 * Functions lié aux customs
 *
 * - CSS / JS (Load assets)
 * - Toolbar WP
 * - Nav menu & Metabox 
 * - Post type support & Role editor
 * - Widgets Init
 * - Analytics
 * - Thumbnails
 * - Body Class
 * - Dashboard
 *
 */

/*==============================================
=            CSS /JS (Load assets)             =
==============================================*/

/* Pour retrouver les styles et scripts de customisation du back-office chargés, voir la section load Assets dans le fichier de création du plugin */

/*=====  End of CSS /JS (Load assets)   ======*/



/*==================================
=            Toolbar WP            =
==================================*/

add_action( 'admin_bar_menu', 'he_toolbar', 999 );

	function he_toolbar( $wp_admin_bar ) {

		global $heCustomOptions; // Récupération du tableau

		// Ajout d'un item henelia dans le menu avec icon (cf. CSS)
		$args = array(
			'id'    => 'he-toolbar',
			'title' => '<span class="he-toolbar-icon"></span>',
			'href'  => admin_url()
		);
			$wp_admin_bar->add_node( $args );

		// Suppression des items encombrants
	    $wp_admin_bar->remove_node( 'wp-logo' ); // logo WP
	    $wp_admin_bar->remove_node('updates'); // Affichage des mises à jour
	    $wp_admin_bar->remove_node( 'view' ); // Option voir la page, risque que l'utilisateur oublie de sauvegarder les modification en cours

	    // Suppression  du bouton personnaliser
	    if ( isset( $heCustomOptions['he-custom-customize'] ) ) {
			$wp_admin_bar->remove_menu( 'customize' ); 
		}
	    
	    // Créer des nouveaux content
	    if ( isset( $heCustomOptions['he-custom-create'] ) ) {
			$wp_admin_bar->remove_node( 'new-content' );
		}

		// Commentaires
		if ( isset( $heCustomOptions['he-custom-comment'] ) ) {
			$wp_admin_bar->remove_node( 'comments' );
		}

	}

/*=====  End of Toolbar WP  ======*/



/*==========================================
=            Nav menu & Metabox            =
==========================================*/

add_action( 'admin_menu', 'he_nav', 999 );

	function he_nav() {

		global $menu;
		global $submenu;
		global $heCustomOptions; // Récupération du tableau

	/*----------  Nav Menu  ----------*/

		$menu[60][0] = 'Composants'; // Apparence devient Composants
		$menu[60][6] = 'dashicons-welcome-widgets-menus'; // Nouvel icon pour Composants

		// pour les utilisateurs non-admin
	    if ( !current_user_can('update_core') ) {
		    remove_menu_page( 'tools.php' ); 	// outils

		    // voir aussi ci-dessous "ajout de droits aux éditeurs"
	        unset($submenu['themes.php'][5]); 	// gestion des thèmes
	    }

	    // Désactiver la personnalisation du theme WP
		if ( isset( $heCustomOptions['he-custom-customize'] ) ) {
			unset($submenu['themes.php'][6]);
		}
	    
	    // Désactiver les Commentaires
		if ( isset( $heCustomOptions['he-custom-comment'] ) ) {
			remove_menu_page( 'edit-comments.php' );
		}

		// Désactiver les widgets
		if ( isset( $heCustomOptions['he-widget-activate'] ) ) {
			unset($submenu['themes.php'][7]);
		} else if ( isset( $heCustomOptions['he-widget-activate-user'] ) ) {
			if ( !current_user_can('update_core') ) {
				unset($submenu['themes.php'][7]);
			}
		}
		
	    // Désactiver les articles
	    if ( isset( $heCustomOptions['he-post-activate'] ) ) {
			remove_menu_page( 'edit.php' );
		}

		/* Désactiver les Catégories */
		if ( isset( $heCustomOptions['he-post-categories'] ) ) {
			/* Et suppression dans le menu */
			remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=category');
		}

		/* Désactiver les Tags */
		if ( isset( $heCustomOptions['he-post-tag'] ) ) {
			/* Et suppression dans le menu */
			remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag');
		}

	/*----------  Metabox  ----------*/
		
		/*----------  Page  ----------*/

	    	/* Pages parents */
			if ( isset( $heCustomOptions['he-page-parent'] ) ) {
				remove_meta_box( 'pageparentdiv', 'page', 'normal' );
			}

			/* Author */
			if ( isset( $heCustomOptions['he-page-author'] ) ) {
				remove_meta_box( 'authordiv', 'page', 'normal' );
			}

			/* Trackback */			
			if ( isset( $heCustomOptions['he-page-trackbacks'] ) ) {
				remove_meta_box( 'trackbacksdiv', 'page', 'normal' );
			}

			/* Custom fields */
			if ( isset( $heCustomOptions['he-page-customfields'] ) ) {
				remove_meta_box( 'postcustom' , 'page' , 'normal' ); 
			} 

			/* Comments */
			if ( isset( $heCustomOptions['he-custom-comment'] ) ) {
				remove_meta_box( 'commentstatusdiv', 'page', 'normal' );
				remove_meta_box( 'commentsdiv', 'page', 'normal' );
			}

			/* Revisions */
			if ( isset( $heCustomOptions['he-page-revisions'] ) ) {
				remove_meta_box( 'revisionsdiv', 'page', 'normal' );
			}

			/* Identifiant */
			if ( isset( $heCustomOptions['he-page-slug'] ) ) {
				remove_meta_box( 'slugdiv', 'page', 'normal' );
		}

		/*----------  Post  ----------*/

			/* Catégories */
			if ( isset( $heCustomOptions['he-post-categories'] ) ) {
				remove_meta_box( 'categorydiv', 'post', 'normal' );
			}

			/* Tags */
			if ( isset( $heCustomOptions['he-post-tag'] ) ) {
				remove_meta_box( 'tagsdiv-post_tag', 'post', 'normal' );
			}

			/* Excerpt */
			if ( isset( $heCustomOptions['he-post-excerpt'] ) ) {
				remove_meta_box( 'postexcerpt', 'post', 'normal' );
			}

			/* Author */
			if ( isset( $heCustomOptions['he-post-author'] ) ) {
				remove_meta_box( 'authordiv', 'post', 'normal' );
			}

			/* Trackback */
			if ( isset( $heCustomOptions['he-post-trackbacks'] ) ) {
				remove_meta_box( 'trackbacksdiv', 'post', 'normal' );
			}			

			/* Custom fields */
			if ( isset( $heCustomOptions['he-post-customfields'] ) ) {
				remove_meta_box( 'postcustom' , 'post' , 'normal' );
			} 

			/* Comments */
			if ( isset( $heCustomOptions['he-custom-comment'] ) ) {
				remove_meta_box( 'commentstatusdiv', 'post', 'normal' );
				remove_meta_box( 'commentsdiv', 'post', 'normal' );
			}

			/* Revisions */
			if ( isset( $heCustomOptions['he-post-revisions'] ) ) {
				remove_meta_box( 'revisionsdiv', 'post', 'normal' );
			}

			/* Identifiant */
			if ( isset( $heCustomOptions['he-post-slug'] ) ) {
				remove_meta_box( 'slugdiv', 'post', 'normal' );
			}

		/*----------  Attachment  ----------*/

			/* Author */
			if ( isset( $heCustomOptions['he-media-author'] ) ) {
				remove_post_type_support( 'attachment', 'author' );
				remove_meta_box( 'authordiv', 'attachment', 'normal' );
			}

			/* Trackback */			
			if ( isset( $heCustomOptions['he-media-trackbacks'] ) ) {
				remove_post_type_support( 'attachment', 'trackbacks' );
				remove_meta_box( 'trackbacksdiv', 'attachment', 'normal' );
			}

			/* Comments */
			if ( isset( $heCustomOptions['he-custom-comment'] ) ) {
				remove_meta_box( 'commentstatusdiv', 'attachment', 'normal' );
				remove_meta_box( 'commentsdiv', 'attachment', 'normal' );
			}

			/* Revisions */
			if ( isset( $heCustomOptions['he-media-revisions'] ) ) {
				remove_meta_box( 'revisionsdiv', 'attachment', 'normal' );
			}

			/* Identifiant */
			if ( isset( $heCustomOptions['he-post-slug'] ) ) {
				remove_meta_box( 'slugdiv', 'attachment', 'normal' );
			}

	}

/*=====  End of Nav menu & Metabox  ======*/

/*=======================================================
=            Post type support & Editor role            =
=======================================================*/

add_action( 'admin_init', 'he_init' );

	function he_init() {

		global $heCustomOptions; // Récupération du tableau

	/*----------  Post type Support  ----------*/
	
		/*----------  Page  ----------*/
			/* Author */
			if ( isset( $heCustomOptions['he-page-author'] ) ) {
				remove_post_type_support( 'page', 'author' );
			}

			/* Trackback */			
			if ( isset( $heCustomOptions['he-page-trackbacks'] ) ) {
				remove_post_type_support( 'page', 'trackbacks' );
			}

			/* Custom fields */
			if ( isset( $heCustomOptions['he-page-customfields'] ) ) {
				remove_post_type_support( 'page', 'custom-fields' );
			} 

			/* Comments */
			if ( isset( $heCustomOptions['he-custom-comment'] ) ) {
				remove_post_type_support( 'page', 'comments' );
			}

			/* Revisions */
			if ( isset( $heCustomOptions['he-page-revisions'] ) ) {
				remove_post_type_support( 'page', 'revisions' );
			}

		/*----------  Post  ----------*/
			/* Author */
			if ( isset( $heCustomOptions['he-post-author'] ) ) {
				remove_post_type_support( 'post', 'author' );
			}

			/* Trackback */			
			if ( isset( $heCustomOptions['he-post-trackbacks'] ) ) {
				remove_post_type_support( 'post', 'trackbacks' );
			}

			/* Custom fields */
			if ( isset( $heCustomOptions['he-post-customfields'] ) ) {
				remove_post_type_support( 'post', 'custom-fields' );
			} 

			/* Comments */
			if ( isset( $heCustomOptions['he-custom-comment'] ) ) {
				remove_post_type_support( 'post', 'comments' );
			}

			/* Revisions */
			if ( isset( $heCustomOptions['he-post-revisions'] ) ) {
				remove_post_type_support( 'post', 'revisions' );
			}

		/*----------  Attachment  ----------*/

			/* Description */
			// Voir manipulation faite en CSS

			/* Author */
			if ( isset( $heCustomOptions['he-media-author'] ) ) {
				remove_post_type_support( 'attachment', 'author' );
			}

			/* Trackback */			
			if ( isset( $heCustomOptions['he-media-trackbacks'] ) ) {
				remove_post_type_support( 'attachment', 'trackbacks' );
			}

			/* Comments */
			if ( isset( $heCustomOptions['he-custom-comment'] ) ) {
				remove_post_type_support( 'attachment', 'comments' );
			}

			/* Revisions */
			if ( isset( $heCustomOptions['he-media-revisions'] ) ) {
				remove_post_type_support( 'attachment', 'revisions' );
			}

	/*----------  Editor Role  ----------*/
		/* Personnalisation du Role editor */

		$editor = get_role( 'editor' );

	    // Modifier les options de thème : Widgets, Menu, Theme
	    if ( isset( $heCustomOptions['he-editor-theme'] ) ) {
		    $editor->add_cap( 'edit_theme_options' );
		} else {
			$editor->remove_cap( 'edit_theme_options' );
		}

		// // Gerer les utilisateurs
		if ( isset( $heCustomOptions['he-editor-user'] ) ) {
		    $editor->add_cap('edit_users'); // Editer les utilisateurs
		    $editor->add_cap('list_users'); // Accéder à la liste des utilisateurs
		    $editor->add_cap('promote_users'); // Changer le Rôles des utilisateurs
		    $editor->add_cap('create_users'); // Créer des utilisateurs
		    $editor->add_cap('add_users'); // Ajouter des utilisateurs
		    $editor->add_cap('delete_users'); // Supprimer des utilisateurs
    	}
    	if ( empty( $heCustomOptions['he-editor-user'] ) ) {
    		$editor->remove_cap('edit_users'); // Editer les utilisateurs
		    $editor->remove_cap('list_users'); // Accéder à la liste des utilisateurs
		    $editor->remove_cap('promote_users'); // Changer le Rôles des utilisateurs
		    $editor->remove_cap('create_users'); // Créer des utilisateurs
		    $editor->remove_cap('add_users'); // Ajouter des utilisateurs
		    $editor->remove_cap('delete_users'); // Supprimer des utilisateurs
    	}

	}

/*=====  End of Post type support & Editor role  ======*/


/*===================================
=            Widget Init            =
===================================*/
/* Gestion des widgets */

/* Si les widgets sont activés */
// if ( isset( $heCustomOptions['he-widget-activate'] ) ) {
add_action( 'widgets_init', 'he_widgets_init' );

    function he_widgets_init() {

    	global $heCustomOptions; // Récupération du tableau
    	
    	if ( isset( $heCustomOptions['he-widget-video'] ) ) {
    		unregister_widget('WP_Widget_Media_Video');
    	}

    	if ( isset( $heCustomOptions['he-widget-audio'] ) ) {
    		unregister_widget('WP_Widget_Media_Audio');
    	}

    	if ( isset( $heCustomOptions['he-widget-image'] ) ) {
    		unregister_widget('WP_Widget_Media_Image');
    	}

    	if ( isset( $heCustomOptions['he-widget-calendar'] ) ) {
        	unregister_widget('WP_Widget_Calendar');
        }

        if ( isset( $heCustomOptions['he-widget-pages'] ) ) {
        	unregister_widget('WP_Widget_Pages');
        }

        if ( isset( $heCustomOptions['he-widget-calendar'] ) ) {
        	unregister_widget('WP_Widget_Archives');
        }

        if ( isset( $heCustomOptions['he-widget-recent-posts'] ) ) {
        	unregister_widget('WP_Widget_Recent_Posts');
        }

        if ( isset( $heCustomOptions['he-widget-recent-comments'] ) ) {
			unregister_widget('WP_Widget_Recent_Comments');
        }

        if ( isset( $heCustomOptions['he-widget-menu'] ) ) {
        	unregister_widget('WP_Nav_Menu_Widget');
        }

        if ( isset( $heCustomOptions['he-widget-cloud'] ) ) {
        	unregister_widget('WP_Widget_Tag_Cloud');
        }

        if ( isset( $heCustomOptions['he-widget-search'] ) ) {
        	unregister_widget('WP_Widget_Search');
        }

        if ( isset( $heCustomOptions['he-widget-cat'] ) ) {
        	unregister_widget('WP_Widget_Categories');
        }

        if ( isset( $heCustomOptions['he-widget-rss'] ) ) {
        	unregister_widget('WP_Widget_RSS');
        }

        if ( isset( $heCustomOptions['he-widget-meta'] ) ) {
        	unregister_widget('WP_Widget_Meta');
        }

        if ( isset( $heCustomOptions['he-widget-text'] ) ) {
        	unregister_widget('WP_Widget_Text');
        }

    } 
// }
/*=====  End of Widget Init  ======*/



/*=================================
=            Analytics            =
=================================*/
/* Affichage du scripts de suivi analytics, uniquement si le champs est coché et le code saisi */

/* Cette fonction se retrouve dans le template header.php généralement, juste avant la fermeture de la balise <head> */

if ( ! function_exists( 'he_analytics' ) ) {

	function he_analytics() {

		global $heCustomOptions; // Récupération du tableau

		if ( isset( $heCustomOptions['he-google-analytics-active'] ) && isset( $heCustomOptions['he-google-analytics-code'] ) ) {
			
			echo '<script type="text/javascript">
				(function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,\'script\',\'https://www.google-analytics.com/analytics.js\',\'ga\');
				ga(\'create\', \''. $heCustomOptions['he-google-analytics-code'] .'\', \'auto\');
				ga(\'send\', \'pageview\');
				</script>';

		}

	}
}

/*=====  End of Analytics  ======*/



/*=================================
=            Thumbnail            =
=================================*/
/* Post type supportant les Images à la une */

$thumbnailSupport = array(); // Création du tableau des post type gérés

// Thumbnail de page
if ( !isset( $heCustomOptions['he-page-thumbnail'] ) ) {
	$thumbnailSupport[] = 'page';
}

// Thumbnail de post
if ( !isset( $heCustomOptions['he-post-thumbnail'] ) ) {
	$thumbnailSupport[] = 'post';
}

add_theme_support( 'post-thumbnails', $thumbnailSupport );

/*=====  End of Thumbnail  ======*/



/*==================================
=            Body Class            =
==================================*/

add_action( 'admin_body_class', 'he_body_custom' );

	function he_body_custom( $class ) {

		global $heCustomOptions; // Récupération du tableau

		global $current_user;
		$user_role = array_shift($current_user->roles);

		/*----------  Roles  ----------*/
		
		// Affiche une class uniquement pour les admin
		if ( is_admin() && current_user_can('update_core') ) {
			$class .= 'he-user-admin';
		}

		// Affiche une class pour les user pas admin
		if ( is_admin() && !current_user_can('update_core') ) {
	 		$class .= ' jbg-user-editor user-'. $user_role;
		}

		/*----------  Custom WP admin  ----------*/

		// Si la CSS est activée
		if ( isset( $heCustomOptions['he-custom-css'] ) ) {
			$class .= ' he-custom-activate';
		}

		// Cacher le customize de theme par WP
		if ( isset( $heCustomOptions['he-custom-customize'] ) ) {
			$class .= ' he-hide-wp-custom';
		}

		/*----------  Posts : Page  ----------*/
	    // 
	 	
	    /*----------  Posts : Post  ----------*/
	    
	    // Pas de catégories
	    if ( isset( $heCustomOptions['he-post-categories'] ) ) {
			$class .= ' he-hide-cat';
		}

		    // Pas de parents de catégories
		    if ( isset( $heCustomOptions['he-post-categories-parent'] ) ) {
				$class .= ' he-hide-cat-parent';
			}

		    // Pas de description de catégories
		    if ( isset( $heCustomOptions['he-post-categories-desc'] ) ) {
				$class .= ' he-hide-cat-desc';
			}

		// Pas de catégories
	    if ( isset( $heCustomOptions['he-post-tag'] ) ) {
			$class .= ' he-hide-tag';
		}

		    // Pas de parents de catégories
		    if ( isset( $heCustomOptions['he-post-tag-parent'] ) ) {
				$class .= ' he-hide-tag-parent';
			}

		    // Pas de description de catégories
		    if ( isset( $heCustomOptions['he-post-tag-desc'] ) ) {
				$class .= ' he-hide-tag-desc';
			}

	    /*----------  Media & Upload  ----------*/

	    // Cacher la description des medias
	    if ( isset( $heCustomOptions['he-media-desc'] ) ) {
			$class .= ' he-hide-media-desc';
		}
	    // Cacher les options de création de galeries
	    if ( isset( $heCustomOptions['he-media-gallery-option'] ) ) {
			$class .= ' he-hide-gallery-option';
		}
	    // Cacher le titre des galeries
	    if ( isset( $heCustomOptions['he-media-gallery-title'] ) ) {
			$class .= ' he-hide-gallery-title';
		}

		return $class;
	}

/*=====  End of Body Class  ======*/


/*=================================
=            Dashboard            =
=================================*/

/*----------  Supprimer l'écran d'acceuil  ----------*/

remove_action( 'welcome_panel', 'wp_welcome_panel' );

/*----------  Suppression de widgets  ----------*/

add_action( 'wp_dashboard_setup', 'he_dashboard' );

	function he_dashboard() {

		global $heCustomOptions; // Récupération du tableau

		/*----------  Suppression pour tous  ----------*/
		
		// Brouillon rapide : Quick Press widget
		if ( isset( $heCustomOptions['he-dashboard-quick'] ) || isset( $heCustomOptions['he-post-activate'] ) ) {	
			remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
		}
		
		// Brouillon récent : Récent draft		
		if ( isset( $heCustomOptions['he-dashboard-recent'] ) || isset( $heCustomOptions['he-post-activate'] ) ) {
			remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
		}

		// activity
		if ( isset( $heCustomOptions['he-dashboard-recent'] ) || isset( $heCustomOptions['he-post-activate'] ) || isset( $heCustomOptions['he-custom-comment'] )) {
			remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
		} 

		// Incoming Links
		if ( isset( $heCustomOptions['he-dashboard-incoming'] ) ) {
			remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
		}

		// Plugins
		if ( isset( $heCustomOptions['he-dashboard-plugins'] ) ) {
			remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
		}
		
		// Evènements et nouveautés WordPress
		if ( isset( $heCustomOptions['he-dashboard-blog'] ) ) {	
			remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
		}

		// Other WordPress News
		if ( isset( $heCustomOptions['he-dashboard-secondary'] ) ) {	
			remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );      	
		}

		/*----------  Suppression pour les redacteurs  ----------*/
		if ( is_admin() && !current_user_can('update_core') ) {

			// D'un coup d'oeil : Right Now
			if ( isset( $heCustomOptions['he-dashboard-right-now'] ) ) {
				remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
			}

			// Yoast SEO
			if ( isset( $heCustomOptions['he-dashboard-yoast'] ) ) {
				remove_meta_box( 'wpseo-dashboard-overview', 'dashboard', 'normal' );
			}
		}

		/*----------  Appel de la function qui construit le message d'accueil Henelia  ----------*/
		
		wp_add_dashboard_widget(
			'welcome',         			// Widget slug.
			'Bienvenue dans l\'administration du site '.get_bloginfo('name').'.', // Title.
			'he_welcome' 	// Display function.
		);
	}

/*----------  Boxes personnalisée d'accueil  ----------*/

function he_welcome() {

    echo '<div style="overflow: hidden;"><img src="'.get_template_directory_uri().'/images/henelia-logo-dashboard.png" alt="Henelia" style="float: left;max-width: 100%;height: auto;width: 145px;margin-right: 20px;" />
	<h3>Vous utilisez actuellement l\'administration du CMS Wordpress spécialement développé par Henelia</h3>
	<p>Si vous rencontrez un problème, n\'oubliez pas que Wordpress est la solution la plus répandue sur la toile. Une simple recherche google vous permettra de trouver la solution. N\'oubliez pas d\'être curieux et patient, vous trouverez souvent la solution par vous même.</p>
	<p>Si malgrès tout, aucune réponse ne s\'offre à vous, contactez moi.</p> <p style="text-align: right;"><a href="http://www.henelia.fr" target="_blank" class="button button-secondary">www.henelia.fr</a>  <a href="mailto:support@henelia.fr" class="button button-primary">support@henelia.fr</a></p></div>';

}

/*=====  End of Dashboard  ======*/


