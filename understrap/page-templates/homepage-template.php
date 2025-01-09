<?php
/**
 * Template Name: Homepage
 *
 * The is a custom template for the homepage.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

get_header( 'homepage' );

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="page-wrapper">

  <div class="row">

    <!-- Do the left sidebar check -->
    <?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

    <main class="site-main" id="main">

      <?php while ( have_posts() ) : the_post();
      
        // ACF vars
        $homepage_full_width_image = get_field('homepage_full_width_image');
        $blockquote = get_field('blockquote');
        $blockquote_citation = get_field('blockquote_citation');

        ?>

        <div class="home-hero container">
          <div class="home-hero-content">
            <?php the_content(); ?>
          </div>
        </div>

      <?php endwhile; // end of the loop. ?>

      <?php if(!empty($homepage_full_width_image)): ?>
        <div class="full-width-image" style="background-image: url(<?php echo $homepage_full_width_image['url']; ?>);"></div>
      <?php endif; ?>

      <div class="container">

        <div class="content-columns">
          <div class="content-col-1">
            <h3 class="services-header animated-element">Creative services for the visual arts</h3>
          </div>
          <div class="content-col-2">
            <ul class="services-list">
              <li class="services-list-item">Research</li>
              <li class="services-list-item">Writing</li>
              <li class="services-list-item">Exhibition curation and development</li>
              <li class="services-list-item">Digital Content</li>
              <li class="services-list-item">Collection Management</li>
              <li class="services-list-item">Developmental Editing</li>
            </ul>
          </div>
        </div>

        <?php if( have_rows('homepage_exhibitions') ): ?>

          <?php while( have_rows('homepage_exhibitions') ): the_row(); 

            // ACF vars
            $image = get_sub_field('image');
            $title = get_sub_field('title');
            $text = get_sub_field('text');
            $url = get_sub_field('url');
            $image_placement = get_sub_field('image_placement');
            $full_width_image = get_sub_field('full_width_image');

            ?>

            <div class="content-columns<?php if($image_placement == 'Image on the right'): ?> reverse<?php endif; ?><?php if($full_width_image): ?> full-width<?php endif; ?>">
              <div class="content-col-1">
                <?php if(!empty($url)): ?>
                  <a class="img-link" href="<?php echo $url; ?>">
                <?php endif; ?>
                <?php if(!empty($image)): ?>
                  <img class="animated-element" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                <?php endif; ?>
                <?php if(!empty($url)): ?>
                  </a>
                <?php endif; ?>
              </div>
              <div class="content-col-2">
                <h3><?php echo $title; ?></h3>
                <?php if(!empty($text)): ?>
                  <p><?php echo $text; ?></p>
                <?php endif; ?>
              </div>
            </div>

          <?php endwhile; ?>

        <?php endif; ?>

        <?php if(!empty($blockquote)): ?>
          <div class="blockquote-wrapper">
            <h2 class="quotemark">&#8220;</h2>
            <div class="blockquote-inner">
              <blockquote>
                <h4><?php echo $blockquote; ?></h4>
              </blockquote>
              <p class="blockquote-citation"><?php echo $blockquote_citation; ?></p>
            </div>
          </div>
        <?php endif; ?>

        <div class="content-columns cta">
          <div class="content-col-1">
            <h2>Interested in working together? Let&rsquo;s chat!</h2>
          </div>
          <div class="content-col-2">
            <a class="contact-btn animated-element" href="mailto:jillian.russo@gmail.com">Contact</a>
          </div>
        </div>

      </div>

    </main><!-- #main -->

    <!-- Do the right sidebar check -->
    <?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

  </div><!-- .row -->

</div><!-- #page-wrapper -->

<?php get_footer(); ?>
