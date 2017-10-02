<?php

/**
*
* * Construction de la page d'admin
*
*
**/

add_action( 'admin_menu', 'he_create_admin_page' );
	function he_create_admin_page() {
		
		// Creation de la page
		add_menu_page( 'Henelia Config', '[He] Config', 'manage_options', 'henelia', 'he_admin_page', 'dashicons-schedule', 80  );
		// Enregistrement des options
		add_action( 'admin_init', 'he_admin_page_settings' );


		add_submenu_page( 'henelia', 'Documentation', '[He] Doc', 'manage_options', 'henelia-doc', 'he_admin_page_doc' );

		if ( get_option('he-tuto') )  {
			// Creation de la page Tuto, si l'option est coché (entrée de menu accessible aux utilisateurs qui peut editer un posts = Tous sauf subscriber)
			add_menu_page( 'Henelia Tuto', '[He] Tutoriaux', 'edit_posts', 'he-tuto', 'he_admin_page_tuto', 'dashicons-video-alt3', 80  );
		}
	}

function he_admin_page_settings() {
	register_setting( 'he-admin-page-group', 'he-activate-config' );
	register_setting( 'he-admin-page-group', 'he-tinymce' );
	register_setting( 'he-admin-page-group', 'he-cookie' );
	register_setting( 'he-admin-page-group', 'he-tuto' );
}

function he_admin_page(){
?>
	<div class="wrap he-config-home">
		<h1>Henelia Config</h1>
		<?php settings_errors(); ?>
		<p>Retrouvez ici toutes les configurations pour le theme Henelia, les docs et les plugins Henelia</p>

		<h2>Modules</h2>
		<p>Activez les modules souhaités</p>
		<form method="post" action="options.php" class="he-config-home-form" enctype="multipart/form-data">
			<?php settings_fields( 'he-admin-page-group' ); ?>
			<?php do_settings_sections( 'he-admin-page-group' ); ?>
			<fieldset>
				<div class="he-config-home-modules">
					<div class="he-admin-page-modules-item">
						<input id="he-activate-config" name="he-activate-config" type="checkbox" value="1" <?php echo checked( get_option('he-activate-config'), 1, false );?>/>
						<label for="he-activate-config">
							<h3>Customiser Wordpress</h3>
							<p>Ajout d'un style et d'un script permettant la customisation du thème, personnalisation des options à afficher ou non dans l'administration de Wordpress</p>
							<p><strong>Options</strong></p>
							<ul>
								<li>Style CSS de préformatage de Wordpress, suppression des options inutiles, simplification de l'admin pour l'utilisateur</li>
								<li>Configuration Google : Google Analytics, Recaptcha, ...</li>
								<li>Post type page : gestions des parents, thumbnail, metabox, ...</li>
								<li>Post type page : gestions des parents, thumbnail, metabox, ...</li>
								<li>Post type news : gestions des catégories et tags, thumbnail, metabox, ...</li>
								<li>Roles: desactivation, ...</li>
								<li>Commentaires</li>
							</ul>
						</label>
					</div>

					<div class="he-admin-page-modules-item">
						<input id="he-tinymce" name="he-tinymce" type="checkbox" value="1" <?php echo checked( get_option('he-tinymce'), 1, false );?>/>
						<label for="he-tinymce">
							<div>
								<h3>Customiser TinyMCE</h3>
								<p>Modification des options des wysiwyg tinyMCE, ajout d'options et personnalisation complète</p>
								<p><strong>Options</strong></p>
								<ul>
									<li>Gestion des outils</li>
									<li>Gestion des medias</li>
									<li>Gestion des blocs, titrage, ...</li>
									<li>Options variées</li>
								</ul>
							</div>
						</label>
					</div>

					<div class="he-admin-page-modules-item">
						<input id="he-tuto" name="he-tuto" type="checkbox" value="1" <?php echo checked( get_option('he-tuto'), 1, false );?>/>
						<label for="he-tuto">
							<div>
								<h3>Activation de la page Tutoriaux Vidéos</h3>
								<p>Créer un lien dans le menu d'administration avec des liens vers les Tutoriaux Wordpress produits par Henelia</p>
							</div>
						</label>
					</div>

					<div class="he-admin-page-modules-item">
						<input id="he-cookie" name="he-cookie" type="checkbox" value="1" <?php echo checked( get_option('he-cookie'), 1, false );?>/>
						<label for="he-cookie">
							<div>
								<h3>Activation des cookie</h3>
								<p>Ne pas activer sur les nouveaux sites, le dev est actif dans le thème. N'activer que sur les anciens sites.</p>
							</div>
						</label>
					</div>
				</div>
			</fieldset>

			<?php // submit_button(); ?>
			<p class="submit"><button type="submit" class="button button-primary">Commencez une expérience de douxDingue !</button></p>
		</form>
	</div>
<?php } ?>