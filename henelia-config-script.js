/**
*
* Scripts spécifique au Plugin.
* Poru des fonctionnalités de personnalisation voir le scripts du module Custom
*
*
**/


jQuery(document).ready(function() {
	
	// Gestion des lignes d'entête dans les formulaires du plugin
	jQuery('input[heading="true"]').each(function() {
		jQuery(this).parents('tr').addClass('js-he-form-heading');
	});

	// Gestion des lignes de sous niveau dans les formulaires du plugin
	jQuery('input[sublevel="true"]').each(function() {
		jQuery(this).parents('tr').addClass('js-he-form-sublevel');
	});

});