<?php
/**
 * This template describe search form
 *
 * @package    BestWebLayout
 * @subpackage Restaurant Advisor
 * @since      Restaurant Advisor 1.0
 **/
?>
<form action="<?php echo home_url( '/' ); ?>" method="get" role="search">
	<div class="advisor-search-area">
		<input type="submit" class="advisor-search-submit" value="" />
		<input type="text" name="s" class="advisor-search" placeholder="<?php esc_attr_e( 'Enter search keyword', 'restaurant-advisor' ); ?>" value="<?php the_search_query(); ?>" />
	</div> <!-- .advisor-search-area -->
</form>
