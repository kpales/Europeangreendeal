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
 
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/css/app.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
	);
	
	wp_enqueue_script('jquery1', '//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), true);
    wp_enqueue_script( 'website-script', '/wp-content/themes/twentytwenty-child/js/scripts.js', array(), '1.0.0', true );
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


    $code = $_POST['item_meta'][6];
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




