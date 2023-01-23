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

        <div class="content-columns services-bullet-point-list-wrapper">
          <div class="content-col-1">
            <h3 class="services-header">Creative services for the visual arts</h3>
            <div class="services-btn-wrapper services-btn-desktop">
              <a class="services-btn animated-element" href="<?php echo site_url('/services'); ?>">Learn More</a>
            </div>
          </div>
          <div class="content-col-2">
            <ul class="services-list">
              <li class="services-list-item">Research</li>
              <li class="services-list-item">Writing</li>
              <li class="services-list-item">Exhibition Curation and Development</li>
              <li class="services-list-item">Digital Content</li>
              <li class="services-list-item">Collection Management</li>
              <li class="services-list-item">Strategic Planning</li>
            </ul>
            <div class="services-btn-wrapper services-btn-mobile">
              <a class="services-btn animated-element" href="<?php echo site_url('/services'); ?>">Learn More</a>
            </div>
          </div>
        </div>

        <!-- services as grid -->

        <!-- <div class="services-wrapper">
          <h3 class="services-header animated-element">Creative services for the visual arts</h3>
          <ul class="services-list">
            <li class="services-list-item"><p class="services-list-name">Exhibition Curation and Development</p></li>
            <li class="services-list-item"><p class="services-list-name">Research</p></li>
            <li class="services-list-item"><p class="services-list-name">Writing</p></li>
            <li class="services-list-item"><p class="services-list-name">Collection Management</p></li>
            <li class="services-list-item"><p class="services-list-name">Digital Content</p></li>
            <li class="services-list-item"><p class="services-list-name">Strategic Planning</p></li>
          </ul>
          <div class="services-btn-wrapper">
            <a class="services-btn animated-element" href="<?php echo site_url('/services'); ?>">Learn More</a>
          </div>
        </div> -->

        <?php if( have_rows('homepage_exhibitions') ): ?>
          <?php while( have_rows('homepage_exhibitions') ): the_row(); 

            // ACF vars
            $title = get_sub_field('title');
            $text = get_sub_field('text');
            $url = get_sub_field('url');
            $image = get_sub_field('image');
            $image_credit = get_sub_field('image_credit');
            $image_placement = get_sub_field('image_placement');
            $full_width_image = get_sub_field('full_width_image');

            ?>

            <div class="content-columns<?php if($image_placement == 'Image on the right'): ?> reverse<?php endif; ?><?php if($full_width_image): ?> full-width<?php endif; ?>">
              <div class="content-col-1">
                <?php if(!empty($url)): ?>
                  <a class="exhibition-module-image-link" href="<?php echo $url; ?>">
                <?php endif; ?>
                  <?php if(!empty($image)): ?>
                    <div class="exhibition-module-image-wrapper animated-element">
                      <img class="exhibition-module-image" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                  <?php endif; ?>
                  <?php if(!empty($image_credit)): ?>
                      <p class="exhibition-module-image-credit"><?php echo $image_credit; ?></p>
                    </div>
                  <?php else: ?>
                    </div>
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
              <blockquote class="animated-element">
                <h4><?php echo $blockquote; ?></h4>
              </blockquote>
              <p class="blockquote-citation"><?php echo $blockquote_citation; ?></p>
            </div>
          </div>
        <?php endif; ?>

      </div>
      
      <div class="full-width-img-homepage-module">
        <div class="full-width-img-homepage-module-img" style="background-image: url(<?php echo get_template_directory_uri().'/img/hollis-taggart-interior.jpg'; ?>);"></div>
        <!-- <div class="container">
          <div class="full-width-img-homepage-module-text">
            <h3>Remnant Romance Environmental Works: Idelle Weber and Aurora Robson at Hollis Taggart</h3>
          </div>
        </div> -->
      </div>

      <div class="partners-container">
        <div class="container">
          <div class="content-columns partners-wrapper">
            <div class="content-col-1">
              <h2 class="animated-element">Selected Partners</h2>
            </div>
            <div class="content-col-2">
              <ul>
                <li>Hollis Taggart</li>
                <li>International Print Center New York</li>
                <li>Kaish Family Art Project</li>
                <li>The Art Students League</li>
                <li>The Richard Pousette-Dart Foundation</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="container">

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
