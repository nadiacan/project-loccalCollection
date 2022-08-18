<?php /* Template Name: Front Page */
get_header(); ?>

    <section class="bg-grey">
        <div class="container">
            <div class="row">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="col-12 col-md-9 px-0 d-block d-md-none">
                        <div class="box-img">
                            <?php the_post_thumbnail(); ?>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 px-0 middle-text d-block d-md-none">
                        <div class="box-content bg-white text-center">
                            <!--<div class="subtitle">01 <div class="dash-accent mx-auto"></div> <?php the_field('subtitle'); ?></div>-->
                            <h2><?php the_title(); ?></h2>
                            <?php the_excerpt(); ?>

                            <?php if (get_field('name_button')) { ?>
                                <a href="<?php the_field('link_button'); ?>" class="btn btn-large btn-outline-main"><?php the_field('name_button'); ?></a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-12 col-md-9 px-0 d-none d-md-block">
                        <div class="box-img">
                            <?php the_post_thumbnail(); ?>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 px-0 middle-text d-none d-md-block">
                        <div class="box-content bg-white text-center">
                            <!--<div class="subtitle">01 <div class="dash-accent mx-auto"></div> <?php the_field('subtitle'); ?></div>-->
                            <!--<h2><?php the_title(); ?></h2>-->
                            <?php the_content(); ?>
                            <?php if (get_field('name_button')) { ?>
                                <a href="<?php the_field('link_button'); ?>" class="btn btn-large btn-outline-main"><?php the_field('name_button'); ?></a>
                            <?php } ?>
                        </div>
                    </div>
                <?php endwhile; wp_reset_postdata(); endif; ?>
            </div>
        </div>
    </section>
<!--
    <?php $the_query = new WP_Query( 'page_id=52' ); ?>
    <?php if ( $the_query->have_posts() ) : ?>
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
    <section class="h-100" style="background:url('<?php the_post_thumbnail_url(); ?>') no-repeat;background-size:cover;">
        <div class="container">
            <div class="box-content2 bg-white">
                <?php the_field('add_content'); ?>
                
                <a href="<?php the_permalink(); ?>" class="btn btn-large btn-outline-main">Browse All Rooms</a>
            </div>
        </div>
    </section>
    <?php endwhile; wp_reset_postdata(); endif; ?> -->
    
    <section>
        <div class="container">
            <div class="text-center">
            <?php $the_query = new WP_Query( 'page_id=52' ); ?>
            <?php if ( $the_query->have_posts() ) : ?>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
               <!-- <div class="subtitle">02 <div class="dash-accent mx-auto"></div> <?php the_field('subtitle'); ?></div> -->
                <?php the_content(); ?>
                <?php endwhile; wp_reset_postdata(); endif; ?>
            </div>

            <div id="carouselRooms" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    
                    $args = array(
                        'post_type'      => 'room',
                        'posts_per_page' => -1,
                        'order'          => 'ASC',
                    );

                    $parent = new WP_Query( $args );

                    if ( $parent->have_posts() ) : $count2 = 1;?>
                    
                    <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>
                    <?php
                        if($count2==1){
                            $class2 = "active";
                        }else{
                            $class2 = "";
                        }
                    ?>
                    <div class="carousel-item <?php echo $class2; ?>">
                        <div class="row no-gutter">
                            <div class="col-12 col-md-5 px-0">
                                <?php the_post_thumbnail('',array('class'=>'img-room')); ?> 
                            </div>
                            <div class="col-12 col-md-7 px-0 py-md-5">
                                <div class="box-content3 bg-grey">
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <?php the_excerpt(); ?>
                                    <hr>
                                    <div class="d-flex bd-highlight mb-3">
                                        <div class="me-auto p-2 price">
                                        <div class="d-block mb-4">START FROM</div>
                                        <div class="d-block"><span><?php the_field('price'); ?></span> / Night</div>
                                        </div>
                                        <?php if (get_field('capacity')) { ?>
                                        <div class="p-2 text-center">
                                        <div class="d-block mb-2"><?php the_field('icon_capacity'); ?></div> 
                                            <div class="d-block"><?php the_field('capacity'); ?></div> <div class="d-block">Guests</div>
                                        </div>
                                        <?php } ?>
                                        <?php if (get_field('bed')) { ?>
                                        <div class="p-2 text-center">
                                        <div class="d-block mb-2"><?php the_field('icon_bed'); ?> </div>
                                        <div class="d-block"><?php the_field('bed'); ?></div> <div class="d-block">Bed</div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <?php if (get_field('name_button')) { ?>
                                        <a href="<?php the_field('link_button'); ?>" class="btn btn-medium btn-outline-main"><?php the_field('name_button'); ?></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <?php $count2++; ?>
                    <?php endwhile; wp_reset_query(); endif;  ?>
                    
                    
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselRooms" data-bs-slide="prev">
                        <i class="fa fa-arrow-left"></i>
                        <span class="px-3">Prev</span>
                    </button>
                    <?php $the_query = new WP_Query( 'page_id=52' ); ?>
                    <?php if ( $the_query->have_posts() ) : ?>
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <a href="<?php the_permalink(); ?>" class="btn btn-large btn-outline-main">Browse All Rooms</a>
                    <?php endwhile; wp_reset_postdata(); endif; ?>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselRooms" data-bs-slide="next">
                        <span class="px-3">Next</span>
                        <i class="fa fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>
    
    
    <?php $the_query2 = new WP_Query( 'page_id=76' ); ?>
    <?php if ( $the_query2->have_posts() ) : ?>
    <?php while ( $the_query2->have_posts() ) : $the_query2->the_post(); ?>
    <section class="bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 align-self-center box-text">
                   <!-- <div class="subtitle">03 <div class="dash-accent mx-auto"></div> <?php the_field('subtitle'); ?></div> -->
					<div class="subtitle"><?php the_field('subtitle'); ?></div>
                    <?php the_field('add_content'); ?>
                    <a href="<?php the_permalink(); ?>" class="btn btn-large btn-outline-main">Learn More</a>
                </div>
                <div class="col-12 col-md-6 px-md-0">
                    <div class="home-resto">
                    <?php if( have_rows('add_thumbnail') ): ?>
                    <?php $num = 1; ?>
                    <?php while( have_rows('add_thumbnail') ): the_row(); ?>
                        <img src="<?php the_sub_field('thumb'); ?>" class="img-<?php echo $num; ?>">
                    <?php endwhile; ?>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endwhile; wp_reset_postdata(); endif; ?>

    <?php $the_query3 = new WP_Query( 'page_id=81' ); ?>
    <?php if ( $the_query3->have_posts() ) : ?>
    <?php while ( $the_query3->have_posts() ) : $the_query3->the_post(); ?>
    <section>
        <div class="container">
            <div class="text-center">
              <!--  <div class="subtitle">04 <div class="dash-accent mx-auto"></div> <?php the_field('subtitle'); ?></div> -->
                <?php the_content(); ?>
            </div>
            <div class="row list">
            <?php
                $args = array(
                    'post_type'      => 'page',
                    'posts_per_page' => 3,
                    'post_parent'    => $post->ID,
                    'order'          => 'DESC',
                );

                $parent = new WP_Query( $args );

                if ( $parent->have_posts() ) : ?>
                <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>
                <div class="col-12 col-md-4 mb-3">
                    <div class="card">
                    <?php the_post_thumbnail('',array('class'=>'card-img-top')); ?>
                        <div class="card-body text-center">
                            <div class="dash-accent mx-auto"></div>
                            <h3 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <div class="card-text"><?php the_excerpt(); ?></div>
                        </div>
                    </div>
                </div>
                <?php endwhile; endif; wp_reset_query(); ?>
            </div>
        </div>
    </section>
    <?php endwhile; wp_reset_postdata(); endif; ?>
    
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php if (get_field('bg_image')) { ?>
        
    <section class="bg-homes" style="background:url('<?php the_field('bg_image'); ?>') center no-repeat;background-size:cover;">
        
    </section>
    
    <?php } ?>
    <?php endwhile; wp_reset_postdata(); endif; ?>
    
    <section>
        <div class="container">
            <div class="text-center">
            <div class="subtitle">GUEST TESTIMONIAL</div>
                <h2>Hear what our past guests have to say</h2>
            </div>
            <div class="row my-5">
                <div class="col-12 col-md-6 mb-4">
                    <div class="testi bg-white">
                        <p>“Perfect view Sunrise and sunset from the balcony, Free dive in tanaka island that was best moment! Good trekking to Goa Rangko and perfect view surrounded. Very recommended Hotel Loccal Collection in Labuan Bajo!”</p>
                        <hr>
                        <div class="d-flex mb-3">
                            <!--<div class="p-2 testi-img"><img src="<?php bloginfo('template_url'); ?>/images/guest1.jpg"></div>-->
                            <div class="p-2">
                                <div class="testi-name">WIRAWAN</div>
                                <div class="testi-country">Tripadvisor - Indonesia</div>
                            </div>
                            <div class="ms-auto p-2"><img src="<?php bloginfo('template_url'); ?>/images/star.svg"></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-4">
                    <div class="testi bg-white">
                        <p>“Thank you for giving us an amazing honeymoon , absolutely will come back with whole family. Super nice services, rooms, views and meals. Super complate package for spending holiday and super recommend”</p>
                        <hr>
                        <div class="d-flex mb-3">
                             <!--<div class="p-2 testi-img"><img src="<?php bloginfo('template_url'); ?>/images/guest1.jpg"></div>-->
                            <div class="p-2">
                                <div class="testi-name">DEBBY SilVYARIN</div>
                                 <div class="testi-country">Tripadvisor - Indonesia</div>
                            </div>
                            <div class="ms-auto p-2"><img src="<?php bloginfo('template_url'); ?>/images/star.svg"></div>
                        </div>
                    </div>
                </div>
            </div>
          <!--  <div class="text-center">
                <a href="#" class="btn btn-large btn-outline-main">Reservate Today</a>
            </div> -->
        </div>
    </section>
    <section class="bg-grey">
        <div class="container text-center">
           <!-- <div class="subtitle">05 <span class="dash-accent"></span> INSTAGRAM</div> -->
            <h2>Follow us to discover amazing stories</h2>
			<?php echo do_shortcode( '[instagram-feed feed=1]' ); ?>
            <a href="https://www.instagram.com/loccalcollection" class="btn btn-large btn-outline-main mt-4">Follow Us</a>

        </div>
    </section>

    <?php get_footer(); ?>