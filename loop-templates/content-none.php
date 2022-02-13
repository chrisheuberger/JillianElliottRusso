<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<section class="no-results not-found">

	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'understrap' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">

		<?php if ( is_search() ) : ?>
			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'understrap' ); ?></p>
		<?php get_search_form(); else : ?>
		  <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'understrap' ); ?></p>
		<?php get_search_form(); endif; ?>

	</div><!-- .page-content -->
	
</section><!-- .no-results -->
