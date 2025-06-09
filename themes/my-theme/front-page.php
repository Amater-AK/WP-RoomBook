<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo("charset") ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class("min-h-svh grid grid-rows-[auto_1fr_auto]"); ?>>
    <?php get_template_part("template-parts/header") ?>

    <main>
        <section
            class="flex items-center h-full bg-center bg-no-repeat bg-cover"
            style="background-image: url(<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), "full")) ?>)"
        >
            <div class="content-wrapper grid md:grid-cols-2">

                <?php if(have_posts()) : the_post() ?>
                    <div class="grid justify-items-start gap-4 px-6 py-8 text-xl bg-white/90 rounded-md">
                        <?php the_content(); ?>
                        <a class="button" href="<?php echo esc_url(get_post_type_archive_link("mmup_rooms")); ?>">Choose a Room</a>
                    </div>
                <?php endif; ?>
                
            </div>
        </section>
    </main>

    <?php get_template_part("template-parts/footer") ?>

    <?php wp_footer(); ?>
</body>
</html>