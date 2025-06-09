<?php

require_once get_theme_file_path("inc/class-primary-walker-nav-menu.php");

function myt_setup() {
    add_theme_support("title-tag");
    add_theme_support("menus");
    add_theme_support("post-thumbnails");
    add_image_size("room-thumbnail", 375, 250, false);
    add_image_size("room-main", 512, 512, false);
    add_image_size("room-full", 9999, 9999, false);
    add_editor_style(get_stylesheet_uri());
}
add_action("after_setup_theme", "myt_setup");

function myt_enqueue_styles() {
    wp_enqueue_style("myt-style", get_stylesheet_uri());
    wp_enqueue_style("myt-style-tailwind", get_theme_file_uri("assets/css/tailwind.css"));
}
add_action("wp_enqueue_scripts", "myt_enqueue_styles");

function myt_enqueue_scripts() {
    wp_enqueue_script("myt-script", get_theme_file_uri("assets/js/script.js"), [], wp_get_theme()->get("Version"), ["strategy" => "defer"]);
}
add_action("wp_enqueue_scripts", "myt_enqueue_scripts");

function myt_register_menus() {
    register_nav_menus([
            "primary-menu" => __("Primary menu"),
            "mobile-menu" => __("Mobile menu")
        ]);
    }
add_action("init", "myt_register_menus");

function myt_register_query_vars($qvars) {
    $qvars[] = "room";
    return $qvars;
}
add_filter("query_vars", "myt_register_query_vars");

function myt_handle_booking_form() {
    if (!isset($_POST["booking_nonce"]) || !wp_verify_nonce($_POST["booking_nonce"], "booking_form")) {
        wp_die("Security error!");
    }

    $room = sanitize_text_field($_POST["room"] ?? "");
    $date = sanitize_text_field($_POST["date"] ?? "");
    $time = sanitize_text_field($_POST["time"] ?? "");
    $email = filter_var($_POST["email"] ?? "", FILTER_VALIDATE_EMAIL);

    // Do things

    wp_redirect(home_url("/booking-result"));
    exit;
}
add_action("admin_post_nopriv_handle_booking", "myt_handle_booking_form");
add_action("admin_post_handle_booking", "myt_handle_booking_form");