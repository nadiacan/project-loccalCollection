<?php
/*
Theme Name: loccal
Description: Themes Loccal
Author: Birudaun
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(''); ?></title>
    <?php if (get_field('favicon','option')) { ?>
        <link rel="shortcut icon" href="<?php the_field('favicon','option'); ?>" />
    <?php } ?>

    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/animate.min.css" />
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/fancybox.css" />
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/owl.carousel.min.css" />

    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <?php wp_head(); ?>
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-KCLNQM4MBT"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-KCLNQM4MBT');
</script>
	
</head>

<body>
    <header>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <?php if (get_field('logo','option')) { ?>
                <a class="navbar-brand" href="<?php echo site_url(); ?>"><img src="<?php the_field('logo','option'); ?>"></a>
            <?php } ?>
            <button class="navbar-toggler" type="button" data-bs-toggle="modal" data-bs-target="#menunavModal" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <?php echo main_menu(); ?>
                <span class="navbar-text">
                    <a href="https://loccalcollection.reserveonline.id/book/451" class="btn btn-medium btn-outline-white">BOOK NOW</a>
                </span>
            </div>
        </div>
    </nav>
    </header>

<!-- Slider -->
<?php if(is_front_page()) { ?>


    <?php if( get_field('slide_on') ) { ?>
        <div id="carouselHomeFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <?php
                $num = 0;
                $active = 'active';
                while ( have_rows('slider') ) : the_row(); ?>
                    <button type="button" data-bs-target="#carouselHomeFade" data-bs-slide-to="<?php echo $num; ?>" class="<?php echo $active; ?>" aria-current="true"></button>
                <?php 
                    $num++;
                    $active = '';
                ?>
                <?php endwhile; ?>
            </div>
            <div class="carousel-inner">
                <?php 
                    if( have_rows('slider') ):
                        $count = 1;
                        while ( have_rows('slider') ) : the_row();
                            $image = get_sub_field('image');
                            $title = get_sub_field('title_caption');
                            $caption = get_sub_field('caption');
                                if($count==1){
                                    $class = "active";
                                }else{
                                    $class = "";
                                }
                ?>           
                        <!--<div class="carousel-item <?php echo $class; ?>"  style="background:url('<?php echo $image; ?>') no-repeat;background-size:cover;">
                            <?php if ($caption !="") { ?>
                                <div class="carousel-caption mx-auto">
                                    <h1><?php echo $title; ?></h1>
                                    <?php echo $caption; ?>
                                </div> 
                            <?php } ?>
                        </div>  -->    
                        <div class="carousel-item <?php echo $class; ?>">
                            <img src="<?php echo $image; ?>">
                            <?php if ($caption !="") { ?>
                                <div class="carousel-caption mx-auto">
                                    <h1><?php echo $title; ?></h1>
                                    <?php echo $caption; ?>
                                </div> 
                            <?php } ?>
                        </div>
                        <?php
                                $count ++;
                                endwhile;
                        ?>                
                    <?php                
                        endif;
                    ?>                
            </div>
            <?php $count = 1;?>
            <?php while ( have_rows('slider') ) : the_row(); ?>
                <?php  if($count== 1){ ?>
                <?php } else{ ?>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselHomeFade" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselHomeFade" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                <?php } $count++; ?>
            <?php endwhile; ?>
        </div>
    <?php }else{} ?>

    <!-- Booking Search -->
    <div class="booking-wrapper">
            <div class="container">
                <div class="booking-inner clearfix">
                    <div id="omnih-booking" class="part">
                        <div class="part-center">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="form-booking">
                                        <form action="https://loccalcollection.reserveonline.id/book/451" target="_blank">
                                            <input type="hidden" name="checkin" id="checkinomni" value="">
                                            <input type="hidden" name="checkout" id="checkoutomni" value="">
                                            <div class="d-flex flex-column flex-lg-row flex-wrap justify-content-center content-form">
                                                <div class="form-group col-lg-5 col-12 custom-form-group">
                                                    <span class="form-label">Check in - Check out</span>
                                                    <input class="form-control" type="date-custom" name="daterange" required id="theDate" autocomplete="off">
                                                </div>
                                                <!--<div class="d-flex col-lg-4 occupants">-->
                                                <!--<div class="form-group col">-->
                                                <!--    <span class="form-label">Adult</span>-->
                                                <!--    <div class="d-flex justify-content-between align-items-baseline select-wrapper" style="background-color: #ffffff;">-->
                                                <!--        <select name="adult" class="form-control select-custom">-->
                                                <!--            <option value="1">1</option>-->
                                                <!--            <option value="2">2</option>-->
                                                <!--            <option value="3">3</option>-->
                                                <!--            <option value="4">4</option>-->
                                                <!--            <option value="5">5</option>-->
                                                <!--            <option value="6">6</option>-->
                                                <!--            <option value="7">7</option>-->
                                                <!--            <option value="8">8</option>-->
                                                <!--            <option value="9">9</option>-->
                                                <!--            <option value="10">10</option>-->
                                                <!--            <option value="11">11</option>-->
                                                <!--            <option value="12">12</option>-->
                                                <!--            <option value="13">13</option>-->
                                                <!--            <option value="14">14</option>-->
                                                <!--            <option value="15">15</option>-->
                                                <!--        </select>-->
                                                <!--    </div>-->
                                                <!--</div>-->
                                                <!--<div class="form-group col">-->
                                                <!--    <span class="form-label">Children</span>-->
                                                <!--        <div class="d-flex justify-content-between align-items-baseline select-wrapper" style="background-color: #ffffff;">-->
                                                <!--        <select name="child" class="form-control select-custom">-->
                                                <!--            <option value="0">0</option>-->
                                                <!--            <option value="1">1</option> -->
                                                <!--            <option value="2">2</option>-->
                                                <!--            <option value="3">3</option>-->
                                                <!--            <option value="4">4</option>-->
                                                <!--            <option value="5">5</option>-->
                                                <!--        </select>-->
                                                <!--    </div>-->
                                                <!--</div>-->
                                                <!--<div class="form-group col">-->
                                                <!--    <span class="form-label">Infant</span>-->
                                                <!--        <div class="d-flex justify-content-between align-items-baseline select-wrapper" style="background-color: #ffffff;">-->
                                                <!--            <select name="child" class="form-control select-custom">-->
                                                <!--                <option value="0">0</option>-->
                                                <!--                <option value="1">1</option>-->
                                                <!--                <option value="2">2</option>-->
                                                <!--                <option value="3">3</option>-->
                                                <!--                <option value="4">4</option>-->
                                                <!--                <option value="5">5</option>-->
                                                <!--            </select>-->
                                                <!--        </div>-->
                                                <!--</div>-->
                                                <!--</div>-->
                                                <div class="form-group col-lg-3 col-12 custom-form-group">
                                                    <span class="form-label">Promo Code</span>
                                                    <input class="form-control" name="promocode" id="promocode" type="text" placeholder="Promo Code" autocomplete="off">
                                                </div>
                                                <div class="btn-form col-lg-4 col-12">
                                                    <button class="btn-submit">Check availability</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
<?php }else { ?>

    <?php if( get_field('slide_on') ) { ?>
        <div id="carouselMainIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <?php
                $num = 0;
                $active = 'active';
                while ( have_rows('slider') ) : the_row(); ?>
                    <button type="button" data-bs-target="#carouselMainIndicators" data-bs-slide-to="<?php echo $num; ?>" class="<?php echo $active; ?>" aria-current="true"></button>
                <?php 
                    $num++;
                    $active = '';
                ?>
                <?php endwhile; ?>
            </div>
            <div class="carousel-inner">
                <?php 
                    if( have_rows('slider') ):
                        $count = 1;
                        while ( have_rows('slider') ) : the_row();
                            $image = get_sub_field('image');
                            $title = get_sub_field('title_caption');
                            $caption = get_sub_field('caption');
                                if($count==1){
                                    $class = "active";
                                }else{
                                    $class = "";
                                }
                ?>           
                        <div class="carousel-item <?php echo $class; ?>"  style="background:url('<?php echo $image; ?>') no-repeat;background-size:cover;">
                            <?php if ($caption !="") { ?>
                                <div class="carousel-caption mx-auto">
                                    <h1><?php echo $title; ?></h1>
                                    <?php echo $caption; ?>
                                </div> 
                            <?php } ?>
                        </div>                                                
                        <?php
                                $count ++;
                                endwhile;
                        ?>                
                    <?php                
                        endif;
                    ?>                
            </div>
            <?php $count = 1;?>
            <?php while ( have_rows('slider') ) : the_row(); ?>
                <?php  if($count== 1){ ?>
                <?php } else{ ?>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselMainIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselMainIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                <?php } $count++; ?>
            <?php endwhile; ?>
        </div>
    <?php }else{ ?>
    
        <div class="header-images" style="background:url('<?php the_field('header_image'); ?>') no-repeat center;background-size:cover;">
            <div class="overlay"></div>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="container h-100 text-center">
                <div class="title-pages"><h2><?php the_title(); ?></h2></div>
            </div>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
    
    <?php } ?>

<?php } ?>