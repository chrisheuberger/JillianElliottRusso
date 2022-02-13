<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
$category = get_the_category();
$firstCategory = $category[0]->cat_name;
?>

<!-- loop-templates/content-single.php -->

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

    <?php if ($firstCategory != 'exhibitions') : ?>

			<div class="entry-meta">
				<?php custom_posted_on(); ?>
			</div><!-- .entry-meta -->

		<?php endif; ?>

	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php the_content(); ?>

	</div><!-- .entry-content -->

</article><!-- #post-## -->
