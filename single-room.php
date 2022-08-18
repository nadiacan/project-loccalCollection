<?php 
get_header(); ?>

<!-- Begin Main Content Area -->
<!-- Room Content -->
<section class="pages">
        <div class="container">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="d-flex bd-highlight2 text-center justify-content-center my-3">
                <?php if (get_field('capacity')) { ?>
                    <div class="py-3 px-5">
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
                <div class="py-3 px-5">
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
                <div class="py-3 px-5">
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
            <div class="row my-5">
                <div class="col-12 col-md-12 text-center">
                    <?php the_content(); ?>
                </div>
                <div class="col-12 col-md-12 mt-5 col-amenities">
                    <div class="border p-4">
                    <h3 class="text-center">Amenities</h3>
                    <div class="d-flex bd-highlight flex-wrap justify-content-center">
                    <?php if( have_rows('list_amenities') ): ?>
                        <?php while( have_rows('list_amenities') ): the_row(); ?>
                        <div class="inline mb-4">
                            <?php if (get_sub_field('add_icon_image')== 'icon') { ?>
                                <?php the_sub_field('icon'); ?>
                            <?php }else { ?>
                                <img src="<?php the_sub_field('icon_img'); ?>">
                            <?php } ?> 
                             <?php the_sub_field('text'); ?>
                        </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    </div>
                    </div>
                </div>
            </div>
            <?php if (get_field('name_button')) { ?>
                <div class="text-center">
                    <a href="<?php the_field('link_button'); ?>" class="btn btn-medium btn-outline-main"><?php the_field('name_button'); ?></a>
                </div>
            <?php } ?>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </section>
    <!-- Gallery Room -->
    <section class="bg-grey">
       <div class="container">
            <h3>Room Gallery</h3>
            <div class="room-gallery mt-3">
            
                <div class="owl-carousel">
                <?php if( have_rows('gallery') ): ?>
                <?php while( have_rows('gallery') ): the_row(); ?>
                    <div><a href="<?php the_sub_field('image_gallery'); ?>" data-fancybox="gallery-room"><img src="<?php the_sub_field('image_gallery'); ?>"></a></div>
                <?php endwhile; ?>
                <?php endif; ?>
                </div>
            
            </div>
       </div> 
    </section>
    <section>
        <div class="container">
            <div class="text-center">
                <h3>Other Rooms</h3>
            </div>
            <div class="mt-3">
                <div class="owl-carousel other-room">
                <?php
                    $args = array(
                        'post_type'      => 'room',
                        'posts_per_page' => -1,
                        'order'          => 'ASC',
                    );


                    $parent = new WP_Query( $args );

                    if ( $parent->have_posts() ) : ?>
                    
                        <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>
                        <div>
                            
                            <?php the_post_thumbnail('',array('class'=>'card-img-top')); ?>
                                <div class="card-body text-center">
                                    <h4 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                    <hr>
                                    <div class="card-text"><?php the_excerpt(); ?></div>
                                    <div class="d-flex bd-highlight justify-content-center mb-3">
                                      <!--  <div class="p-2 price border-right-sm border-right-md">
                                            <div class="d-block mb-2">START FROM</div>
                                            <div class="d-block"><b><?php the_field('price'); ?></b></div>
                                        </div> -->
                                        <div class="p-2 text-center links">
                                            <a href="<?php the_permalink(); ?>" class="card-btn">Explore More</a>
                                        </div>
                                    </div>
                                    
                                </div>
                            
                        </div>
                    <?php endwhile; endif; wp_reset_query(); ?>
                </div>
            </div>
        </div>
    </section>

<!-- Main Content Area End Here -->

<?php get_footer(); ?>