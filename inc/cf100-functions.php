<?php
/**
 * cf100 theme specific functions
 *
 * @package cf100
 */

function replace_excerpt($content) {
       return str_replace('[...]',
               '<div class="more-link"><a href="'. get_permalink() .'">Continue Reading</a></div>',
               $content
       );
}
add_filter('the_excerpt', 'replace_excerpt');

/**
 * function for conditional tag: is_tree()
 */


function is_tree($pid) {      // $pid = The ID of the page we're looking for pages underneath
	global $post;         // load details about this page
	$anc = get_post_ancestors( $post->ID );
	foreach($anc as $ancestor) {
		if(is_page() && $ancestor == $pid) {
			return true;
		}
	}
	if(is_page()&&(is_page($pid))) 
               return true;   // we're at the page or at a sub page
	else 
               return false;  // we're elsewhere
};


/*
 * custom post types
 */
 
 //homepage slides

add_action('init', 'homepageslides_register');
 
function homepageslides_register() {
 
	$labels = array(
		'name' => _x('Homepage Slides', 'post type general name'),
		'singular_name' => _x('Slide', 'post type singular name'),
		'add_new' => _x('Add new', 'slide item'),
		'add_new_item' => __('Add new slide'),
		'edit_item' => __('Edit slide'),
		'new_item' => __('New slide'),
		'view_item' => __('View slide'),
		'search_items' => __('Search'),
		'not_found' =>  __('Not found'),
		'not_found_in_trash' => __('Nothing found in trash'),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'exclude_from_search' => false,
		'public' => true,
		'publicly_queryable' => true,
		'show_in_menu' => true, 
		'show_ui' => true,
		'query_var' => true,
		'menu_icon'=> 'dashicons-format-gallery',
		'rewrite' => array( 'slug' => 'homepageslides', 'with_front' => true ),
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 5,
		'supports' => array('title','thumbnail')
	  ); 
 
	register_post_type( 'homepageslides' , $args );

}


//success stories

add_action('init', 'successstories_register');
 
function successstories_register() {
 
	$labels = array(
		'name' => _x('Success Stories', 'post type general name'),
		'singular_name' => _x('Story', 'post type singular name'),
		'add_new' => _x('Add new', 'slide item'),
		'add_new_item' => __('Add new story'),
		'edit_item' => __('Edit story'),
		'new_item' => __('New story'),
		'view_item' => __('View story'),
		'search_items' => __('Search'),
		'not_found' =>  __('Not found'),
		'not_found_in_trash' => __('Nothing found in trash'),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'exclude_from_search' => false,
		'public' => true,
		'publicly_queryable' => true,
		'show_in_menu' => true, 
		'show_ui' => true,
		'query_var' => true,
		'menu_icon'=> 'dashicons-awards',
		'rewrite' => array( 'slug' => 'successstories', 'with_front' => true ),
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 5,
		'supports' => array('title','editor')
	  ); 
 
	register_post_type( 'successstories' , $args );

}

//meet the trainers

add_action('init', 'thetrainers_register');
 
function thetrainers_register() {
 
	$labels = array(
		'name' => _x('The Trainers', 'post type general name'),
		'singular_name' => _x('Trainer', 'post type singular name'),
		'add_new' => _x('Add new', 'slide item'),
		'add_new_item' => __('Add new trainer'),
		'edit_item' => __('Edit trainer'),
		'new_item' => __('New trainer'),
		'view_item' => __('View trainer'),
		'search_items' => __('Search'),
		'not_found' =>  __('Not found'),
		'not_found_in_trash' => __('Nothing found in trash'),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'exclude_from_search' => false,
		'public' => true,
		'publicly_queryable' => true,
		'show_in_menu' => true, 
		'show_ui' => true,
		'query_var' => true,
		'menu_icon'=> 'dashicons-id-alt',
		'rewrite' => array( 'slug' => 'thetrainers', 'with_front' => true ),
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 5,
		'supports' => array('title','editor','thumbnail')
	  ); 
 
	register_post_type( 'thetrainers' , $args );

}

