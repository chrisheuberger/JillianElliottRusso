<?php
/**
 * Template Name: Links Page Template
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

  <main class="wrapper" id="links-wrapper">
    <img class="linktree-img" src="<?php echo get_template_directory_uri().'/img/jillian-profile-silhouette-cropped.jpg'; ?>" alt="Jillian's profile photo">
    <a class="linktree-mark-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
      <img class="linktree-mark-img linktree-mark-img-main" src="<?php echo get_template_directory_uri().'/img/jillian-russo-wordmark-extended.svg'; ?>" alt="Jillian Russo Curatorial Consultant LLC">
      <img class="linktree-mark-img linktree-mark-img-hover" src="<?php echo get_template_directory_uri().'/img/jillian-russo-wordmark-extended-hover.svg'; ?>" alt="Jillian Russo Curatorial Consultant LLC">
    </a>

    <?php while ( have_posts() ) : the_post(); ?>
      <!-- Above Content -->
      <?php get_template_part( 'loop-templates/content', 'page' ); ?>
      <!-- Below Content -->
    <?php endwhile; // end of the loop. ?>

  </main><!-- #links-wrapper -->

<?php get_footer(); ?>
