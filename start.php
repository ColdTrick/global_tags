<?php 

	function global_tags_init(){
		
		elgg_extend_view("metatags", "global_tags/metatags");	
		elgg_extend_view("forms/groups/edit", "global_tags/group_tags");	
	}

	register_elgg_event_handler("init", "system", "global_tags_init");
	
	register_action("global_tags/group", false, dirname(__FILE__) . "/actions/group.php");
	