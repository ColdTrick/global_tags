<?php
	$body = elgg_echo('global_tags:settings:tags') . "<br />";
	$body .= elgg_view("input/text", array("name" => "params[global_tags]", "value" => $vars["entity"]->global_tags));

	echo elgg_view_module("info", "", $body);