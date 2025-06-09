<?php
    $room_slug = get_query_var("room", null);

    $query_args = [
        "post_type" => "mmup_rooms",
        "posts_per_page" => -1,
        "meta_key" => "availability",
        "meta_value" => "true"
    ];
    $posts = get_posts($query_args);
    $posts_data = [];
    foreach($posts as $post) {
        $posts_data[$post->post_name] = $post->post_title;
    }
?>

<form method="POST" action="<?php echo esc_url(admin_url("admin-post.php")); ?>">
    <input type="hidden" name="action" value="handle_booking">
    <?php wp_nonce_field("booking_form", "booking_nonce"); ?>

    <div class="grid [grid-template-areas:'room'_'date'_'time'_'email'_'button'] md:grid-cols-2 md:[grid-template-areas:'room_room'_'date_time'_'email_email'_'button_button'] gap-2">
        <div class="input-block [grid-area:room]">
            <label for="room">Room</label>
            <select class="input" name="room" id="room" required>

                <?php if(!$room_slug) : ?>
                    <option value="" selected>-- Select a room --</option>
                <?php endif; ?>

                <?php foreach($posts_data as $post_name => $post_title) : ?>
                    <option value="<?php echo esc_attr($post_name) ?>" <?php echo $post_name === $room_slug ? "selected" : "" ?>><?php echo esc_html($post_title); ?></option>
                <?php endforeach; ?>

            </select>
        </div>

        <div class="input-block [grid-area:date]">
            <label for="date">Date</label>
            <input class="input" type="date" name="date" required>
        </div>

        <div class="input-block [grid-area:time]">
            <label for="time">Time</label>
            <input class="input" type="time" name="time" required>
        </div>

        <div class="input-block [grid-area:email]">
            <label for="email">Email</label>
            <input class="input" type="email" name="email" required>
        </div>

        <button type="submit" class="button justify-self-start [grid-area:button]">Confirm booking</button>
    </div>
</form>