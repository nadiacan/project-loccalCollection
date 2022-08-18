<?php 
get_header(); ?>

<!-- Begin Main Content Area -->
<section>
        <div class="container">
            <div class="row">
                <div class="col-md-12"> 
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php the_content(); ?>
                        <?php if (get_field('name_button')) { ?>
                            <a href="<?php the_field('link_button'); ?>" class="mt-5 btn btn-medium btn-main"><?php the_field('name_button'); ?></a>
                        <?php } ?>
                    <?php endwhile; endif; ?>
                </div>
                
            </div>
        </div>
</section>
<?php if( have_rows('gallery') ): ?>
<section>
    <div class="container">
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
<!-- Main Content Area End Here -->

<?php get_footer(); ?>