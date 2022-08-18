<?php 
/* Template Name: Resto */
get_header(); ?>

<!-- Page Content -->
<section class="facilties section-padding">
        <div class="container">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>            
            <?php the_content(); ?>
            <?php if (get_field('name_button')) { ?>
                <div class="text-center"><a href="<?php the_field('link_button'); ?>" class="btn-medium btn btn-main"><?php the_field('name_button'); ?></a></div>
            <?php } ?>
            
        <?php endwhile; endif; ?>    
        </div>
</section>

<?php if( have_rows('gallery') ): ?>
 <section class="bg-grey">
    <div class="container">
		<h3 style="margin-bottom: 30px;">Restaurant Gallery</h3>
        <div class="row">
        <?php while( have_rows('gallery') ): the_row(); ?>
            <div class="col-12 col-md-4 mb-3">
                <a href="<?php the_sub_field('image_gallery'); ?>" data-fancybox="gallery-page"><img src="<?php the_sub_field('image_gallery'); ?>" class="img-fluid"></a>
            </div>
        <?php endwhile; ?>
        </div>
    </div>
</section>
<?php endif; ?>
<!--// Page Content -->

<?php get_footer(); ?>
