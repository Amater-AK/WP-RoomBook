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
        <section class="py-4">
            <div class="content-wrapper">
                <?php if(have_posts()) : the_post(); ?>

                    <?php get_template_part("template-parts/room-details") ?>
                    
                <?php endif; ?>
            </div>
        </section>
    </main>

    <?php get_template_part("template-parts/footer") ?>

    <?php wp_footer(); ?>
</body>
</html>