<footer>
    <?php
        wp_nav_menu([
            'theme_location' => 'footer',
        ]);
    ?>
    <span>Tous droits réservés</span>
</footer>

<?php get_template_part( 'templates_part/modale'); ?>
<?php wp_footer(); ?>
</body>
</html>