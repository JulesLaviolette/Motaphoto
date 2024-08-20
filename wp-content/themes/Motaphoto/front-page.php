<?php get_header(); ?>
<div class="hero">
<?php $categories = get_categories(array('taxonomy' => 'categorie')); ?>
<?php $formats = get_categories(array('taxonomy' => 'format')); ?>
    <?php
    $hero = array(
        'post_type' => 'photo',
        'posts_per_page' => 1,
        'orderby' => 'rand'
    );

    $random_post = new WP_Query ( $hero );

    while ($random_post->have_posts()) :
        $random_post->the_post();
        
          
        
        ?>
        
       <img class="hero__img" src="<?php echo get_the_post_thumbnail_url(); ?>">
        
        
        <?php
        
        endwhile;
    ?>

    <img class="hero__title" src="<?php echo get_template_directory_uri() ?>/medias/titre.png">

</div>

<div class="tri page">
        <ul class="tri__list tri__filter-cat">
            <li id="cat" class="tri__filter tri__filter__arrow-closed" data-cat="">CATÉGORIES</li>
            <?php foreach($categories as $cat) : ?>
                <li class="tri__filter tri__filter-hide cat" data-cat="<?=$cat->slug; ?>"><?= $cat->name ?></li>
            <?php endforeach ?>
        </ul>
        <ul class="tri__list tri__filter-format">
            <li id="form" class="tri__filter tri__filter__arrow-closed" data-form="">FORMATS</li>
            <?php foreach($formats as $form) : ?>
                <li class="tri__filter tri__filter-hide form" data-form="<?=$form->slug; ?>"><?= $form->name ?></li>
            <?php endforeach ?>
        </ul>
        <ul class="tri__list">
            <li id="ordre" class="tri__filter tri__filter__arrow-closed" data-ordre="">TRIER PAR</li>
            <li class="tri__filter tri__filter-hide ordre" data-ordre="ASC">ANCIENNES</li>
            <li class="tri__filter tri__filter-hide ordre" data-ordre="DESC">RÉCENTES</li>
        </ul>         
</div>


<?php 

$args= array(

			'posts_per_page' => 12, 

			'post_type' => 'photo',
            'orderby' => 'date',
            'order' => 'DESC',
            'paged' => 1,

			);

?>
<?php

$photo_block = new WP_Query($args);
if($photo_block->have_posts()) :?>
    <div class="galerie page">
    <?php while ($photo_block->have_posts()) :
    $photo_block->the_post();

?>

<?php get_template_part('templates_part/photo_block'); ?>


<?php

endwhile;

?>

</div>
<?php endif; ?>

<div class="load_more">
    <p>Charger plus</p>
</div>
<?php get_footer(); ?>