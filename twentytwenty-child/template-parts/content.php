<?php
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>


<?php

function getAddress() {
   // $protocol = $_SERVER['HTTPS'] == 'on' ? 'https' : 'http';
    return 'https'.'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
}

if( is_page(24)) {

$url=getAddress();

if (strpos($url, "code") == false){
	echo 'This registration link is no longer valid';
	die();
}

$id = substr($url, strpos($url, "code") + strlen($needle), 6);
//$id = strval(substr($url, -6));
echo 'Code is ' . $id . ' ';



	class TableRows extends RecursiveIteratorIterator {
		function __construct($it) {
			parent::__construct($it, self::LEAVES_ONLY);
		}
	} 
	$servername = "localhost";
	$username = "dbo819600357";
	$password = "rln9H78B?RtHdUqVHjwS1";
	$dbname = "db819600357";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT has_been_sent FROM Invitations WHERE code='$id' ");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
		echo $v;
		
		if ($v == 1) {
			echo 'This code has already been used';
			die();
		}
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;

}

?>




<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php

	get_template_part( 'template-parts/entry-header' );

	if ( ! is_search() ) {
		get_template_part( 'template-parts/featured-image' );
	}

	?>

	<div class="post-inner <?php echo is_page_template( 'templates/template-full-width.php' ) ? '' : 'thin'; ?> ">

		<div class="entry-content">

			<?php
			if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
				the_excerpt();
			} else {
				the_content( __( 'Continue reading', 'twentytwenty' ) );
			}
			?>

		</div><!-- .entry-content -->

	</div><!-- .post-inner -->

	<div class="section-inner">
		<?php
		wp_link_pages(
			array(
				'before'      => '<nav class="post-nav-links bg-light-background" aria-label="' . esc_attr__( 'Page', 'twentytwenty' ) . '"><span class="label">' . __( 'Pages:', 'twentytwenty' ) . '</span>',
				'after'       => '</nav>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			)
		);

		edit_post_link();

		// Single bottom post meta.
		twentytwenty_the_post_meta( get_the_ID(), 'single-bottom' );

		if ( is_single() ) {

			get_template_part( 'template-parts/entry-author-bio' );

		}
		?>

	</div><!-- .section-inner -->

	<?php

	if ( is_single() ) {

		get_template_part( 'template-parts/navigation' );

	}

	/**
	 *  Output comments wrapper if it's a post, or if comments are open,
	 * or if there's a comment number – and check for password.
	 * */
	if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
		?>

	<div class="comments-wrapper section-inner">

		<?php comments_template(); ?>

	</div><!-- .comments-wrapper -->

	<?php
	}
	?>

</article><!-- .post -->