<?php

/**
*
* * Construction de la page de personnalisation du TinyMCE
*
*
**/

add_action('plugins_loaded', function() {

	/*----------  Valeurs par défaut  ----------*/

	// si l'option n'existe pas
	if ( !get_option( 'he-tinymce-option' ) ) {

		$optionsValues = array(
			'tinymce-media'			=> '1',
			'tinymce-quicktags'		=> '1',
			'tinymce-rows'			=> '6',
			'tinymce-toolbar1'		=> 'fullscreen,undo,redo,removeformat,|,formatselect,bullist,numlist,blockquote,|,bold,italic,strikethrough,superscript,charmap,|,alignleft,aligncenter,alignright,outdent,indent,|,link,unlink,|,media',
			'tinymce-toolbar2'		=> '',
			'tinymce-block'			=> 'Paragraph=p;Heading 2=h2;Heading 3=h3',
			'tinymce-visualblocks'	=> '1',
			'tinymce-paste'			=> '1',
		);

		add_option( 'he-tinymce-option', $optionsValues ,'', 'no');

	}

	if( class_exists('He_Add_Admin_Page') ) {

		$heTinyMCEPage = array(
		    array(
		        'title'     => 'TinyMCE',
		        'id'        => 'wp-config-tinymce',
		        'desc'      => 'Configuration par défaut.',
		        'prefix'    => 'tinymce',
		        'fields'    => array(
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'media',
		                'label'     => 'Ajouter des médias'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'quicktags',
		                'label'     => 'Mode texte'
		            ),
		            array(
		                'type'      => 'text',
		                'label_for' => 'rows',
		                'label'     => 'Nombre de ligne',
		                'css'       => 'width:5em'
		            ),
		            array(
		                'type'      => 'text',
		                'label_for' => 'toolbar1',
		                'label'     => 'Barre d\'outils 1',
		                'desc'		=> 'Toutes les options de Buttons/Controls sont ici : <a href="https://www.tinymce.com/docs-3x/reference/buttons/" target="_blank">https://www.tinymce.com/docs-3x/reference/buttons/</a>. Attention cette API n\'est pas intégralement utilisée par wordpress, donc bien vérifier la fonctionnalité',
		                'css'       => 'width:100%'
		            ),
		            array(
		                'type'      => 'text',
		                'label_for' => 'toolbar2',
		                'label'     => 'Barre d\'outils 2',
		                'css'       => 'width:100%'
		            ),
		            array(
		                'type'      => 'text',
		                'label_for' => 'block',
		                'label'     => 'Type de blocs',
		                'css'       => 'width:100%'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'visualblocks',
		                'label'     => 'Afficher les blocs'
		            ),
		            array(
		                'type'      => 'checkbox',
		                'label_for' => 'paste',
		                'label'     => 'Coller comme texte'
		            )
		        )
		    )
		);

		// création de la page
		$heTinyMCESettings = new He_Add_Admin_Page( 'Customisation du TinyMCE', 'henelia', '[He] TinyMCE', 'he-tinymce', $heTinyMCEPage, 'admin', '81', '' );
	}

}); // FIN add_action(plugins_loaded)
