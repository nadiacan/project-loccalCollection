<?php 
/* Template Name: Experience */
get_header(); ?>

<!-- Page Content -->
<section>
        <div class="container">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; endif; ?>
            <div class="row experience">
            <?php
                    $args = array(
                        'post_type'      => 'page',
                        'posts_per_page' => -1,
                        'post_parent'    => $post->ID,
                        'order'          => 'ASC',
                    );


                    $parent = new WP_Query( $args );

                    if ( $parent->have_posts() ) : ?>
                    
                        <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>
                <div class="col-12 col-md-4">
                    <?php the_post_thumbnail('',array('class'=>'card-img-top')); ?>
                    <div class="card-body text-center">
                        <div class="subtitle">EXPERIENCE</div>
                        <h3 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    </div>
                </div>
                <?php endwhile; endif; wp_reset_query(); ?>
                
            </div>
        </div>
    </section>
       
<!--// Page Content -->

<?php get_footer(); ?>
