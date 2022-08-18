<?php 
/* Template Name: Room */
get_header(); ?>

<!-- Page Content -->
<section>
        <div class="container">
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
                            <?php if (get_field('capacity')) { ?>
                                <div class="p-3">
                                    <div class="d-block mb-2">
                                        <?php if (get_field('add_icon_image_room_capacity')== 'icon') { ?>
                                            <?php the_field('icon_capacity'); ?>
                                        <?php }else { ?>
                                            <img src="<?php the_field('icon_image_room_capacity'); ?>">
                                        <?php } ?>
                                    </div> 
                                    <div class="d-block"><?php the_field('capacity'); ?></div> <div class="d-block">Guests</div>
                                </div>
                            <?php } ?>
                            <?php if (get_field('bed')) { ?>
                                <div class="p-3">
                                    <div class="d-block mb-2">
                                        <?php if (get_field('add_icon_image_room_bed')== 'icon') { ?>
                                            <?php the_field('icon_bed'); ?>
                                        <?php }else { ?>
                                            <img src="<?php the_field('icon_image_room_bed'); ?>">
                                        <?php } ?> 
                                    </div>
                                    <div class="d-block"><?php the_field('bed'); ?></div> <div class="d-block">Bed</div>
                                </div>
                            <?php } ?>
                            <?php if (get_field('room_size')) { ?>
                                <div class="p-3">
                                    <div class="d-block mb-2">
                                        <?php if (get_field('add_icon_image_room_size')== 'icon') { ?>
                                            <?php the_field('icon_room_size'); ?>
                                        <?php }else { ?>
                                            <img src="<?php the_field('icon_image_room_size'); ?>">
                                        <?php } ?> 
                                    </div>
                                    <div class="d-block"><?php the_field('room_size'); ?></div> <div class="d-block">sqm</div>
                                </div>
                            <?php } ?>
                            </div>
                            <div class="card-text"><?php the_excerpt(); ?></div>
                            <a href="<?php the_permalink(); ?>" class="card-btn">Explore More</a>
                        </div>
                    </div>
                </div>
                <?php endwhile; endif; wp_reset_query(); ?>
                
            </div>
        </div>
    </section>
       
<!--// Page Content -->

<?php get_footer(); ?>
