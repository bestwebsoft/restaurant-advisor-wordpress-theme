<?php
/**
 * The template for displaying single post
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
				<?php do_action( 'advisor_entry_meta', $post ); ?>
				<div class="advisor-thumbnail-wrap">
					<div class='advisor-post-image'>
						<?php the_post_thumbnail(); ?>
					</div>
					<?php echo apply_filters( 'advisor_thumbnail_caption', '' ); ?>
				</div><!-- .advisor-thumbnail-wrap -->
				<div class="advisor-content">
					<?php the_content(); ?>
				</div> <!-- .advisor-content -->
				<div class="advisor-clear"></div>
				<?php wp_link_pages( array(
					'before'      => '<div class="advisor-page-links"><span class="advisor-page-links-title">' . __( 'Pages', 'restaurant-advisor' ) . ':' . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>&nbsp;',
					'link_after'  => '&nbsp;</span>',
				) ); ?>
				<div id="advisor-single-page-bottom">
					<div class="advisor-tags-cat">
						<?php if ( has_tag() ) { ?>
							<div class="advisor-tags-index-page">
								<i class="fa fa-tags"></i>
								<?php the_tags( '', ', ' ); ?>
							</div>
						<?php }
						if ( has_category() ) { ?>
							<div class="advisor-categories">
								<i class="fa fa-folder-open"></i>
								<?php the_category( ', ', '' ); ?>
							</div>
						<?php } ?>
					</div> <!-- .advisor-tags-cat -->
					<div id="advisor-page-nav">
						<nav class="advisor-post-nav-link"> <?php previous_post_link( '%link', '<i class="fa fa-arrow-left"></i>' . __( 'prev', 'restaurant-advisor' ) ); ?> </nav>
						<nav class="advisor-post-nav-link"> <?php next_post_link( '%link', __( 'next', 'restaurant-advisor' ) . '<i class="fa fa-arrow-right"></i>' ); ?> </nav>
					</div> <!-- #advisor-page-nav -->
				</div><!-- #advisor-single-page-bottom -->
				<div class="advisor-clear"></div>
			</article> <!-- .advisor-the-post -->
			<div class="advisor-clear"></div>
			<div id="advisor-comments">
				<?php comments_template(); ?>
			</div> <!-- #advisor-comments -->
			<div class="advisor-clear"></div>
		</div> <!-- .advisor-posts -->
		<?php get_sidebar(); ?>
	</div> <!-- .advisor-advisor-main -->
<?php get_footer();
