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

/********************* Invitations A - Abend des 13.05.2020 im AA  ******************/
if ( is_page(24)) {	
	/****** Checks if word "Code" exists in the URL
	/****** Takes 6 chars after the word "code"
	/****** Checks if the code is in the database 
	/****** If it is in the database then it checks if has_been_sent=0  */	 
	require (get_stylesheet_directory().'/code-validation/invitations-a.php');
} 

/********************* Invitations B - Teilnahme an der gesamten Konferenz ************/
if ( is_page(107)) {	 
	require (get_stylesheet_directory().'/code-validation/invitations-b.php');
} 

/********************* Invitations C - Abendveranstaltung am 14.05.2020 ************/
if ( is_page(109)) {		 
	require (get_stylesheet_directory().'/code-validation/invitations-c.php');	
} ?>




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