<?php

/**
*
* Page des Tutos
* Liste des Tuto Henelia hébergé chez Youtube
*
*
**/

	function he_admin_page_tuto(){
?>
	<div class="wrap he-tuto">
		<h1 class="he-tuto-title">Henelia : Les Tutos du web</h1>
		<img src="data:image/png;base64,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" class="he-tuto-title-img" />
		<p>Henelia met à votre disposition des Tutoriaux.<br/>Vous êtes perdu ?, Vous pouvez retrouver le programme des Tutoriaux, les regarder directement</p>
		
		<!-- Si Vidéos Spécifiques -->
		<?php
		global $heTutoOptions; // Récupération du tableau
		if ( $heTutoOptions['he-tuto-spe-url1'] || $heTutoOptions['he-tuto-spe-url2'] || $heTutoOptions['he-tuto-spe-url3'] ) : ?>
			<h2>Tutoriaux spécifiques</h2>
			<ul class="he-list">
				<!-- Si vidéo 1 -->
				<?php 
					if ( $heTutoOptions['he-tuto-spe-url1'] && $heTutoOptions['he-tuto-spe-title1'] ) :
				?>
					<li class="he-list-item"><a href="<?php echo $heTutoOptions['he-tuto-spe-url1'] ?>" target="_blank" class="button button-primary"><span class="dashicons dashicons-video-alt3"></span></a><span><?php echo $heTutoOptions['he-tuto-spe-title1'] ?></span></li>
				<?php endif; ?>
				<!-- Si vidéo 2 -->
				<?php 
					if ( $heTutoOptions['he-tuto-spe-url2'] && $heTutoOptions['he-tuto-spe-title2'] ) :
				?>
					<li class="he-list-item"><a href="<?php echo $heTutoOptions['he-tuto-spe-url2'] ?>" target="_blank" class="button button-primary"><span class="dashicons dashicons-video-alt3"></span></a><span><?php echo $heTutoOptions['he-tuto-spe-title2'] ?></span></li>
				<?php endif; ?>
				<!-- Si vidéo 3 -->
				<?php 
					if ( $heTutoOptions['he-tuto-spe-url3'] && $heTutoOptions['he-tuto-spe-title3'] ) :
				?>
					<li class="he-list-item"><a href="<?php echo $heTutoOptions['he-tuto-spe-url3'] ?>" target="_blank" class="button button-primary"><span class="dashicons dashicons-video-alt3"></span></a><span><?php echo $heTutoOptions['he-tuto-spe-title3'] ?></span></li>
				<?php endif; ?>
			</ul>	
		<?php endif; ?>
		<h2>Tutoriaux Wordpress</h2>
		<ol class="he-list">
			<li class="he-list-item"><a href="https://youtu.be/dxYnB8I-fJM" target="_blank" class="button button-primary"><span class="dashicons dashicons-video-alt3"></span></a><span>Se connecter à Wordpress</span></li>

			<li class="he-list-item"><a href="" target="_blank" class="button button-disable">Bientôt</a><span>Gestion des utilisateurs</span></li>

			<li class="he-list-item"><a href="" target="_blank" class="button button-disable">Bientôt</a><span>Gestion des Widgets</span></li>
			
			<li class="he-list-item"><a href="" target="_blank" class="button button-disable">Bientôt</a><span>Gestion des Menus</span></li>

			<li class="he-list-item"><a href="" target="_blank" class="button button-disable">Bientôt</a><span>Gestion des Articles</span></li>

			<li class="he-list-item"><a href="" target="_blank" class="button button-disable">Bientôt</a><span>Utiliser l'éditeur de texte</span></li>

			<li class="he-list-item"><a href="" target="_blank" class="button button-disable">Bientôt</a><span>Gestion des Médias</span></li>

			<li class="he-list-item"><a href="" target="_blank" class="button button-disable">Bientôt</a><span>Optimiser le référencement</span></li>

			<li class="he-list-item"><a href="" target="_blank" class="button button-disable">Bientôt</a><span>Bonnes pratiques</span></li>

		</ol>
		<br/>
		<h2>Les astuces</h2>
		<ul class="he-list">
			<li class="he-list-item"><a href="" target="_blank" class="button button-disable">Bientôt</a><span>Analyser vos statistiques Google Analytics</span></li>
			<li class="he-list-item"><a href="" target="_blank" class="button button-disable">Bientôt</a><span>Vider son cache</span></li>
			<li class="he-list-item"><a href="" target="_blank" class="button button-disable">Bientôt</a><span>Optimiser ses images & PDF</span></li>
		</ul>
	</div>
<?php } ?>