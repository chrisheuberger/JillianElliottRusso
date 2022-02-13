<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper footer-wrapper" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer" id="colophon">

					<div class="site-info">

						<p>&copy; <?php echo date('Y'); ?> Jillian Russo | Site by Jillian's husband, <a href="https://www.chrisheuberger.com/">Chris</a>.</p>

					</div><!-- .site-info -->

					<ul class="footer-social">
						<li><a href="https://www.linkedin.com/in/jillian-russo-93912211/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="https://www.instagram.com/jillian.e.russo/" target="_blank"><i class="fa fa-instagram"></i></a></li>
						<li><a href="https://twitter.com/RussoJillian/" target="_blank"><i class="fa fa-twitter"></i></a></li>
					</ul>

				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>
