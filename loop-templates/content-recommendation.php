<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
?>

<!-- loop-templates/content-recommendation.php -->

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

  <header class="entry-header">

    <?php
    the_title(
      sprintf( '<h4 class="entry-title recommendation-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
      '</a></h4>'
    );
    ?>

    <?php if ( 'post' == get_post_type() ) : ?>

      <div class="entry-meta">
        <?php custom_posted_on(); ?>
      </div><!-- .entry-meta -->

    <?php endif; ?>

  </header><!-- .entry-header -->

  <?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

  <div class="entry-content">

    <?php the_excerpt(); ?>

  </div><!-- .entry-content -->

</article><!-- #post-## -->
