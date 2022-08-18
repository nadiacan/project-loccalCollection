<?php 
/* Template Name: Gallery */
get_header(); ?>

<!-- Page Content -->
<section>
    <div class="container">
        
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; endif; ?>
        
        <div class="row mt-3">
        <?php
            while(has_sub_field('gallery')):
                $imageGallery = get_sub_field('image_gallery');
        ?>
            <div class="col-6 col-md-3 mb-3 gallery-list">
                <a href="<?php echo $imageGallery; ?>" data-fancybox="gallery"><img src="<?php echo $imageGallery; ?>" class="img-fluid"></a>
            </div>
            <?php  endwhile; ?>
        </div>
               
    </div>
</section>
       
        <!--// Page Content -->

<?php get_footer(); ?>
