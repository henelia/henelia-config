<?php

add_action('plugins_loaded', function() { 

	/*----------  Valeurs par défaut  ----------*/

	// si l'option n'existe pas
	if ( !get_option( 'he-custom-option' ) ) {

		$optionsValues = array(
			'he-custom-css'				=> '1',
			'he-custom-js'				=> '1',
			'he-custom-customize'		=> '1',
			'he-custom-comment'			=> '1',

			'he-widget-activate'		=> '1',
			'he-widget-activate-user'	=> '1',
			'he-widget-video'			=> '1',
			'he-widget-audio'			=> '1',
			'he-widget-image'			=> '1',
			'he-widget-calendar'		=> '1',
			'he-widget-pages'			=> '1',
			'he-widget-archives'		=> '1',
			'he-widget-recent-posts'	=> '1',
			'he-widget-recent-comments'	=> '1',
			'he-widget-menu'			=> '1',
			'he-widget-cloud'			=> '1',
			'he-widget-search'			=> '1',
			'he-widget-cat'				=> '1',
			'he-widget-rss'				=> '1',
			'he-widget-meta'			=> '1',
			'he-widget-text'			=> '1',

			'he-page-parent'			=> '1',
			'he-page-thumbnail'			=> '1',
			'he-page-author'			=> '1',
			'he-page-trackbacks'		=> '1',
			'he-page-customfields'		=> '1',
			'he-page-revisions'			=> '1',
			'he-page-slug'				=> '1',

			'he-post-categories'		=> '1',
			'he-post-categories-parent'	=> '1',
			'he-post-categories-desc'	=> '1',
			'he-post-tag'				=> '1',
			'he-post-tag-parent'		=> '1',
			'he-post-tag-desc'			=> '1',
			'he-post-thumbnail'			=> '1',
			'he-post-excerpt'			=> '1',
			'he-post-author'			=> '1',
			'he-post-trackbacks'		=> '1',
			'he-post-customfields'		=> '1',
			'he-post-revisions'			=> '1',
			'he-post-slug'				=> '1',

			'he-media-author'			=> '1',
			'he-media-revisions'		=> '1',
			'he-media-slug'				=> '1',
			'he-media-desc'				=> '1',
			'he-media-gallery'			=> '1',
			'he-media-gallery-title'	=> '1',
			'he-media-gallery-option'	=> '1',
			'he-media-video'			=> '1',
			'he-media-audio'			=> '1',
			'he-media-external'			=> '1',

			'he-dashboard-welcome'		=> '1',
			'he-dashboard-quick'		=> '1',
			'he-dashboard-recent'		=> '1',
			'he-dashboard-incoming'		=> '1',
			'he-dashboard-plugins'		=> '1',
			'he-dashboard-activity'		=> '1',
			'he-dashboard-blog'			=> '1',
			'he-dashboard-secondary'	=> '1',
		);

		add_option( 'he-custom-option', $optionsValues ,'', 'no');

	}

	if( class_exists('He_Add_Admin_Page') ) {

		$heCustomPage = array(
			array(
		        'title'     => 'Custom WP admin',
		        'id'        => 'custom-wp-admin',
		        'desc'      => 'Nettoyage par défaut du backoffice, supprimant les options inutiles et limitant l\'utilisateur. Des fichiers sont proposés pour une meilleure personnalisation au sein du thème Henelia',
		        'prefix'    => 'he-custom',
		        'fields'    => array(
		            array(	// FAIT
		                'type'      => 'checkbox',
		                'label_for' => 'css',
		                'label'     => 'Activer Le Style CSS Henelia',
		                'desc'		=> '! Important : Si vous ne cochez pas ceci, les options suivantes risquent de ne pas être fonctionnelles'
		            ),
		            array(	// FAIT
		                'type'      => 'checkbox',
		                'label_for' => 'js',
		                'label'     => 'Activer le Javascript Henelia',
		                'desc'		=> '! Important : Si vous ne cochez pas ceci, les options suivantes risquent de ne pas être fonctionnelles'
		            ),
		            array(	// FAIT
		                'type'      => 'checkbox',
		                'label_for' => 'customize',
		                'label'     => 'Désactiver la personnalisation wordpress',
		                'desc'		=> 'Permet de supprimer les boutons "Personaliser" présents dans la Toolbar, thème, ...'
		            ),
		            array( // FAIT
		                'type'      => 'checkbox',
		                'label_for' => 'create',
		                'label'     => 'Toolbar : Désactiver le bouton créer'
		            ),
		            array( // FAIT
		                'type'      => 'checkbox',
		                'label_for' => 'comment',
		                'label'     => 'Désactiver intégralement les Commentaires'
		            )
		        )
		    ),
		    array(
		        'title'     => 'Configuration Google',
		        'id'        => 'google-tools',
		        'prefix'    => 'he-google',
		        'fields'    => array(
		            array( // FAIT
		                'type'      => 'checkbox',
		                'label_for' => 'analytics-active',
		                'label'     => 'Activer Google Analytics'
		            ),
		            array( // FAIT
		                'type'      => 'text',
		                'label_for' => 'analytics-code',
		                'label'     => 'Code UA Google Analytics'
		            ),
		            array(
		                'type'      => 'text',
		                'label_for' => 'recaptcha-site',
		                'label'     => 'reCAPTCHA clé du site',
		                'css'		=> 'width:100%',
		                'desc'		=> 'Utile pour les formulaires spécifiques et la login page. N\'empêche pas la mise en place des keys dans les plugins variés (Gravity forms, ...)'
		            ),
		            array(
		                'type'      => 'text',
		                'label_for' => 'recaptcha-secret',
		                'label'     => 'reCAPTCHA Clé secrète',
		                'css'		=> 'width:100%'
		            )
		        )
		    ),
		    array(
		        'title'     => 'Widget',
		        'id'        => 'custom-wp-widgets',
		        'desc'      => 'Activation et customisation des widgets',
		        'prefix'    => 'he-widget',
		        'fields'    => array(
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'activate',
		                'label'     => 'Désactiver les Widgets pour tous',
		                'attr'		=> 'heading="true"'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'activate-user',
		                'label'     => 'Désactiver les Widgets <br/><span class="alert">Sauf les admin</span>',
		                'attr'		=> 'sublevel="true"'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'video',
		                'label'     => 'Desactiver Widgets Vidéo'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'audio',
		                'label'     => 'Desactiver Widgets Son'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'image',
		                'label'     => 'Desactiver Widgets Image'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'calendar',
		                'label'     => 'Desactiver Widgets Calendar'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'pages',
		                'label'     => 'Desactiver Widgets Pages'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'archives',
		                'label'     => 'Desactiver Widgets Archives'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'recent-posts',
		                'label'     => 'Desactiver Widgets Posts récents'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'recent-comments',
		                'label'     => 'Desactiver Widgets Commentaires récents'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'menu',
		                'label'     => 'Desactiver Widgets menu'
		            ),
		             array(
		                'type'      => 'checkbox',
		                'label_for' => 'cloud',
		                'label'     => 'Desactiver Widgets Nuage de tags'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'search',
		                'label'     => 'Desactiver Widgets Recherche'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'cat',
		                'label'     => 'Desactiver Widgets Catégories'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'rss',
		                'label'     => 'Desactiver Widgets RSS'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'meta',
		                'label'     => 'Desactiver Widgets Meta'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'text',
		                'label'     => 'Desactiver Widgets Texte'
		            )
		        )
		    ),
		    array(
		        'title'     => 'Post type : Page',
		        'id'        => 'custom-wp-page',
		        'desc'      => 'Customisation du post type "Page", des "post_type_support" et "metabox"',
		        'prefix'    => 'he-page',
		        'fields'    => array(
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'parent',
		                'label'     => 'Désactiver les parents'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'thumbnail',
		                'label'     => 'Désactiver les thumbnails'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'author',
		                'label'     => 'Désactiver les auteurs'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'trackbacks',
		                'label'     => 'Désactiver les trackbacks'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'customfields',
		                'label'     => 'Désactiver les custom fields'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'revisions',
		                'label'     => 'Désactiver les révisions'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'slug',
		                'label'     => 'Désactiver l\'identifiant (slug)'
		            )
		        )
		    ),
		    array(
		        'title'     => 'Post type : Post (Article)',
		        'id'        => 'custom-wp-post',
		        'desc'      => 'Customisation du post type "Post" (Article) , des "post_type_support" et "metabox"',
		        'prefix'    => 'he-post',
		        'fields'    => array(
		        	array( // FAIT
		                'type'      => 'checkbox',
		                'label_for' => 'activate',
		                'label'     => 'Désactiver les Articles',
		                'attr'		=> 'heading="true"'
		            ),
		        	array(
		                'type'      => 'checkbox',
		                'label_for' => 'categories',
		                'label'     => 'Désactiver les catégories'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'categories-parent',
		                'label'     => 'Désactiver les parents de catégories',
		                'attr'		=> 'sublevel="true"'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'categories-desc',
		                'label'     => 'Désactiver les descriptions de catégories',
		                'attr'		=> 'sublevel="true"'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'tag',
		                'label'     => 'Désactiver les tags'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'tag-parent',
		                'label'     => 'Désactiver les parents de tags',
		                'attr'		=> 'sublevel="true"'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'tag-desc',
		                'label'     => 'Désactiver les descriptions de tags',
		                'attr'		=> 'sublevel="true"'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'thumbnail',
		                'label'     => 'Désactiver le thumbnail'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'excerpt',
		                'label'     => 'Désactiver l\'extrait'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'author',
		                'label'     => 'Désactiver les auteurs'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'trackbacks',
		                'label'     => 'Désactiver les trackbacks'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'revisions',
		                'label'     => 'Désactiver les révisions'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'slug',
		                'label'     => 'Désactiver l\'identifiant (slug)'
		            )
		        )
		    ),
		    array(
		        'title'     => 'Post type : Media (Attachment)',
		        'id'        => 'custom-wp-media',
		        'desc'      => 'Customisation du post type "Media" (Attachment) , des "post_type_support" et "metabox" et de la gestion des uploads',
		        'prefix'    => 'he-media',
		        'fields'    => array(
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'author',
		                'label'     => 'Désactiver les auteurs'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'revisions',
		                'label'     => 'Désactiver les révisions'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'slug',
		                'label'     => 'Désactiver l\'identifiant (slug)'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'desc',
		                'label'     => 'Désactiver le champ description'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'gallery',
		                'label'     => 'Désactiver les galeries de media'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'gallery-title',
		                'label'     => 'Désactiver le titre de galerie',
		                'attr'		=> 'sublevel="true"'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'gallery-option',
		                'label'     => 'Désactiver les options de galeries',
		                'attr'		=> 'sublevel="true"'
		            ),
	            	array(
		                'type'      => 'checkbox',
		                'label_for' => 'video',
		                'label'     => 'Désactiver les listes vidéos',
		                'attr'		=> 'sublevel="true"'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'audio',
		                'label'     => 'Désactiver les listes audios',
		                'attr'		=> 'sublevel="true"'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'external',
		                'label'     => 'Désactiver les liens externes'
		            )
		        )
		    ),
		    array(
		        'title'     => 'Dashboard',
		        'id'        => 'custom-dashboard',
		        'desc'      => 'Customisation des éléments du Dashboard, pour les utilisateurs admin et/ou autres. Activation des modules de Dashboard spécifiques Henelia de base.',
		        'prefix'    => 'he-dashboard',
		        'fields'    => array(
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'welcome',
		                'label'     => 'Désactiver l\'écran d\'accueil'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'quick',
		                'label'     => 'Désactiver le "brouillon rapide"'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'recent',
		                'label'     => 'Désactiver les Brouillons récents'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'incoming',
		                'label'     => 'Désactiver les liens entrants'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'plugins',
		                'label'     => 'Désactiver le bloc plugins'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'activity',
		                'label'     => 'Désactiver l\'activité'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'right-now',
		                'label'     => 'Désactiver "D\'un coup d\'oeil"',
		                'desc'		=> 'Garder pour les admins'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'yoast',
		                'label'     => 'Désactiver Yoast',
		                'desc'		=> 'Garder pour les admins'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'blog',
		                'label'     => 'Désactiver les évènements et nouveautés WordPress'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'secondary',
		                'label'     => 'Désactiver "Other WordPress News"'
		            )
		        )
		    ),
		    array(
				'title'     => 'Gestion des rôles',
				'id'        => 'custom-users',
				'prefix'    => 'he-users',
				'desc'      => '<p>Afin de restreindre l\'utilisateur mais surtout lui simplifier la vie, merci de respecter cette logique :</p><ol><li>Admin : Uniquement les Dev et Henelia</li><li>Editeur : Client et/ou webmaster du site avec des droits spéciaux</li><li>contributeurs,auteurs,... à votre bon plaisir, mais inutile sur la plupart des sites ne nécessitant pas de workflow</li></ul>',
				'fields'    => array(
					array(
						'type'      => 'checkbox',
						'label_for' => 'subscriber',
						'label'     => 'Supprimer le rôle Abonné',
						'desc'		=> '<span class="alert">! Attention</span> Action irrémédiable, utilisez <code>remove_cap</code> ou réflechissez avant de faire une bêtise !'
					),
					array(
						'type'      => 'checkbox',
						'label_for' => 'contributor',
						'label'     => 'Supprimer le rôle Contributeur',
						'desc'		=> '<span class="alert">! Attention</span> Action irrémédiable, utilisez <code>remove_cap</code> ou réflechissez avant de faire une bêtise !'
					),
					array(
						'type'      => 'checkbox',
						'label_for' => 'author',
						'label'     => 'Supprimer le rôle auteur',
						'desc'		=> '<span class="alert">! Attention</span> Action irrémédiable, utilisez <code>remove_cap</code> ou réflechissez avant de faire une bêtise !'
					)
				)
			),
		    array(
				'title'     => 'Editeur',
				'id'        => 'custom-editor',
				'prefix'    => 'he-editor',
				'desc'      => 'Ajouter des capacités aux Editeurs',
				'fields'    => array(
					array(
						'type'      => 'checkbox',
						'label_for' => 'theme',
						'label'     => 'Activer l\'accès aux composants (apparence, theme, widget, menu)'
					),
					array(
						'type'      => 'checkbox',
						'label_for' => 'user',
						'label'     => 'Activer la gestion des utilisateurs'
					)
				)
			)
		);

		// création de la page
		$heCustomSettings = new He_Add_Admin_Page( 'Customisation wordpress', 'henelia', '[He] Custom WP', 'he-custom', $heCustomPage, 'admin', '81', '' );
	}
});
