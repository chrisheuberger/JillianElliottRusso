<?php
/**
 * Partners page partial template.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
?>

<!-- loop-templates/content-partners.php -->

<?php if( have_rows('partners_block') ): ?>

  <?php while( have_rows('partners_block') ): the_row(); 

    // ACF vars
    $title = get_sub_field('partners_block_title');
    $date = get_sub_field('partners_block_date');
    $image = get_sub_field('partners_block_image');

    ?>

    <article class="acf-block">

      <?php if(!empty($image)): ?>
        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
      <?php endif; ?>

      <header class="entry-header acf-title">
        
        <?php if(!empty($date)): ?>
          <div class="entry-meta">
            <span class="posted-on"><?php echo $date; ?></span>
          </div>
        <?php endif; ?>

        <?php echo $title; ?>

      </header><!-- .entry-header -->

    </article>

  <?php endwhile; ?>

<?php endif; ?>
