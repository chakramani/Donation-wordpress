<?php
/**
 * Just displays a post loop. Intended to be included in child themes using get_template_part('loop'). Also works with SiteOrigin page builder loop widget.
 *
 * Loop Name: Blog Loop
 *
 * @package vantage
 * @since vantage 1.0
 * @license GPL 2.0
 */
?>
<?php if ( have_posts() ) : ?>

	<?php /* Start the Loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>

		<?php the_content(); ?>

	<?php endwhile; ?>

	<?php //vantage_content_nav( 'nav-below' ); ?>

<?php endif ; ?>