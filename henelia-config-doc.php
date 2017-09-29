<?php

/**
*
* Construction de la page de documentation à destination des Développeurs
*
*
**/

	function he_admin_page_doc(){
?>
	<div class="wrap he-doc">
		<h1>Henelia Documentation</h1>
		<h2>Retrouver ici toutes la documentation du theme et des plugins Henelia</h2>
		<p>La documentation est en évolution constante, pensez à regarder souvent.</p>
		<hr/>
		<h3>Bureau des réclamations</h3>
		<p>Vous avez des demandes d'évolutions, vous découvrer un bugs, remonté tous ca au <a href="https://docs.google.com/spreadsheets/d/1hLmFOMP4f2ZO93TpYF72_gR9h3CzkxMtCWUSPJF3DdQ/edit?usp=sharing" target="_blank" class="button button-primary">bureau des réclamations</a>.</p>
		<hr/>
		<h2>Github</h2>
		<p>Pour installer les plugins, thèmes, ... [He]nelia, voir les documentations, les commit et peut etre contribuer aux évo c'est ici :</p>
		
		<p>
		<a href="https://github.com/henelia" target="_blank" class="button button-primary">Github</a>&nbsp;&nbsp;&nbsp;
		<a href="https://github.com/henelia/heneliaWP" target="_blank" class="button button-secondary">Henelia WP theme</a>&nbsp;&nbsp;&nbsp;
		<a href="https://github.com/henelia/henelia-config" target="_blank" class="button button-secondary">Henelia config - Plugins</a>
		</p>
		<hr/>
		<h2>Sécurité</h2>
		<p>Vous pouvez optimiser la sécurité de votre thème, mais à l'installation de ce plugin ces options sont activé :</p>
		<ul>
			<li>- Bloquer l'éditeur de texte</li>
			<li>- Bloquer l'affichage de message d'erreur sur la login-page</li>
			<li>- Suppression de la version de Wordpress</li>
			<li>- Suppression de la possibilité de faire des mises à jour pour les utilisateurs</li>
			<li>- Nettoyage des assets et meta chargé par Wordpress</li>
		</ul>
		<hr/>
		<h3>Class & Fonctions pratique</h3>

		<div class="he-doc-block">
			<h4>Fonction de test</h4>
			<p>La fonction "he_var();" permet d'afficher un tableau ou un object côté front, rien de mieux pour tester ce que vous faites</p>
			<div class="he-doc-code">
				<code>he_var($valeurATester);</code>
			</div>
		</div>

		<div class="he-doc-block">
			<h4>Class de création d'admin-page & custom Field</h4>
			<p>A rédiger cf plugin henelia-config/class/class-add-custom-admin.php</p>
		</div>

		<div class="he-doc-block">
			<h4>Class de création de gestion des capacités editeurs</h4>
			<p>A rédiger cf plugin henelia-config/class/class-user-role.php</p>
		</div>
	</div>
<?php } ?>