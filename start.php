<?php

	function global_tags_init(){
		elgg_extend_view("js/elgg", "global_tags/js/site");
		elgg_extend_view("css/elgg", "global_tags/css/site");
		
		elgg_extend_view("groups/edit", "global_tags/group_tags");
		elgg_extend_view("input/tags", "global_tags/input");
	}

	elgg_register_event_handler("init", "system", "global_tags_init");
	
	elgg_register_action("global_tags/group", dirname(__FILE__) . "/actions/group.php");
	