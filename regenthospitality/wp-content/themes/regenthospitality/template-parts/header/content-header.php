<header class="navbar">
    <div class="container navinner">
        <a class="brand" href="<?php echo site_url(); ?>" aria-label="Global Internship Portal home">
            <?php
            $custom_logo_id = get_theme_mod('custom_logo');
            $image          = wp_get_attachment_image_src($custom_logo_id, 'full');
            ?>
            <img src="<?php echo $image[0]; ?>" alt="logo" class="logo">
        </a>
        <?php if (is_front_page()): ?>
            <nav class="navlinks">
                <a href="#home" data-i18n="navHome">Home</a>
                <a href="#destinations" data-i18n="navDestinations">Destinations</a>
                <a href="#vacancies" data-i18n="navVacancies">Vacancies</a>
                <a href="#how" data-i18n="navHow">How it works</a>
            </nav>
        <?php else: ?>
            <nav class="navlinks">
                <a href="<?php echo home_url(); ?>#home" data-i18n="navHome">Home</a>
                <a href="<?php echo home_url(); ?>#destinations" data-i18n="navDestinations">Destinations</a>
                <a href="<?php echo home_url(); ?>#vacancies" data-i18n="navVacancies">Vacancies</a>
                <a href="<?php echo home_url(); ?>#how" data-i18n="navHow">How it works</a>
            </nav>
        <?php endif; ?>
        <div class="navactions">
            <select class="lang" id="language" aria-label="Choose language">
                <option value="en">EN · English</option>
                <option value="np">NP · नेपाली</option>
            </select>
            <?php if (is_front_page()): ?>
                <a class="btn btn-primary" href="#vacancies" data-i18n="navApply">Find an internship</a>
            <?php else: ?>
                <a class="btn btn-primary" href="<?php echo home_url(); ?>#vacancies" data-i18n="navApply">Find an internship</a>
            <?php endif; ?>
            <button class="menu-toggle" id="menuToggle" aria-label="Open menu">☰</button>
        </div>

        <?php if (is_front_page()): ?>
            <nav class="mobile-menu" id="mobileMenu">
                <a href="#home" data-i18n="navHome">Home</a>
                <a href="#destinations" data-i18n="navDestinations">Destinations</a>
                <a href="#vacancies" data-i18n="navVacancies">Vacancies</a>
                <a href="#how" data-i18n="navHow">How it works</a>
            </nav>
        <?php else: ?>
            <nav class="mobile-menu" id="mobileMenu">
                <a href="<?php echo home_url(); ?>#home" data-i18n="navHome">Home</a>
                <a href="<?php echo home_url(); ?>#destinations" data-i18n="navDestinations">Destinations</a>
                <a href="<?php echo home_url(); ?>#vacancies" data-i18n="navVacancies">Vacancies</a>
                <a href="<?php echo home_url(); ?>#how" data-i18n="navHow">How it works</a>
            </nav>
        <?php endif; ?>
    </div>
</header>