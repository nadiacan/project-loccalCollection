<?php
include('BootstrapNavMenuWalker.php');
add_theme_support( 'post-thumbnails' );
automatic_feed_links();

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

add_action( 'init', 'my_register_image_sizes' );

function my_register_image_sizes() {
  add_image_size( 'header-img', 1600, 500, true );
  add_image_size( 'thumb-paging', 255, 340, true );
}

// Shorten Excerpt text for use in theme
function pov_excerpt($text, $chars = 0) {
	$text = substr($text,0,$chars);
	$text = substr($text,0,strrpos($text,' '));
	$text = $text." ...";
	return $text;
}
function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

//add_filter('wp_list_pages', create_function('$t', 'return str_replace("<a ", "<a class=\"bold\" ", $t);'));

function get_the_top_ancestor_id() {
	global $post;
	if ( $post->post_parent ) {
		$ancestors = array_reverse( get_post_ancestors( $post->ID ) );
		return $ancestors[0];
	} else {
		return $post->ID;
	}
}

// Displays post image attachment (sizes: thumbnail, medium, full)
function dp_attachment_image($postid=0, $size='full', $attributes='title') {
	if ($postid<1) $postid = get_the_ID();
	if ($images = get_children(array(
		'post_parent' => $postid,
		'post_type' => 'attachment',
		'numberposts' => 1,
		'post_mime_type' => 'image',)))
		foreach($images as $image) {
			$attachment=wp_get_attachment_image_src($image->ID, $size);
			?><img src="<?php echo $attachment[0]; ?>" <?php echo $attributes; ?> />
			<?php
		}
}

add_action( 'pre_get_posts', 'my_change_sort_order'); 
function my_change_sort_order($query){
    if(is_category()):
        //If you wanted it for the archive of a custom post type use: is_post_type_archive( $post_type )
        //Set the order ASC or DESC
        $query->set( 'order', 'ASC' );
        //Set the orderby
        $query->set( 'orderby', 'ASC' );
    endif;    
};

function the_slug($echo=true){
  $slug = basename(get_permalink());
  do_action('before_slug', $slug);
  $slug = apply_filters('slug_filter', $slug);
  if( $echo ) echo $slug;
  do_action('after_slug', $slug);
  return $slug;
}

function get_breadcrumb() {
	$count = 1; 
	if($count==1){
		$class = "active";
	}else{
		$class = "";
	}
    echo '<li class="breadcrumb-item"><a href="'.home_url().'" rel="nofollow">Home</a></li>';
    if (is_category() || is_single()) {
        echo "<li class=\"breadcrumb-item $class\">";
        the_category(' &bull; ');
            if (is_single()) {
                echo " <li> ";
                the_title();
            }
    } elseif (is_page()) {
        echo "<li class=\"breadcrumb-item $class\">";
        echo the_title();
    } elseif (is_search()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }
}

// Setting menus
register_nav_menus( array(
	'mainmenu' => __( 'Main Menu Navigation', 'default' ),
	'sidebarmenu' => __( 'Sidebar Navigation', 'default' ),
	'footermenu' => __( 'Footer Navigation', 'default' ),
));

function main_menu() {
	wp_nav_menu(array(
	  'theme_location'  => 'mainmenu',
	  'menu' => '', 
	  'container_id' => '', 
	  'depth'             => 3,
	  'container' => false,
	  //'menu_class'      => 'nav sf-menu sf-arrows',
	  'items_wrap'     => '<ul class="navbar-nav me-auto">%3$s</ul>',
	  'walker' => new BootstrapNavMenuWalker()
	)); 
}

function footer_menu() {
	wp_nav_menu(array(
	  'theme_location'  => 'footermenu',
	  'menu' => '', 
	  'container_id' => '', 
	  'depth'             => 0,
	  'container' => false,
	  //'menu_class'      => 'nav sf-menu sf-arrows',
	  'items_wrap'     => '<ul class="nav footer-nav">%3$s</ul>',
	  'walker' => ''
	)); 
}


function side_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'default' ),
		'id'            => 'rightsidebar',
		'description'   => __( 'Appears in the right sidebar of the site.', 'default' ),
		'before_widget' => '<div class="single-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );	
}
add_action( 'widgets_init', 'side_widgets_init' );

function side_widgets_init2() {
	register_sidebar( array(
		'name'          => __( 'Footer', 'default' ),
		'id'            => 'footer',
		'description'   => __( 'Appears in the footer of the site.', 'default' ),
		'before_widget' => '<div class="single-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );	
}
add_action( 'widgets_init', 'side_widgets_init2' );


function side_widgets_init3() {
	register_sidebar( array(
		'name'          => __( 'Sidebar Widget', 'default' ),
		'id'            => 'right-sidebar',
		'description'   => __( 'Appears in the sidebar of the site.', 'default' ),
		'before_widget' => '<aside class="mb-5">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );	
}
add_action( 'widgets_init', 'side_widgets_init3' );


function pagination($pages = '', $range = 3)
{  
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<div class=\"pagination loop-pagination \">Page ".$paged." of ".$pages." ";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
         echo "</div>\n";
     }
}

function cptui_register_my_cpts_special_offer() {

	/**
	 * Post Type: Special Offer.
	 */

	$labels = [
		"name" => __( "Special Offer", "custom-post-type-ui" ),
		"singular_name" => __( "Special Offer", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Special Offer", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"can_export" => false,
		"rewrite" => [ "slug" => "special_offer", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-admin-customizer",
		"supports" => [ "title", "editor", "thumbnail", "excerpt", "page-attributes" ],
		"show_in_graphql" => false,
	];

	register_post_type( "special_offer", $args );
}

add_action( 'init', 'cptui_register_my_cpts_special_offer' );


function cptui_register_my_taxes_categories_offer() {

	/**
	 * Taxonomy: Categories.
	 */

	$labels = [
		"name" => __( "Categories", "custom-post-type-ui" ),
		"singular_name" => __( "Categories ", "custom-post-type-ui" ),
	];

	
	$args = [
		"label" => __( "Categories", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'categories_offer', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "categories_offer",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "categories_offer", [ "special_offer" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_categories_offer' );


function cptui_register_my_cpts_room() {

	/**
	 * Post Type: Room.
	 */

	$labels = [
		"name" => __( "Room", "custom-post-type-ui" ),
		"singular_name" => __( "Room", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Room", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"can_export" => false,
		"rewrite" => [ "slug" => "room", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-admin-home",
		"supports" => [ "title", "editor", "thumbnail", "excerpt", "page-attributes" ],
		"show_in_graphql" => false,
	];

	register_post_type( "room", $args );
}

add_action( 'init', 'cptui_register_my_cpts_room' );



?>