//testimonials

add_action('init', 'testimonials_register');
 
function testimonials_register() {
 
	$labels = array(
		'name' => _x('Testimonials', 'post type general name'),
		'singular_name' => _x('Testimonial', 'post type singular name'),
		'add_new' => _x('Add new', 'slide item'),
		'add_new_item' => __('Add new testimonial'),
		'edit_item' => __('Edit testimonial'),
		'new_item' => __('New testimonial'),
		'view_item' => __('View testimonial'),
		'search_items' => __('Search'),
		'not_found' =>  __('Not found'),
		'not_found_in_trash' => __('Nothing found in trash'),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'exclude_from_search' => false,
		'public' => true,
		'publicly_queryable' => true,
		'show_in_menu' => true, 
		'show_ui' => true,
		'query_var' => true,
		'menu_icon'=> 'dashicons-editor-quote',
		'rewrite' => array( 'slug' => 'testimonials', 'with_front' => true ),
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 5,
		'supports' => array('title','editor')
	  ); 
 
	register_post_type( 'testimonials' , $args );

}


/*
 * adding "categories" and "tags" the custom post types (custom taxonomies)
 */
 
// for the CPT: testimonials
add_action( 'init', 'create_testimonials_taxonomies', 0 );
function create_testimonials_taxonomies() 
{
  // Add new taxonomy to MENU & make it hierarchical (like categories) ## DISPLAY CONTROL ##
   $testimoniallabels = array(
    'name' => _x( 'Display control', 'taxonomy general name' ),
    'singular_name' => _x( 'Page', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search' ),
    'all_items' => __( 'All pages' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit' ), 
    'update_item' => __( 'Update' ),
    'add_new_item' => __( 'Add new' ),
    'new_item_name' => __( 'New page' ),
    'menu_name' => __( 'Display control' ),
  ); 	

	register_taxonomy("pagedisplay", array("testimonials"), array("hierarchical" => true, "labels" => $testimoniallabels, "exclude_from_search" => true, "rewrite" => array( "slug" => "onpage" )));

}


/* 
 * CPT: meta data time
 */
 
add_action("admin_init", "admin_init");
 
function admin_init(){
 
  add_meta_box("successstoriesphotos-meta", "Success Story Photos", "ssphoto", "successstories", "side", "core");
  add_meta_box("thetrainers-meta", "Trainer Details", "thetrainersdetails", "thetrainers", "normal", "core");
  add_meta_box("testimonials-meta", "Testimonial Credit", "testimonialscredit", "testimonials", "normal", "core");
  add_meta_box("page-meta", "Background Overlay", "backgroundoverlay", "page", "side", "core");
}


function ssphoto() {
	global $post;
    $image_meta1 = 'ssphoto1';
    $image_id1 = get_post_meta( $post->ID, $image_meta1, true );
    $image_src1 = wp_get_attachment_url( $image_id1 );
    $image_meta2 = 'ssphoto2';
    $image_id2 = get_post_meta( $post->ID, $image_meta2, true );
    $image_src2 = wp_get_attachment_url( $image_id2 );
?>  
	<div><h4>Upload the BEFORE photo:</h4></div>
    <div class="custom_uploader">
        <img class="custom_media_image" src="<?php echo $image_src1; ?>" style="max-width: 100%;"/><br />
        <a href="#" class="custom_media_add" style="<?php echo ( ! $image_id1 ? '' : 'display:none;' ) ?>">Set image</a>
        <a href="#" class="custom_media_remove" style="<?php echo ( ! $image_id1 ? 'display:none;' : '' ) ?>">Remove</a>
        <input class="custom_media_id" type="hidden" name="<?php echo $image_meta1; ?>" value="<?php echo $image_id1; ?>">
    </div>
    <div><h4>Upload the NOW photo:</h4></div>
    <div class="custom_uploader">
        <img class="custom_media_image" src="<?php echo $image_src2; ?>" style="max-width: 100%;"/><br />
        <a href="#" class="custom_media_add" style="<?php echo ( ! $image_id2 ? '' : 'display:none;' ) ?>">Set image</a>
        <a href="#" class="custom_media_remove" style="<?php echo ( ! $image_id2 ? 'display:none;' : '' ) ?>">Remove</a>
        <input class="custom_media_id" type="hidden" name="<?php echo $image_meta2; ?>" value="<?php echo $image_id2; ?>">
    </div>
    <script>
    jQuery(document).ready(function ($) {
    var customMediaSelector = {
        init: function() {
            $('.custom_media_add').on('click', function (e) {
                var $el;
 
                e.preventDefault();
 
                $el = customMediaSelector.el = $(this).closest('div');
                $el.image = $el.find('.custom_media_image');
                $el.id = $el.find('.custom_media_id');
 
                customMediaSelector.frame().open();
            });
 
            $('.custom_media_remove').on('click', function (e) {
                var $el = $(this).closest('div');
 
                e.preventDefault();
 
                $el.find('.custom_media_image').attr('src', '').hide();
                $el.find('.custom_media_id').val('');
                $el.find('.custom_media_add, .custom_media_remove').toggle();
            });
        },
 
        // Update the selected image in the media library based on the attachment ID in the field.
        open: function() {
            var selection = this.get('library').get('selection'),
                attachment, selected;
 
            selected = customMediaSelector.el.id.val();
 
            if ( selected && '' !== selected && -1 !== selected && '0' !== selected ) {
                attachment = wp.media.model.Attachment.get( selected );
                attachment.fetch();
            }
 
            selection.reset( attachment ? [ attachment ] : [] );
        },
 
        // Update the control when an image is selected from the media library.
        select: function() {
            var $el = customMediaSelector.el,
                selection = this.get('selection'),
                sizes = selection.first().get('sizes'),
                size;
 
            // Insert the selected attachment id into the target element.
            $el.id.val( selection.first().get( 'id' ) );
 
            // Update the image preview tag.
            if ( sizes ) {
                // The image size to show for the preview.
                size = sizes['thumbnail'] || sizes.medium;
            }
 
            size = size || selection.first().toJSON();
 
            $el.image.attr( 'src', size.url ).show();
            $el.find('.custom_media_add, .custom_media_remove').toggle();
 
            selection.reset();
        },
 
        // Initialize a new frame or return an existing frame.
        frame: function() {
            if ( this._frame )
                return this._frame;
 
            this._frame = wp.media({
                title: 'Set Image',
                library: {
                    type: 'image'
                },
                button: {
                    text: 'Set image'
                },
                multiple: false
            });
 
            this._frame.on( 'open', this.open ).state('library').on( 'select', this.select );
 
            return this._frame;
        }
    };
 
    customMediaSelector.init();
});
    </script>
<?php
}

function thetrainersdetails(){
  global $post;
  $custom = get_post_custom($post->ID);
  $trainertitle = $custom["trainertitle"][0];
  $trainercerts = $custom["trainercerts"][0];
    
  ?>
	<div class="custommetabox">
		<label class="detaillabel">Trainer's Title:</label>
		<input name="trainertitle" value="<?php echo $trainertitle; ?>" />
	</div>
	<div class="custommetabox">
		<label class="detaillabel">Trainer's Certifications: </label>
		<textarea name="trainercerts" value="<?php echo $trainercerts; ?>" /><?php echo $trainercerts; ?></textarea>
	</div>
	<br clear="all" />
	<style>
		.custommetabox {padding:10px; margin:5px;}
		.detaillabel {display:block;}
		.custommetabox input, .custommetabox textarea {width:80%;}
	</style>
  <?php
} // end thetrainersdetails


function testimonialscredit(){
  global $post;
  $custom = get_post_custom($post->ID);
  $quotecredit = $custom["quotecredit"][0];
    
  ?>
	<div class="custommetabox">
		<label class="detaillabel">Quote Credit:</label>
		<input name="quotecredit" value="<?php echo $quotecredit; ?>" />
	</div>
	<br clear="all" />
	<style>
		.custommetabox {padding:10px; margin:5px;}
		.detaillabel {display:block;}
		.custommetabox input, .custommetabox textarea {width:80%;}
	</style>
  <?php
} // end testimonialscredit

function backgroundoverlay(){
  global $post;
  echo '<input type="hidden" name="backgroundoverlay_meta_noncename" id="backgroundoverlay_meta_noncename" value="' .
		wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
	$backgroundoverlay = get_post_meta($post->ID, 'backgroundoverlay', true);
  ?>
	<div class="custommetabox">
		<label class="detaillabel"><strong>Background Overlay:</strong> </label>
		<select name="backgroundoverlay">
			<option<?php selected( get_post_meta($post->ID, 'backgroundoverlay', true), 'None' ); ?>>None</option>
			<option<?php selected( get_post_meta($post->ID, 'backgroundoverlay', true), 'Red_Lines' ); ?>>Red_Lines</option>
			<option<?php selected( get_post_meta($post->ID, 'backgroundoverlay', true), 'Orange_Lines' ); ?>>Orange_Lines</option>
			<option<?php selected( get_post_meta($post->ID, 'backgroundoverlay', true), 'Yellow_Lines' ); ?>>Yellow_Lines</option>
			<option<?php selected( get_post_meta($post->ID, 'backgroundoverlay', true), 'Green_Lines' ); ?>>Green_Lines</option>
			<option<?php selected( get_post_meta($post->ID, 'backgroundoverlay', true), 'Blue_Lines' ); ?>>Blue_Lines</option>
			<option<?php selected( get_post_meta($post->ID, 'backgroundoverlay', true), 'Grey_Lines' ); ?>>Grey_Lines</option>
		</select>
	</div>
	<br clear="all" />
	<style>
		.custommetabox {padding:10px; margin:5px;}
		.detaillabel {display:block;}
		.custommetabox input {width:80%;}
	</style>
  <?php
} // end testimonialscredit



add_action('save_post', 'save_details');

function save_details(){
  global $post;
  
  $post_id = $post->ID;

  // to prevent metadata or custom fields from disappearing...
  if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
    return $post_id;
 
  update_post_meta($post->ID, "trainertitle", $_POST["trainertitle"]);
  update_post_meta($post->ID, "trainercerts", $_POST["trainercerts"]);
  
  update_post_meta($post->ID, "quotecredit", $_POST["quotecredit"]);
  
  update_post_meta($post->ID, "backgroundoverlay", $_POST["backgroundoverlay"]);
  
  update_post_meta($post->ID, "ssphoto1", $_POST["ssphoto1"]);
  update_post_meta($post->ID, "ssphoto2", $_POST["ssphoto2"]);
  


}



/**
 * end custom post types
 **/
 


 /**
 * custom excerpt lengtnth. usage example: echo excerpt(25);
 **/
 
function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'... ';
    $excerpt .= '<a class="readmore" href="';
    $excerpt .= get_permalink();
    $excerpt .= '">Continue reading&nbsp;&raquo;</a>';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'... ';
  } else {
    $content = implode(" ",$content);
  }
  $content = preg_replace('/[+]/','', $content);
  $content = apply_filters('the_content', $content);
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}

