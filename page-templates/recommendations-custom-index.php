<?php
/**
 * Template Name: Recommendations Custom Template
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

      <main class="site-main site-main__recommendations" id="main">

        <?php while ( have_posts() ) : the_post(); ?>

          <!-- Above Content -->

          <?php get_template_part( 'loop-templates/content', 'page' ); ?>

          <!-- Below Content -->

          <!-- begin: display custom post type -->

          <div class="recommendations-divider"></div>

          <h3 class="recommendations-header">View My Recommendations</h3>
          <p class="recommendations-subheader">A collection of highlights from around the New York art scene.</p>

          <?php
            $recommendations = new WP_QUERY( array(
              'posts_per_page' => 3,
              'post_type' => 'recommendation'
            )); ?>

          <ul class="rec-list">

          <?php
            while($recommendations->have_posts()) {
              $recommendations->the_post(); ?>

            <li class="rec-list__item">
              <p class="rec-list__text"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
              <!-- <p class="rec-list__description"><?php echo wp_trim_words(get_the_content(), 10); ?></p> -->
              <!-- <p class="rec-list__read-more"><a href="<?php the_permalink(); ?>">Read More</a></p> -->
            </li>

          <?php } ?>

          </ul>

          <!-- end: display custom post type -->

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
