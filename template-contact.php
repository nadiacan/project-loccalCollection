<?php 
/* Template Name: Contact */
get_header(); ?>

<!-- Page Content -->
<section>
    <div class="container">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; endif; ?>
        <div class="row">
                <div class="col-12 col-md-7">
                    <div class="form-contact">
                        <?php echo do_shortcode('[contact-form-7 id="5" title="Contact form"]'); ?>
                    </div>
                
                
                </div>
                <div class="col-12 col-md-5">
                    <div class="mb-4">
                        <h5>ADDRESS</h5>
                        <?php if(get_field('address','option')){ ?>
                            <?php the_field('address','option'); ?>
                        <?php } ?>
                    </div>
                    <div class="mb-4">
                        <h5>PHONE & WHATSAPP</h5>
                        <?php if(get_field('phone','option')){ ?>
                           <p> Phone. <a href="tel:<?php the_field('phone','option'); ?>"><?php the_field('phone','option'); ?></a><br>
                        <?php } ?>
                        <?php if(get_field('wa','option')){ ?>
                           Whatsapp. <a href="<?php the_field('link_wa','option'); ?>"><?php the_field('wa','option'); ?></a></p>
                        <?php } ?>
                    </div>
					 <div class="mb-4">
                        <h5>E-MAIL & WEBSITE</h5>
                        <?php if(get_field('email','option')){ ?>
                           <p> E-mail. <a href="mailto:<?php the_field('email','option'); ?>"><?php the_field('email','option'); ?></a><br>
                        <?php } ?>
                        <?php if(get_field('wa','option')){ ?>
                           Website. <a href="<?php the_field('website','option'); ?>"><?php the_field('website','option'); ?></a></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
            
    </div>
</section>
<section>
    <?php if(get_field('map','option')){ ?>
            
        <?php the_field('map','option'); ?>
                
    <?php } ?>
</section>
       
        <!--// Page Content -->

<?php get_footer(); ?>
