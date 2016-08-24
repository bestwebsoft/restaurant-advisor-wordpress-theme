<?php
/**
 * The template for displaying site sidebar
 *
 * @package    BestWebLayout
 * @subpackage Restaurant Advisor
 * @since      Restaurant Advisor 1.0
 **/
?>
<div class="advisor-widgets advisor-sidebar">
	<?php if ( is_active_sidebar( 'advisor_sidebar' ) ) {
		dynamic_sidebar( 'advisor_sidebar' );
	} else {
		the_widget( 'Advisor_Widget_Recent_Posts', array( 'number' => 3 ) );
		the_widget( 'WP_Widget_Recent_Comments', array( 'number' => 3 ) );
		the_widget( 'WP_Widget_Archives', array( 'number' => 3 ) );
		the_widget( 'WP_Widget_Categories', array( 'number' => 5 ) );
		the_widget( 'WP_Widget_Search', array( 'title' => 'search' ) );
	} ?>
</div> <!-- .advisor-sidebar -->
<div class="advisor-clear"></div>
