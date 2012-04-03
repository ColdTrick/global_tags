<?php ?>
//<script>

elgg.provide("elgg.global_tags");

elgg.global_tags.init = function() {
	if(elgg.config.global_tags){
		$('input.elgg-input-tags')
			.bind("keydown", function(event) {
				if (event.keyCode === $.ui.keyCode.TAB && $(this).data( "autocomplete" ).menu.active ) {
					event.preventDefault();
				}
			})
			.autocomplete({
				minLength: 0,
				source: function(request, response) {
					// delegate back to autocomplete, but extract the last term
					response($.ui.autocomplete.filter(elgg.config.global_tags, request.term.split(/,\s*/).pop()));
				},
				focus: function() {
					// prevent value inserted on focus
					return false;
				},
				select: function(event, ui) {
					var terms = this.value.split(/,\s*/);
					// remove the current input
					terms.pop();
					// add the selected item
					terms.push( ui.item.value );
					// add placeholder to get the comma-and-space at the end
					terms.push( "" );
					this.value = terms.join( ", " );
					return false;
				}
			});
	}
};

elgg.register_hook_handler('init', 'system', elgg.global_tags.init);