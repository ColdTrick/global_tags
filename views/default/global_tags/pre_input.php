<?php
$guid = (int) get_input("guid");
$entity = false;

if ($guid) {
	$entity = get_entity($guid);
}

$page_owner = elgg_get_page_owner_entity();

if (elgg_instanceof($page_owner, "group") && !elgg_instanceof($entity, "object") && empty($vars["value"])) {
	if (elgg_in_context("events") || elgg_in_context("blog") || elgg_in_context("file") || elgg_in_context("pages") ||	elgg_in_context("bookmarks")) {
		// add the default group defined new content tags
		$new_content_tags = $page_owner->getPrivateSetting("new_content_tags");
		if ($new_content_tags) {
			$vars["value"] = $new_content_tags;
		}
	}
}