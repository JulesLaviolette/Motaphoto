<?php
function register_my_menus() {
    register_nav_menus(
      array(
        'main-menu' => 'Menu-principal',
        'footer' => 'Footer',
      ));
}
add_action( 'after_setup_theme', 'register_my_menus');


function theme_enqueue_styles() {
    wp_enqueue_script( 'motascript', get_template_directory_uri() . '/script.js', array( 'jquery' ), '1.0');
    wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css', array(), '1.0' );
    wp_enqueue_script('lightbox', get_template_directory_uri() . '/lightbox.js', array(), '1.0', true);
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles');

function weichie_load_more()
{
  $categorie = $_POST['categorie'];
  $format = $_POST['format'];
  $ordre = $_POST['ordre'];
  $args= array(
    'post_type' => 'photo',
    'posts_per_page' => 12,
    'orderby' => 'date',
    'order' => $ordre,
    'paged' => $_POST['paged'],
  );
  if (!empty($categorie)) {
    $args['tax_query'][] = array(
      'taxonomy' => 'categorie',
      'field'    => 'slug',
      'terms'    => array($categorie)
    );
  }

  if (!empty($format)) {
    $args['tax_query'][] = array(
      'taxonomy' => 'format',
      'field'    => 'slug',
      'terms'    => array($format)
    );
  }

  $response = '';
  $ajaxposts = new WP_Query($args);

  if ($ajaxposts->have_posts()) {

    while ($ajaxposts->have_posts()) : $ajaxposts->the_post();
      $response .= get_template_part('templates_part/photo_block');
    endwhile;
  } else {
    $response = '';
  }


  exit;
}
add_action('wp_ajax_weichie_load_more', 'weichie_load_more');
add_action('wp_ajax_nopriv_weichie_load_more', 'weichie_load_more');

add_action( 'wp_ajax_nopriv_filter', 'filter_ajax' );
add_action( 'wp_ajax_filter', 'filter_ajax' );

function filter_ajax()
{
  $categorie = $_POST['categorie'];
  $format = $_POST['format'];
  $ordre = $_POST['ordre'];
  $args = array(  
    'post_type' => 'photo',
    'posts_per_page' => 12,
    'orderby' => 'date',
    'order' => $ordre,
  );
  if (!empty($format)) {
    $args['tax_query'][] = array(
      array (
      'taxonomy' => 'format',
      'field'    => 'slug',
      'terms'    => $format,
      )
    );
  }
  
  if (!empty($categorie)) {
    $args['tax_query'][] = array(
      array (
      'taxonomy' => 'categorie',
      'field'    => 'slug',
      'terms'    => $categorie,
      )
    );
  }

  $ajaxposts = new WP_Query($args);
  if ($ajaxposts->have_posts()) {

    while ($ajaxposts->have_posts()) : $ajaxposts->the_post();
      $response .= get_template_part('templates_part/photo_block');
    endwhile;
  } else {
    $response = '';
  }


  exit;
}
