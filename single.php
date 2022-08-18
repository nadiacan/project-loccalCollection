<?php 
get_header(); ?>

<!-- Begin Main Content Area -->
<section class="rooms-page section-padding" data-scroll-index="1">
        <div class="container">
            <div class="row">
                <div class="col-md-12"> 
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php if(get_field('slide_on')=='No'){ ?>
                        <div class="section-title"><?php the_title(); ?></div>
                    <?php } ?>
                        <?php the_content(); ?>
                        <?php if (get_field('name_button')) { ?>
                            <a href="<?php the_field('link_button'); ?>" class="mt-5 btn btn-main"><?php the_field('name_button'); ?></a>
                        <?php } ?>
                    <?php endwhile; endif; ?>
                </div>
                
            </div>
        </div>
</section>
<!-- Main Content Area End Here -->

<?php get_footer(); ?>