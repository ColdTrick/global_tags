<?php

static $tags;
if (!isset($tags)) {
	$tags = array();
	
	if ($site_tags = elgg_get_plugin_setting("global_tags", "global_tags")) {
		$site_tags = string_to_tag_array($site_tags);
		$tags = array_merge($tags, $site_tags);
	}
	
	$owner = elgg_get_page_owner_entity();
	if ($owner instanceof ElggGroup) {
		if ($group_tags = get_private_setting($owner->getGUID(), "global_tags")) {
			$group_tags = string_to_tag_array($group_tags);
			$tags = array_merge($tags, $group_tags);
		}
	}
	
	if(!empty($tags)){
		natcasesort($tags);
		?>
			<script type="text/javascript">
				elgg.config.global_tags = ["<?php echo implode("\", \"", $tags); ?>"];
			</script>
		<?php
	}
}