<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="archive-wrapper">

  <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

    <div class="row">

      <!-- Do the left sidebar check -->
      <?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

      <main class="site-main" id="main">

        <?php if ( have_posts() ) : ?>

          <header class="page-header">
            <h1>Recommendations</h1>
            <p class="recommendations-subheader">A collection of highlights from art and life.</p>
          </header><!-- .page-header -->

          <?php /* Start the Loop */ ?>
          <?php while ( have_posts() ) : the_post(); ?>

            <?php

            /*
             * Include the Post-Format-specific template for the content.
             * If you want to override this in a child theme, then include a file
             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
             */
            get_template_part( 'loop-templates/content', 'recommendation' );
            ?>

          <?php endwhile; ?>

        <?php else : ?>

          <?php get_template_part( 'loop-templates/content', 'none' ); ?>

        <?php endif; ?>

      </main><!-- #main -->

      <!-- The pagination component -->
      <?php understrap_pagination(); ?>

      <!-- Do the right sidebar check -->
      <?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

    </div> <!-- .row -->

  </div><!-- #content -->

  </div><!-- #archive-wrapper -->

<?php get_footer(); ?>