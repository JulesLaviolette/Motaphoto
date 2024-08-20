<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <?php wp_head();?>
    </head>
<body>
<header>
    <img src="<?php echo get_stylesheet_directory_uri() ?>/medias/logo.png">
    <span class="navmobile__bouton"></span>
    <nav>
        <?php
            wp_nav_menu([
                'theme_location' => 'main-menu',
            ]);
        ?>
        <span class="modale__bouton" >Contact</span>
    </nav>
    <div class="navmobile">
            <?php
                wp_nav_menu([
                    'theme_location' => 'main-menu',
                ]);
            ?>
            <span class="modale__bouton" >Contact</span>
</div>
</header>

