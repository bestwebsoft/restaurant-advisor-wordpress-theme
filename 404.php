<?php
/**
 * The template for displaying the 404 error (page not found)
 *
 * @package    BestWebLayout
 * @subpackage Restaurant Advisor
 * @since      Restaurant Advisor 1.0
 **/

get_header(); ?>
	<div class="advisor-main">
		<div class="advisor-posts">
			<h1 id="advisor-not_found"><?php _e( 'Sorry, requested post not found', 'restaurant-advisor' ); ?> </h1>
			<?php get_search_form(); ?>
		</div> <!-- .advisor-posts -->
		<?php get_sidebar(); ?>
	</div> <!-- .advisor-main -->
<?php get_footer();
