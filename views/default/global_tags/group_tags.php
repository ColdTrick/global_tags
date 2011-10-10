<?php
	$group = $vars["entity"];
	if($group){
		$tags = get_private_setting($group->getGUID(), "global_tags");
		
		$form_body = "<h3 class='settings'>" . elgg_echo("global_tags:group:title") . "</h3>";
		$form_body .= "<div>" . elgg_echo("global_tags:group:tags") . "<br />";
		$form_body .= elgg_view("input/text", array("internalname" => "global_tags", "value" => $tags));
		$form_body .= "</div>";
		
		$form_body .= elgg_view("input/hidden", array("internalname" => "guid", "value" => $group->getGUID()));
		$form_body .= elgg_view("input/submit", array("value" => elgg_echo("save")));
		
		$form = elgg_view("input/form", array("action" => $vars["url"] . "action/global_tags/group", "body" => $form_body));
		
		echo elgg_view("page_elements/contentwrapper", array("body" => $form));
	}