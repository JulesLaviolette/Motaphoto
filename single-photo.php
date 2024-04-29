<?php
/**
 * Template part for displaying posts
 */

?>
<?php 
$ref = get_field('reference');
$type = get_field('type');
$categories = get_the_terms(get_the_ID(), 'categorie');
$formats = get_the_terms(get_the_ID(), 'format');
$date = get_post()->post_date;
$next = get_next_post();
$previous = get_previous_post();
?>
<?php get_header(); ?>

<article class="Post page">
	<div class="Post__content">

		<div class="Post__info">
		<?php the_title( '<h1 class="Post__title">', '</h1>' ); ?>
			<p>RÉFÉRENCE : <?php echo $ref; ?></p>
			<p>CATÉGORIE : <?php foreach($categories as $categorie) {echo $categorie->name;} ?></p>
			<p>FORMAT : <?php foreach($formats as $format) {echo $format->name;} ?></p>
			<p>TYPE : <?php echo $type; ?></p>
			<p>ANNÉE : <? echo get_the_date( 'Y'); ?></p>
		</div>
		<div class="survol__single">
			<span class="Post__image"><?php echo get_the_post_thumbnail();?></span>
			<div class="survol">
				<img class="fullscreen" data-ref="<?php echo $ref?>" data-cat="<?php foreach($categories as $categorie) {echo $categorie->name;} ?>" data-img="<?php echo get_the_post_thumbnail_url(); ?>" src="<?php echo get_template_directory_uri() ?>/medias/fullscreen.png">
			</div>
		</div>

	</div>
	<div class="Post__nav">

		<p>Cette photo vous intéresse ?</p>

		<span class="Post__contact modale__bouton" data-ref="<?php echo $ref;?>">Contact</span>

		<div class="Post__arrow">
			<div class="Post__arrow-thumbnail">
				<img id="Post__preview-previous" src="<?php echo get_the_post_thumbnail_url($previous, 'thumbnail'); ?>">
				<img id="Post__preview-next" src="<?php echo get_the_post_thumbnail_url($next, 'thumbnail'); ?>">
				<img id="Post__preview" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'); ?>">
			</div>
			<div>
				<a class="Post__arrow-left" href="<?php echo get_page_link($previous->ID); ?>"></a>
				<a class="Post__arrow-right" href="<?php echo get_page_link($next->ID);?>"></a>
			</div>
		</div>

	</div>
</article>
<div class="Post__suggest page">

	<h2>VOUS AIMEREZ AUSSI</h2>

	<?php 

$args= array(

			'posts_per_page' => 2, 

			'post_type' => 'photo',

			'post__not_in' => array(get_the_ID(),),

			'tax_query' => [
				array(
				'taxonomy' => 'categorie',
				'field'    => 'slug',
				'terms'    => $categorie->name,
				)
			]
		);


?>

	<div class="Post__suggest-image">
		<?php

		$photo_block = new WP_Query($args);

		while ($photo_block->have_posts()) :
		$photo_block->the_post();

		

		?>

		<?php get_template_part('templates_part/photo_block'); ?>


		<?php

		endwhile;

		?>
	</div>
</div>
<?php get_footer(); ?>
