<?php
/**
 * Template Name: About Page Template
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="page-wrapper">

  <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

    <div class="row">

      <!-- Do the left sidebar check -->
      <?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

      <main class="site-main site-main__about" id="main">

        <?php while ( have_posts() ) : the_post(); ?>

          <!-- Above Content -->

          <?php get_template_part( 'loop-templates/content', 'page' ); ?>

          <!-- Below Content -->

          <?php
          // If comments are open or we have at least one comment, load up the comment template.
          if ( comments_open() || get_comments_number() ) :
            comments_template();
          endif;
          ?>

        <?php endwhile; // end of the loop. ?>

      </main><!-- #main -->

      <!-- Do the right sidebar check -->
      <?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

    </div><!-- .row -->

  </div><!-- #content -->

</div><!-- #page-wrapper -->

<?php get_footer(); ?>