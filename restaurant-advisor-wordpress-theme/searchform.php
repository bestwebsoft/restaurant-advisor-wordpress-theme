<?php
/**
* This template describe search form
*
* @package BestWebSoft
* @subpackage Restaurant Advisor
* @since Restaurant Advisor 1.3
**/
?>
<form action="<?php echo home_url( '/' ); ?>" method="get" role="search">
	<div class="advisor-search-area">
		<input type="submit" class="advisor-search-submit" value= "" />
		<input type="text" name="s" class="advisor-search" value="<?php the_search_query(); ?>" />
	</div> <!-- .advisor-search-area -->
</form>