<!-- Footer -->
    <footer>
        <div class="container">
            <!--<div class="row pb-4">
                <div class="col-12 col-md-9">
                    <?php if (get_field('logo','option')) { ?>
                        <img src="<?php the_field('logo','option'); ?>" class="logo">
                    <?php } ?>
                    <?php the_field('caption_footer','option'); ?>
                </div>
                <div class="col-12 col-md-3 align-self-end">
                    <div class="social-media">
                        <div class="d-block fs-6 mb-3"><b>FOLLOW US</b></div>
                        <ul>
                            <?php if( have_rows('social_media', 'option') ): ?>
                                <?php while( have_rows('social_media', 'option') ): the_row(); ?>
                                    <a href="<?php the_sub_field('link_icon'); ?>" target="_blank" title="<?php the_sub_field('name_icon'); ?>"><?php the_sub_field('icon'); ?></a>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <hr>-->
            <div class="row py-5">
                <div class="d-none d-md-block col-md-4">
                    <div class="footer-title">
                        <h3>Contact Us</h3>
                    </div>
                    <?php if(get_field('address','option')){ ?>
                        <p><?php the_field('address','option'); ?></p>
                    <?php } ?>
                    <?php if(get_field('phone','option')){ ?>
                        <p>Phone. <a href="tel:<?php the_field('phone','option'); ?>"><?php the_field('phone','option'); ?></a><br>
                    <?php } ?>
                    <?php if(get_field('email','option')){ ?>
                        E-mail. <a href="mailto:<?php the_field('email','option'); ?>"><?php the_field('email','option'); ?></a></p>
                    <?php } ?>
                </div>
                <div class="d-none d-md-block col-md-4">
                    <div class="footer-title">
                        <h3>Pages</h3>
                    </div>    
                                <ul class="nav footer-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="https://loccalcollection.com/">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="https://loccalcollection.com/rooms-suites/">Rooms & Suites</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="https://loccalcollection.com/restaurant-dining/">Restaurant</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="https://loccalcollection.com/experiences/">Experiences</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="https://loccalcollection.com/gallery/">Gallery</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="https://loccalcollection.com/contact-us/">Contact Us</a>
                                    </li>
                                </ul>
                                
                    
                </div>
                
                
                <div class="d-none d-md-block col-md-4">
                    <div class="footer-title">
                        <h3>Social Media</h3>
                    </div>
                    <ul class="nav d-flex flex-wrap">
                        <?php if( have_rows('social_media', 'option') ): ?>
                                <?php while( have_rows('social_media', 'option') ): the_row(); ?>
                                <li class="nav-item ">
                                    <a href="<?php the_sub_field('link_icon'); ?>" target="_blank" class="nav-link" title="<?php the_sub_field('name_icon'); ?>"><?php the_sub_field('icon'); ?></a>
                                </li>
                                <?php endwhile; ?>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="d-block d-md-none col-12">
                    <div class="accordion accordion-flush" id="accordionMenu">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-1">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse1" aria-expanded="false" aria-controls="flush-collapse1">
                                <h4>Contact Us</h4>
                            </button>
                            </h2>
                            <div id="flush-collapse1" class="accordion-collapse collapse" aria-labelledby="flush-1" data-bs-parent="#accordionMenu">
                                <div class="accordion-body">
                                    <?php if(get_field('address','option')){ ?>
                                        <p><?php the_field('address','option'); ?></p>
                                    <?php } ?>
                                    <?php if(get_field('phone','option')){ ?>
                                        <p><?php the_field('phone','option'); ?></p>
                                    <?php } ?>
                                    <?php if(get_field('email','option')){ ?>
                                        <p><?php the_field('email','option'); ?></p>
                                    <?php } ?>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse2" aria-expanded="false" aria-controls="flush-collapse2">
                                <h4>Pages</h4>
                            </button>
                            </h2>
                            <div id="flush-collapse2" class="accordion-collapse collapse" aria-labelledby="flush-2" data-bs-parent="#accordionMenu">
                                <div class="accordion-body">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="https://loccalcollection.com/">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="https://loccalcollection.com/rooms-suites/">Rooms & Suites</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="https://loccalcollection.com/restaurant-dining/">Restaurant</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="https://loccalcollection.com/experiences/">Experiences</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="https://loccalcollection.com/gallery/">Gallery</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="https://loccalcollection.com/contact-us/">Contact Us</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse3" aria-expanded="false" aria-controls="flush-collapse3">
                                <h4>Social Media</h4>
                            </button>
                            </h2>
                            <div id="flush-collapse3" class="accordion-collapse collapse" aria-labelledby="flush-3" data-bs-parent="#accordionMenu">
                                <div class="accordion-body">
                                <ul class="nav d-flex flex-wrap">
                                <?php if( have_rows('social_media', 'option') ): ?>
                                        <?php while( have_rows('social_media', 'option') ): the_row(); ?>
                                        <li class="nav-item ">
                                            <a href="<?php the_sub_field('link_icon'); ?>" target="_blank" class="nav-link" title="<?php the_sub_field('name_icon'); ?>"><?php the_sub_field('icon'); ?></a>
                                        </li>
                                        <?php endwhile; ?>
                                <?php endif; ?>
                                </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="copyright text-center">
        © 2022 Loccal Collection Hotel Labuan Bajo - Window of Paradise. All Right reserved
        </div>
    </footer>

    <!-- modal search -->
    <div class="modal nav-modal modal-fullscreen" id="menunavModal" tabindex="-1" aria-labelledby="menunavModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header px-lg-5">
            <div class="container">
                <div class="row px-0">
                    <div class="col-6 px-0">
                        <?php if (get_field('logo','option')) { ?>
                            <a class="navbar-brand" href="<?php echo site_url(); ?>"><img src="<?php the_field('logo','option'); ?>"></a>
                        <?php } ?>
                    </div>
                    <div class="col-6 px-0 text-right">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>            
                    </div>    
                </div>
            </div>
        </div>
        <div class="modal-body">
            <div class="container">
                <div class="row h-100 list-menu">
                    <div class="col-12 col-lg-6">
                        <?php echo main_menu(); ?>
                    </div>
                </div>
            </div>
        </div>
        
        </div>
    </div>
    </div>

    <script src="<?php bloginfo('template_url'); ?>/js/bootstrap.bundle.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/jquery-3.6.0.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/fancybox.umd.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/owl.carousel.min.js"></script>

    <script src="<?php bloginfo('template_url'); ?>/js/main.js"></script>
                    
    <?php wp_footer(); ?>
</body>
</html>