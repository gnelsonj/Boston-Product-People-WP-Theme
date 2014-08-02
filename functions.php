<?php
/*
Author: Eddie Machado
URL: htp://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

/************* INCLUDE NEEDED FILES ***************/

/*
1. library/bones.php
	- head cleanup (remove rsd, uri links, junk css, ect)
	- enqueueing scripts & styles
	- theme support functions
	- custom menu output & fallbacks
	- related post function
	- page-navi function
	- removing <p> from around images
	- customizing the post excerpt
	- custom google+ integration
	- adding custom fields to user profiles
*/
require_once( 'library/bones.php' ); // if you remove this, bones will break
/*
/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'bones-thumb-600', 600, 150, true );
add_image_size( 'bones-thumb-300', 300, 100, true );
/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image,
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'Sidebar 1', 'bonestheme' ),
		'description' => __( 'The first (primary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __( 'Sidebar 2', 'bonestheme' ),
		'description' => __( 'The second (secondary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!

/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<header class="comment-author vcard">
				<?php
				/*
					this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
					echo get_avatar($comment,$size='32',$default='<path_to_url>' );
				*/
				?>
				<?php // custom gravatar call ?>
				<?php
					// create variable
					$bgauthemail = get_comment_author_email();
				?>
				<img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=32" class="load-gravatar avatar avatar-48 photo" height="32" width="32" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
				<?php // end custom gravatar call ?>
				<?php printf(__( '<cite class="fn">%s</cite>', 'bonestheme' ), get_comment_author_link()) ?>
				<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'bonestheme' )); ?> </a></time>
				<?php edit_comment_link(__( '(Edit)', 'bonestheme' ),'  ','') ?>
			</header>
			<?php if ($comment->comment_approved == '0') : ?>
				<div class="alert alert-info">
					<p><?php _e( 'Your comment is awaiting moderation.', 'bonestheme' ) ?></p>
				</div>
			<?php endif; ?>
			<section class="comment_content clearfix">
				<?php comment_text() ?>
			</section>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</article>
	<?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!

/************* SEARCH FORM LAYOUT *****************/

// Search Form
function bones_wpsearch($form) {
	$form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
	<label class="screen-reader-text" for="s">' . __( 'Search for:', 'bonestheme' ) . '</label>
	<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . esc_attr__( 'Search the Site...', 'bonestheme' ) . '" />
	<input type="submit" id="searchsubmit" value="' . esc_attr__( 'Search' ) .'" />
	</form>';
	return $form;
} // don't remove this bracket!

add_filter('authenticate', 'leadin_vip_allow_email_login', 20, 3);

/**
 * leadin_vip_allow_email_login filter to the authenticate filter hook, to fetch a username based on entered email
 *
 * @param  obj $user
 * @param  string $username [description]
 * @param  string $password [description]
 * @return boolean
 */
function leadin_vip_allow_email_login ( $user, $username, $password ) 
{


    // Skip the login form is the user is logged in
    if ( current_user_can('vip') )
	{
	    wp_redirect('/vip-settings');
	    exit;
	}

	wp_enqueue_style();
	wp_register_style('leadin-admin-css', get_stylesheet_directory_uri() . '/leadin-login.css');
    wp_enqueue_style('leadin-admin-css');

    if ( is_email( $username ) ) 
    {
        $user = get_user_by_email( $username );
        if ( $user ) 
        	$username = $user->user_login;
    }

    return wp_authenticate_username_password(null, $username, $password );
}
 
add_filter( 'gettext', 'addEmailToLogin', 20, 3 );

/**
 * addEmailToLogin function to add email address to the username label
 *
 * @param string $translated_text   translated text
 * @param string $text              original text
 * @param string $domain            text domain
 */
function addEmailToLogin ( $translated_text, $text, $domain ) 
{
    if ( "Username" == $translated_text )
        $translated_text = __( 'Email');

    return $translated_text;
}

function add_roles_on_plugin_activation () 
{
       add_role( 'custom_role', 'Custom Subscriber', array( 'read' => true, 'level_0' => true ) );
}

register_activation_hook( __FILE__, 'add_roles_on_plugin_activation' );

// redirect VIP users to settings page if they try to access the wp-admin backend
if ( current_user_can('vip') ) 
{
	add_filter('show_admin_bar', '__return_false');

	if ( strstr($_SERVER['REQUEST_URI'], 'wp-admin') )
	{
		wp_redirect('/vip-settings');
		exit;
	}
}

add_role('vip', 'VIP', array(
    'read' => true // True allows that capability
));

add_action('init', 'cptui_register_my_cpt_landing_page');
function cptui_register_my_cpt_landing_page() {
register_post_type('landing_page', array(
'label' => 'Landing Pages',
'description' => '',
'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'capability_type' => 'post',
'map_meta_cap' => true,
'hierarchical' => false,
'rewrite' => array('slug' => 'plugins', 'with_front' => true),
'query_var' => true,
'supports' => array('title','editor','excerpt','trackbacks','custom-fields','comments','revisions','thumbnail','author','page-attributes','post-formats'),
'labels' => array (
  'name' => 'Landing Pages',
  'singular_name' => 'Landing Page',
  'menu_name' => 'Landing Pages',
  'add_new' => 'Add Landing Page',
  'add_new_item' => 'Add New Landing Page',
  'edit' => 'Edit',
  'edit_item' => 'Edit Landing Page',
  'new_item' => 'New Landing Page',
  'view' => 'View Landing Page',
  'view_item' => 'View Landing Page',
  'search_items' => 'Search Landing Pages',
  'not_found' => 'No Landing Pages Found',
  'not_found_in_trash' => 'No Landing Pages Found in Trash',
  'parent' => 'Parent Landing Page',
)
) ); }

add_action('init', 'cptui_register_my_taxes_categories');
function cptui_register_my_taxes_categories() {
register_taxonomy( 'categories',array (
  0 => 'landing_page',
),
array( 'hierarchical' => false,
	'label' => 'Categories',
	'show_ui' => true,
	'query_var' => true,
	'show_admin_column' => false,
	'labels' => array (
  'search_items' => 'Category',
  'popular_items' => '',
  'all_items' => '',
  'parent_item' => '',
  'parent_item_colon' => '',
  'edit_item' => '',
  'update_item' => '',
  'add_new_item' => '',
  'new_item_name' => '',
  'separate_items_with_commas' => '',
  'add_or_remove_items' => '',
  'choose_from_most_used' => '',
)
) ); 
}

add_filter('query_vars', 'add_my_var');
function add_my_var( $public_query_vars ) {
	$public_query_vars[] = 'plugin_char';
	return $public_query_vars;
}

function add_rewrite_rules($aRules) {
$aNewRules = array('browse-plugins/([^/]+)/?$' => 'index.php?pagename=browse-plugins&plugin_char=$matches[1]');
$aRules = $aNewRules + $aRules;
return $aRules;
}
 
// hook add_rewrite_rules function into rewrite_rules_array
add_filter('rewrite_rules_array', 'add_rewrite_rules');

?>
