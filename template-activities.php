<?php 
/* Template Name: Activities */
get_header(); ?>

<!-- Page Content -->
<section>
        <div class="container">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; endif; ?>
            <div class="row">
            <?php
                    $args = array(
                        'post_type'      => 'room',
                        'posts_per_page' => -1,
                        'order'          => 'ASC',
                    );


                    $parent = new WP_Query( $args );

                    if ( $parent->have_posts() ) : ?>
                    
                        <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>
                <div class="col-12 col-md-6 list-room">
                    <div class="card">
                    <?php the_post_thumbnail('',array('class'=>'card-img-top')); ?>
                        <div class="card-body text-center">
                            <h3 class="card-title"><?php the_title(); ?></h3>
                            <div class="d-flex bd-highlight2 justify-content-center my-3">
                            
                            <div class="card-text"><?php the_excerpt(); ?></div>
                            <a href="<?php the_permalink(); ?>" class="btn btn-medium btn-main">Read More</a>
                        </div>
                    </div>
                </div>
                <?php endwhile; endif; wp_reset_query(); ?>
                
            </div>
        </div>
    </section>
       
<!--// Page Content -->

<?php get_footer(); ?>
