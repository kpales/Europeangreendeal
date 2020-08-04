<?php
/*********************  EMOJI Script Rausnehmen ********************/
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' ); 
function my_deregister_scripts(){
  wp_deregister_script( 'wp-embed' );
  }
  add_action( 'wp_footer', 'my_deregister_scripts' );


  add_action('after_setup_theme', 'remove_admin_bar');
 
  
/********************* Disable Admin Bar for All Users Except for Administrators ********************/
function remove_admin_bar() {
  if (!current_user_can('administrator') && !is_admin()) {
    show_admin_bar(false);
  }
}

/********************* Enqueue Scripts ********************/  
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

function my_theme_enqueue_styles() {
 
    $parent_style = 'parent-style'; // This is 'twentytwenty-style' for the Twenty Twenty theme.
 
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css?v=33gqaszphf2r' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/css/app.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
	);
	
	wp_enqueue_script('jquery1', '//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), true);
    wp_enqueue_script( 'website-script', '/wp-content/themes/twentytwenty-child/js/scripts.js?v=33qapguzrf2', array(), '1.0.0', true );
}


/********************* Register Custom Gutenberg Blocks ********************/

//////////////////////////////// Shortcode - Show Content for logged in Users only
function member_only_shortcode($atts, $content = null)
{
    if (is_user_logged_in() && !is_null($content) && !is_feed()) {
        return $content;
    }
}
add_shortcode('member_only', 'member_only_shortcode');

//////////////////////////////// Shortcode - Show Content for viewers that are not logged in
function notloggedin_only_shortcode($atts, $content = null)
{
    if (!is_user_logged_in() && !is_null($content) && !is_feed()) {
        return $content;
    }
}
add_shortcode('notloggedin_only', 'notloggedin_only_shortcode');


//////////////////////////////// Shortcode - Show Content for viewers that have Accepted Candidate Role /////

function private_content($atts, $content = null) {
if (current_user_can('accepted_participant')) //replace my_role with the name of the role you want to see content
return do_shortcode('
' . $content . '
');
return '';
}
 
add_shortcode('accepted_participant_content', 'private_content');

//////////////////////////////// Shortcode - Show Content for viewers that have Accepted Candidate Role /////

function private_content1($atts, $content = null) {
if (is_user_logged_in() && !current_user_can('accepted_participant')) //replace my_role with the name of the role you want to see content
return do_shortcode('
' . $content . '
');
return '';
}
 
add_shortcode('not_accepted_participant_content', 'private_content1');

//==============* Update Invitations table *=====*/


add_action('frm_after_create_entry', 'copy_into_my_table', 20, 2);
function copy_into_my_table($entry_id, $form_id){

 

  if($form_id == 2){ //change 4 to the form id of the form to copy


    $code = $_POST['item_meta'][38];
    echo $code;
  
    $servername = "localhost";
    $username = "dbo819600357";
		$password = "rln9H78B?RtHdUqVHjwS1";
		$dbname = "db819600357"; 
		/*$username = "root";
		$password = "root";
		$dbname = "sharedhistory";*/

  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $conn->prepare("UPDATE Invitations SET has_been_sent=1 WHERE code='$code' ");
      $stmt->execute();
  }
  catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
  }
  $conn = null;
  }
}


/**
 * Register widget areas.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

remove_action( 'widgets_init', 'twentytwenty_sidebar_registration' );

function twentytwenty_sidebar_registration() {

	// Arguments used in all register_sidebar() calls.
	$shared_args = array(
		'before_title'  => '<h2 class="widget-title subheading heading-size-3">',
		'after_title'   => '</h2>',
		'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
		'after_widget'  => '</div></div>',
	);

	// Footer #1.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Footer #1', 'twentytwenty' ),
				'id'          => 'sidebar-1',
				'description' => __( 'Widgets in this area will be displayed in the first column in the footer.', 'twentytwenty' ),
			)
		)
	);

	// Footer #2.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Footer #2', 'twentytwenty' ),
				'id'          => 'sidebar-2',
				'description' => __( 'Widgets in this area will be displayed in the second column in the footer.', 'twentytwenty' ),
			)
		)
  );
  
  	// Footer #3.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Footer #3', 'twentytwenty' ),
				'id'          => 'sidebar-3',
				'description' => __( 'Widgets in this area will be displayed in the third column in the footer.', 'twentytwenty' ),
			)
		)
  );
  
    	// Footer #4.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Footer #4', 'twentytwenty' ),
				'id'          => 'sidebar-4',
				'description' => __( 'Widgets in this area will be displayed in the fourth column in the footer.', 'twentytwenty' ),
			)
		)
  );
  
      	// Footer #5.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Footer #5', 'twentytwenty' ),
				'id'          => 'sidebar-5',
				'description' => __( 'Widgets in this area will be displayed in the fifth column in the footer.', 'twentytwenty' ),
			)
		)
	);

	

}

add_action( 'widgets_init', 'twentytwenty_sidebar_registration' );


/***************  Add images to rest api */

function ws_register_images_field() {
    register_rest_field( 
        'post',
        'images',
        array(
            'get_callback'    => 'ws_get_images_urls',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}

add_action( 'rest_api_init', 'ws_register_images_field' );

function ws_get_images_urls( $object, $field_name, $request ) {
    $medium = wp_get_attachment_image_src( get_post_thumbnail_id( $object->id ), 'medium' );
    $medium_url = $medium['0'];

    return array(
        'medium' => $medium_url,
    );
}

