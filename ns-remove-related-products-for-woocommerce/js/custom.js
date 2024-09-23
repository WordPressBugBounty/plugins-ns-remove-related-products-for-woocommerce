jQuery(document).ready(function($){
	$('#ns-remove-related-notice button.ns-notice-dismiss').click(function() {
		$.ajax({
			url : nsdismissremoverelated.ajax_url,
			type : 'post',
			data : {
				action : 'ns_dismiss_remove_related_ajax'
			},
			success : function( response ) {
				$('#ns-remove-related-notice').fadeOut();
			}
		});		
	});
});