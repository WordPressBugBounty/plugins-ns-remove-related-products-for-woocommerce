jQuery( document ).ready(function() {
	racScrollToAnchor('rac-table-anchor');
});


function racScrollToAnchor(aid){
	if (jQuery("a[name='"+ aid +"']").length) {
	    var aTag = jQuery("a[name='"+ aid +"']");
	    jQuery('html,body').scrollTop( aTag.offset().top );
	}
}
