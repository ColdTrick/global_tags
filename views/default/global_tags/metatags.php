<?php
	global $autocomplete_js_loaded;
	global $CONFIG;

	$tags = array();
	
	if($site_tags = get_plugin_setting("global_tags", "global_tags")){
		$site_tags = string_to_tag_array($site_tags);
		$tags = array_merge($tags, $site_tags);
		
	}
	
	$owner = page_owner_entity();
	if($owner instanceof ElggGroup){
		if($group_tags = get_private_setting($owner->getGUID(), "global_tags")){
			$group_tags = string_to_tag_array($group_tags);
			$tags = array_merge($tags, $group_tags);
		}
	}
	
	if(!empty($tags)){
		natcasesort($tags);
		 	
		if (!isset($autocomplete_js_loaded)) {
			$autocomplete_js_loaded = false;
		}
		
		if (!$autocomplete_js_loaded) {
			$autocomplete_js_loaded = true;
			?>
			<script type="text/javascript" src="<?php echo $vars["url"]; ?>vendors/jquery/jquery.autocomplete.min.js"></script>
			<?php
		}
	?>
	<script type="text/javascript">
	
		var global_tags = ["<?php echo implode("\", \"", $tags); ?>"];
		
		$(document).ready(function(){
			$('input.input-tags').autocomplete(global_tags, {
				mustMatch: false,
				matchContains: true,
				multiple: true,
				minChars: 0,
				multipleSeparator: ","
			});
		});
	</script>
<?php 
	}