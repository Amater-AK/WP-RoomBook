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
                <h1 class="mb-4 text-2xl font-semibold">All rooms</h1>

                <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2">
                    <?php if(have_posts()) : ?>
                        <?php while(have_posts()) : the_post(); ?>

                            <?php get_template_part("template-parts/room-list-item"); ?>

                        <?php endwhile; ?>
                    <?php else: ?>

                        <p>No rooms.</p>
                        
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </main>

    <?php get_template_part("template-parts/footer") ?>

    <?php wp_footer(); ?>
</body>
</html>