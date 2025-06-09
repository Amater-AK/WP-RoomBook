<article class="p-2 bg-white rounded-md">
    <?php
        $post_slug = get_post_field("post_name", get_post());

        $image_id = get_field("image");
        $image_src = wp_get_attachment_image_src($image_id, "room-thumbnail");
        $image_alt = get_post_meta($image_id, "_wp_attachment_image_alt", true);
        
        $availability = get_field("availability");
        $is_available = $availability["value"] === "true" ? true : false; 
        $room_status = $availability["label"];
        
        $book_now_url = add_query_arg("room", $post_slug, get_permalink(get_page_by_path("booking")));
    ?>
    <div class="relative h-0 mb-2 pb-[75%] rounded-md overflow-hidden">
        <img
            class="absolute top-0 left-0 w-full h-full object-cover"
            src="<?php echo esc_url($image_src[0]) ?>"
            alt="<?php echo esc_attr($image_alt) ?>"
            loading="lazy"
        >
    </div>
        <h2 class="text-lg font-semibold whitespace-nowrap text-ellipsis overflow-hidden" title="<?php the_title(); ?>">
        <?php the_title(); ?>
    </h2>

    <div class="mb-2 text-sm">
        <p>Capacity: <span class="font-medium"><?php echo esc_html(get_field("capacity")) ?></span></p>
        <p>Availability: <span class="font-medium <?php echo $is_available ? "text-success" : "text-error" ?>"><?php echo esc_html($room_status) ?></span></p>
    </div>

    <div class="flex gap-2">
        <a class="button" href="<?php echo esc_url(get_permalink()) ?>">View Details</a>
        <?php if($is_available) : ?>
            <a class="button-invert font-medium" href="<?php echo esc_url($book_now_url); ?>">Book Now</a>
        <?php endif; ?>
    </div>
</article>