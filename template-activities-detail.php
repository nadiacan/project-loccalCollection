<?php 
/* Template Name: Activities Detail*/
get_header(); ?>

<!-- Page Content -->
<section>
        <div class="container">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; endif; ?>
            <div class="row">
            <?php if( have_rows('list_activities') ): ?>
            <?php while( have_rows('list_activities') ): the_row(); ?>
                <div class="col-12 col-md-6">
                    <div class="card">
                    <img src="<?php the_field('image'); ?>" class="card-img-top">
                        <div class="card-body text-center">
                            <h3 class="card-title"><?php the_field('title'); ?></h3>
                        </div>
                    </div>
                </div>
                <?php endwhile; endif; wp_reset_query(); ?>
                
            </div>
        </div>
    </section>
       
<!--// Page Content -->

<?php get_footer(); ?>
