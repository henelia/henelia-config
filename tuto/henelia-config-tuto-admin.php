<?php

/**
*
* * Construction de la page de personnalisation des Tutoriaux vidéos
*
*
**/

add_action('plugins_loaded', function() {

	// si l'option n'existe pas
	if ( !get_option( 'he-tuto-admin-option' ) ) {

		$optionsValues = array(
			'he-tuto-best-practice'		=> '1',
			'he-tuto-seo'				=> '1',
			'he-tuto-media'				=> '1',
		);

		add_option( 'he-tuto-admin-option', $optionsValues ,'', 'no');

	}


	if( class_exists('He_Add_Admin_Page') ) {

		$heCustomPage = array(
			array(
		        'title'     => 'Activation des Tutos',
		        'id'        => 'tuto-generique',
		        'desc'      => 'Cochez les tutoriaux que vous souhaitez rendre visible aux éditeurs',
		        'prefix'    => 'he-tuto',
		        'fields'    => array(
		            array(	// FAIT
		                'type'      => 'checkbox',
		                'label_for' => 'user',
		                'label'     => 'Gestion des utilisateurs'
		            ),
		            array(	// FAIT
		                'type'      => 'checkbox',
		                'label_for' => 'widget',
		                'label'     => 'Gestion des widgets'
		            ),
		            array(	// FAIT
		                'type'      => 'checkbox',
		                'label_for' => 'menu',
		                'label'     => 'Gestion des menus'
		            ),
		            array(	// FAIT
		                'type'      => 'checkbox',
		                'label_for' => 'post',
		                'label'     => 'Gestion des articles'
		            ),
		            array(	// FAIT
		                'type'      => 'checkbox',
		                'label_for' => 'editor',
		                'label'     => 'Utiliser l\'éditeur de texte'
		            ),
		            array(	// FAIT
		                'type'      => 'checkbox',
		                'label_for' => 'media',
		                'label'     => 'Gestion des médias'
		            ),
		            array(	// FAIT
		                'type'      => 'checkbox',
		                'label_for' => 'seo',
		                'label'     => 'Optimiser le référencement'
		            ),
		            array(	// FAIT
		                'type'      => 'checkbox',
		                'label_for' => 'best-practice',
		                'label'     => 'Bonnes pratiques'
		            )
		        )
		    ),
		    array(
		        'title'     => 'Tutoriaux spécifiques',
		        'id'        => 'tuto-spe',
		        'prefix'    => 'he-tuto-spe',
		        'fields'    => array(
		            array( // FAIT
		                'type'      => 'text',
		                'label_for' => 'title1',
		                'label'     => 'Tuto 1 : Titre'
		            ),
		            array( // FAIT
		                'type'      => 'text',
		                'label_for' => 'url1',
		                'label'     => 'Tuto 1 : URL',
		                'attr'		=> 'sublevel="true"'
		            ),
		            array( // FAIT
		                'type'      => 'text',
		                'label_for' => 'title2',
		                'label'     => 'Tuto 2 : Titre'
		            ),
		            array( // FAIT
		                'type'      => 'text',
		                'label_for' => 'url2',
		                'label'     => 'Tuto 2 : URL',
		                'attr'		=> 'sublevel="true"'
		            ),
		            array( // FAIT
		                'type'      => 'text',
		                'label_for' => 'title3',
		                'label'     => 'Tuto 3 : Titre'
		            ),
		            array( // FAIT
		                'type'      => 'text',
		                'label_for' => 'url3',
		                'label'     => 'Tuto 3 : URL',
		                'attr'		=> 'sublevel="true"'
		            )
		        )
		    )
		);

		// création de la page
		$heCustomSettings = new He_Add_Admin_Page( 'Tutoriaux wordpress', 'henelia', '[He] Tuto', 'he-tuto-admin', $heCustomPage, 'admin', '81', '' );
	}
});
