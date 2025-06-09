<?php
    $post_slug = get_post_field("post_name", get_post());

    $image_id = get_field("image");
    $image_src = wp_get_attachment_image_src($image_id, "room-main");
    $image_alt = get_post_meta($image_id, "_wp_attachment_image_alt", true);

    $equpment = get_field("equipment");
    
    $availability = get_field("availability");
    $is_available = $availability["value"] === "true" ? true : false; 
    $room_status = $availability["label"];

    $book_now_url = add_query_arg("room", $post_slug, get_permalink(get_page_by_path("booking")));
?>

<h1 class="mb-4 text-2xl font-semibold"><?php the_title(); ?></h1>
<div class="grid md:grid-cols-2 gap-2 md:gap-4 mb-2">
    <div class="relative h-0 mb-2 pb-[75%] rounded-md overflow-hidden">
        <img
            class="absolute top-0 left-0 w-full h-full object-cover"
            src="<?php echo esc_url($image_src[0]) ?>"
            alt="<?php echo esc_attr($image_alt) ?>"
            loading="lazy"
        >
    </div>
    <div class="space-y-2"><?php the_content(); ?></div>
</div>
<div class="mb-4">
    <p>Capacity: <span class="font-medium"><?php echo esc_html(get_field("capacity")) ?></span></p>
    <p>Equipment: 
        <span class="inline-flex flex-wrap gap-1">
            <?php if(count($equpment)) : ?>
                <?php foreach($equpment as $item) : ?>
                    <span class="inline-block px-2 bg-white rounded-full"><?php echo esc_html($item); ?></span>
                <?php endforeach; ?>
            <?php else : ?>
                No additional equipment
            <?php endif; ?>
        </span>
    </p>
    <p>Availability: <span class="font-medium <?php echo $is_available ? "text-success" : "text-error" ?>"><?php echo esc_html($room_status) ?></span></p>
</div>
<?php if($is_available) : ?>
    <a class="button" href="<?php echo esc_url($book_now_url); ?>">Book Now</a>
<?php endif; ?>
