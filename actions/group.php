<?php

	$guid = (int) get_input("guid");
	$global_tags = get_input("global_tags", "");
	
	if ($guid) {
		$group = get_entity($guid);
		if ($group instanceof ElggGroup) {
			if ($group->canEdit()) {
				$group->setPrivateSetting("global_tags", $global_tags);
				system_message(elgg_echo("global_tags:action:group:save"));
			}
			
			forward($group->getURL());
		}
	}
	