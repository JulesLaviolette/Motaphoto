<?php
function register_my_menu() {
    register_nav_menu( 'main-menu' , 'Menu-principal');
}
add_action( 'after_setup_theme', 'register_my_menu');


add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles() {
    wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css', array(), '1.0' );
    wp_enqueue_script( 'motascript', get_template_directory_uri() . '/script.js', array( 'jquery' ), 1.0);

}
