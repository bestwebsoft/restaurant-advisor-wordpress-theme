<?php
/**
 * The template for displaying single pages
 *
 * @package    BestWebLayout
 * @subpackage Restaurant Advisor
 * @since      Restaurant Advisor 1.0
 **/

get_header(); ?>
	<div class="advisor-main">
		<div class="advisor-posts">
			<?php the_post(); ?>
			<article <?php post_class( 'advisor-the-post' ); ?> id="advisor-post_<?php the_ID(); ?>">
				<div class="advisor-post-title">
					<h1><?php the_title(); ?></h1>
				</div>
				<?php if ( current_user_can( 'edit_pages', get_the_ID() ) ) { ?>
					<div class="advisor-entry-meta">
						<small>
							<b>
								<i class="fa fa-pencil"></i>
								<?php edit_post_link( __( 'Edit', 'restaurant-advisor' ) ); ?>
							</b>
						</small>
					</div>
				<?php } ?>
				<div class="advisor-thumbnail-wrap">
					<div class='advisor-post-image'>
						<?php the_post_thumbnail(); ?>
					</div>
					<?php echo apply_filters( 'advisor_thumbnail_caption', '' ); ?>
				</div><!-- .advisor-thumbnail-wrap -->
				<div class="advisor-content">
					<?php the_content(); ?>
				</div><!-- .advisor-content -->
				<div class="advisor-clear"></div>
				<?php wp_link_pages( array(
					'before'      => '<div class="advisor-page-links"><span class="advisor-page-links-title">' . __( 'Pages', 'restaurant-advisor' ) . ':' . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>&nbsp;',
					'link_after'  => '&nbsp;</span>',
				) ); ?>
				<div class="advisor-clear"></div>
			</article> <!-- .advisor-the-post -->
			<div class="advisor-clear"></div>
			<div id="advisor-comments">
				<?php comments_template(); ?>
			</div> <!-- #advisor-comments -->
			<div class="advisor-clear"></div>
		</div> <!-- .advisor-posts -->
		<?php get_sidebar(); ?>
	</div> <!-- .advisor-main -->
<?php get_footer();
