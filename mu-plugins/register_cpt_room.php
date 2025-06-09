<?php

/*
	Plugin Name: Register Room Post Type
*/

// ! After change flush permalinks

if(!defined("ABSPATH")) {
	exit; // Exit if accessed directly
}

function mmup_register_rooms_post_type() {
	$labels = [
		"name" => "Rooms",
		"singular_name" => "Room",
		"add_new" => "Add room",
		"add_new_item" => "Add new room",
		"edit_item" => "Edit room",
		"new_item" => "New room",
		"view_item" => "View room",
		"search_items" => "Search room",
		"not_found" => "Room not found",
	];
	$args = [
		"labels" => $labels,
		"public" => true,
		"has_archive" => true,
		"menu_icon" => "dashicons-video-alt",
		"supports" => ["title", "editor", "thumbnail", "custom-fields"],
		"rewrite" => ["slug" => "rooms"],
		"show_in_rest" => true,
	];
	
	register_post_type("mmup_rooms", $args);
}
add_action("init", "mmup_register_rooms_post_type");