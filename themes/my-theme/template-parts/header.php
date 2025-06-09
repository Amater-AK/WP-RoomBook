<?php get_template_part("template-parts/svg-sprite") ?>

<header class="relative py-4 bg-white overflow-x-clip">
    <div class="content-wrapper">
        <nav>
            <div class="flex justify-between items-center gap-4">
                <div class="text-2xl font-semibold">
                    <a href="<?php echo esc_url(home_url("/")) ?>" title="To home page" aria-label="To home page"><?php bloginfo("name") ?></a>
                </div>

                <button type="button" class="md:hidden p-1 cursor-pointer" data-burger-btn title="Toggle menu" aria-label="Toggle menu">
                    <svg class="w-6 h-6" width="24" height="24" aria-hidden="true">
                        <use href="#icon-menu"></use>
                    </svg>
                </button>

                <div class="hidden md:block" data-primary-menu>
                    <?php
                        wp_nav_menu([
                            "theme_location" => "primary-menu",
                            "container" => false,
                            "menu_class" => "flex items-center gap-4",
                            "fallback_cb" => false,
                            "walker" => new Primary_Walker_Nav_Menu("", "py-1 border-b-[0.25em] border-transparent hover:border-primary-accents active:border-primary-accents transition duration-300")
                        ]);
                    ?>
                </div>
            </div>
        </nav>
    </div>
    <div class="md:hidden absolute top-full left-0 w-full h-[calc(100svh-100%)] p-8 bg-white z-100 translate-x-full [&.active]:translate-x-0 transition-transform duration-300" data-mobile-menu inert>
        <?php
            wp_nav_menu([
                "theme_location" => "mobile-menu",
                "container" => false,
                "menu_class" => "flex flex-col gap-6",
                "fallback_cb" => false,
                "walker" => new Primary_Walker_Nav_Menu("", "py-1 text-xl border-b-[0.25em] border-transparent hover:border-primary-accents active:border-primary-accents transition duration-300")
            ]);
        ?>
    </div>
</header>