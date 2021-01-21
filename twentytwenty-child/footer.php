<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>
<div class="container p-0">

    <footer id="site-footer" role="contentinfo">
        <div class="row mx-0">
            <div class="footer-sites col-12">
                <a target="blank"
                   href="<?php echo esc_url(__(site_url('/imprint'))); ?>"><?php echo get_the_title(12); ?></a>
                <a target="_blank"
                   href="https://www.bmwi.de/Navigation/EN/Service/Privacy-Policy/privacy-policy.html">Privacy Policy</a>
            </div><!-- .powered-by-wordpress -->




        </div>
    </footer><!-- #site-footer -->

</div>

<a class="to-the-top" href="#site-header">
    <i class="fas fa-arrow-up"></i>
</a><!-- .to-the-top -->
<?php wp_footer(); ?>

</body>
</html>
