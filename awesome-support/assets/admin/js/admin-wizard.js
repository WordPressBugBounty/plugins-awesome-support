jQuery(document).ready(function(){
	jQuery('#wpas-skip-wizard').on( 'click', function() {
		jQuery.ajax({
			url : WPAS_Wizard.ajax_url,
			type : 'post',
			data : {
				action : 'wpas_skip_wizard_setup',
				skip_wizard : true,
				nonce: WPAS_Wizard.nonce,
			},
			success : function( response ) {
				/** 
				 * We only added new option for skipping wizard
				 * On success, simply refresh the page, or redirect to about?
				*/
				window.location = WPAS_Wizard.about_page;
			}
		});
	});
});