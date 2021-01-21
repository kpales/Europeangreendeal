<?php
/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/91b09803b7.js" crossorigin="anonymous"></script>
		<link rel="profile" href="https://gmpg.org/xfn/11">

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>

		<?php
		wp_body_open();
		?>
        <div class="container">
		<header id="site-header" class="d-flex col-12" role="banner">

          <div class="col-2 d-flex header-logo">
                <?php echo get_custom_logo();?>
            </div>
            <div class="col-10 header-text">
                <?php the_field('header_text');?>
            </div>

	<!--					--><?php
/*							// Site title or logo.
							twentytwenty_site_logo();
						*/?>


		</header><!-- #site-header -->
        </div>
		<?php
		// Output the menu modal.
		get_template_part( 'template-parts/modal-menu' );
