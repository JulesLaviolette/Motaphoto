<?php 
$categories = get_the_terms(get_the_ID(), 'categorie'); 
$ref = get_field('reference');
?>
<div class="galerie__photo">
    <img src="<?php echo get_the_post_thumbnail_url(); ?>">
    <div class="survol">
        <a href="<?php the_permalink() ?>"><img class="eye" src="<?php echo get_template_directory_uri() ?>/medias/eye.png"></a>
        <img class="fullscreen" data-ref="<?php echo $ref?>" data-cat="<?php foreach($categories as $categorie) {echo $categorie->name;} ?>" data-img="<?php echo get_the_post_thumbnail_url(); ?>" src="<?php echo get_template_directory_uri() ?>/medias/fullscreen.png">
    </div>
</div>