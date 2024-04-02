<div class="galerie__photo">
    <img data-format="<?php echo $format->name; ?>"  src="<?php echo get_the_post_thumbnail_url(); ?>">
    <div class="survol">
        <a href="<?php the_permalink() ?>"><img class="eye" src="<?php echo get_template_directory_uri() ?>/medias/eye.png"></a>
        <img class="fullscreen" data-id="<?php echo get_the_ID();?>" src="<?php echo get_template_directory_uri() ?>/medias/fullscreen.png">
    </div>
</div>