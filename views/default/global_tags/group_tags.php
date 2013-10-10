<?php
	
	$group = $vars["entity"];
	if ($group) {
		$tags = $group->getPrivateSetting("global_tags");
		
		$form_body = "<div>" . elgg_echo("global_tags:group:tags") . "<br />";
		$form_body .= elgg_view("input/text", array("name" => "global_tags", "value" => $tags));
		$form_body .= "</div>";
		
		$form_body .= elgg_view("input/hidden", array("name" => "guid", "value" => $group->getGUID()));
		$form_body .= elgg_view("input/submit", array("value" => elgg_echo("save")));
		
		$form = elgg_view("input/form", array("action" => "action/global_tags/group", "body" => $form_body));
		
		echo elgg_view_module("info", elgg_echo("global_tags:group:title"), $form);
	}