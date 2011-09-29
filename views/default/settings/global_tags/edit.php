<?php
	echo elgg_echo('global_tags:settings:tags') . "<br />";
	echo elgg_view("input/text", array("internalname" => "params[global_tags]", "value" => $vars["entity"]->global_tags)); 