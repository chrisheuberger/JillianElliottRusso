<?php
/**
 * Partial template for content in services.php
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<!-- loop-templates/content-services.php -->

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">
		<div class="container">
			<?php if ( ! is_page( 'links' ) ) {  ?>
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<?php } ?>
		</div>
	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">

		<?php the_content(); ?>

		<div class="services-container">

		  <?php if( have_rows('services') ): ?>
				<?php while( have_rows('services') ): the_row(); 

					// ACF vars
					$service_title = get_sub_field('service_title');
					$service_text = get_sub_field('service_text');
					$service_image = get_sub_field('service_image');

					?>

					<div class="service-row">
						<div class="container">
							<div class="service-row-col-1">
								<h3 class="service-name"><?php echo $service_title; ?></h3>
								<?php if(!empty($service_image)): ?>
									<img class="animated-element" src="<?php echo $service_image['url']; ?>" alt="<?php echo $service_image['alt']; ?>" />
								<?php endif; ?>
							</div>
							<div class="service-row-col-2"><?php echo $service_text; ?></div>
						</div>
					</div>

				<?php endwhile; ?>
			<?php endif; ?>

		</div>

		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->

</article><!-- #post-## -->