function hybridexcerpt($limit) {
  $hybridexcerpt = explode(' ', get_the_content(), $limit);
  if (count($hybridexcerpt)>=$limit) {
    array_pop($hybridexcerpt);
		$hybridexcerpt = implode(" ",$hybridexcerpt);
		$hybridexcerpt .= '... &nbsp; <a class="readmore" href="';
		$hybridexcerpt .= get_permalink();
		$hybridexcerpt .= '">More&nbsp;&raquo;</a>';
  } else {
    $hybridexcerpt = implode(" ",$hybridexcerpt);
  }
  $hybridexcerpt = preg_replace('/[+]/','', $hybridexcerpt);
  $hybridexcerpt = apply_filters('the_content', $hybridexcerpt);
  $hybridexcerpt = strip_tags($hybridexcerpt, '<p><a><b><br /><li><ol><ul>');
  return $hybridexcerpt;
}

/**
 * get the slug function junction. what's your ... function
 */
 
function the_slug() {
    $post_data = get_post($post->ID, ARRAY_A);
    $slug = $post_data['post_name'];
    return $slug; 
}
 
 /**
 * Register widgetized area, multiple sidebars & default widgets
 */

function cf100_widgets_init() {
	register_sidebar(array('name' => 'Homepage: Left column', 'before_widget' => '<aside id="%1$s" class="widgetBox %2$s">', 'after_widget' => '</aside>', 'before_title' => '<h3 class="widgetTitle">', 'after_title' => '</h3>'));
	register_sidebar(array('name' => 'Homepage: Center column', 'before_widget' => '<aside id="%1$s" class="widgetBox %2$s">', 'after_widget' => '</aside>', 'before_title' => '<h3 class="widgetTitle">', 'after_title' => '</h3>'));
	register_sidebar(array('name' => 'Homepage: Right column', 'before_widget' => '<aside id="%1$s" class="widgetBox %2$s">', 'after_widget' => '</aside>', 'before_title' => '<h3 class="widgetTitle">', 'after_title' => '</h3>'));
	register_sidebar(array('name' => 'Break 1: one column testimonial', 'before_widget' => '<aside id="%1$s" class="widgetBox %2$s">', 'after_widget' => '</aside>', 'before_title' => '<h3 class="hide">', 'after_title' => '</h3>'));
	register_sidebar(array('name' => 'Break 2: right side', 'before_widget' => '<aside id="%1$s" class="widgetBox %2$s">', 'after_widget' => '</aside>', 'before_title' => '<h3 class="hide">', 'after_title' => '</h3>'));
	register_sidebar(array('name' => 'Break 3: one column testimonial', 'before_widget' => '<aside id="%1$s" class="widgetBox %2$s">', 'after_widget' => '</aside>', 'before_title' => '<h3 class="hide">', 'after_title' => '</h3>'));
	register_sidebar(array('name' => 'Break 4: one column call to action', 'before_widget' => '<aside id="%1$s" class="widgetBox %2$s">', 'after_widget' => '</aside>', 'before_title' => '<h3 class="hide">', 'after_title' => '</h3>'));
	register_sidebar(array('name' => 'Sidebar: default', 'before_widget' => '<aside id="%1$s" class="widgetBox %2$s">', 'after_widget' => '</aside>', 'before_title' => '<h3 class="widgetTitle">', 'after_title' => '</h3>'));
	register_sidebar(array('name' => 'Sidebar: Contact us page', 'before_widget' => '<aside id="%1$s" class="widgetBox %2$s">', 'after_widget' => '</aside>', 'before_title' => '<h3 class="widgetTitle">', 'after_title' => '</h3>'));
	register_sidebar(array('name' => 'Footer: left', 'before_widget' => '<aside id="%1$s" class="widgetBox %2$s">', 'after_widget' => '</aside>', 'before_title' => '<strong>', 'after_title' => '</strong>'));
	register_sidebar(array('name' => 'Footer: right', 'before_widget' => '<aside id="%1$s" class="widgetBox %2$s">', 'after_widget' => '</aside>', 'before_title' => '<strong>', 'after_title' => '</strong>'));
}
add_action( 'widgets_init', 'cf100_widgets_init' );

/*
 * adding more image sizes (slideshow, headers, thumbnails, etc)
 */

if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'success-story-thumbnail', 350, 640, true ); //(cropped)
	add_image_size( 'child-page-thumbnail', 400, 400, true ); //(cropped)
}

/*
 * gallery inline code fix
 */

//remove inline style for gallery shortcode
add_filter( 'use_default_gallery_style', '__return_false' );
