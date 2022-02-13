<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$exhibition_description = get_field('exhibition_description');

?>

<!-- loop-templates/content.php -->

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<header class="entry-header">

		<?php if ('post' == get_post_type() && !is_category('exhibitions')) : ?>

			<div class="entry-meta">
				<?php custom_posted_on(); ?>
			</div><!-- .entry-meta -->

		<?php endif; ?>

		<?php the_title( '<h4 class="entry-title exhibition-title">', '</h4>' ); ?>

		<div class="exhibition-description"><?php echo $exhibition_description; ?></div>

	</header><!-- .entry-header -->

</article><!-- #post-## -->
