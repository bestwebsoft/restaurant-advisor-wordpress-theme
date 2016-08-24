<?php
/**
 * The template for displaying posts type "attachment"
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
					<h1> <?php the_title(); ?> </h1>
				</div>
				<?php do_action( 'advisor_entry_meta', $post ); ?>
				<div class="advisor-content">
					<figure class="advisor-attachment-item">
						<a href="<?php echo esc_url( wp_get_attachment_url() ); ?>" target="_blank">
							<?php $image_size = apply_filters( 'advisor_attachment_size', 'large' );
							echo wp_get_attachment_image( get_the_ID(), $image_size ); ?>
						</a>
						<?php if ( has_excerpt() ) { ?>
							<figcaption class="wp-caption-text gallery-caption">
								<?php the_excerpt(); ?>
							</figcaption>
						<?php } ?>
					</figure> <!-- .advisor-attachment-item -->
				</div> <!-- .advisor-content -->
				<div class="advisor-clear"></div>
				<?php wp_link_pages( array(
					'before'      => '<div class="advisor-page-links"><span class="advisor-page-links-title">' . __( 'Pages', 'restaurant-advisor' ) . ':' . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>&nbsp;',
					'link_after'  => '&nbsp;</span>',
				) ); ?>
				<div id="advisor-single-page-bottom">
					<div class="advisor-attachment-sizes">
						<i class="fa fa-search-plus"></i>
						<a href="<?php echo esc_url( wp_get_attachment_url() ); ?>" target="_blank">
							<?php $metadata = wp_get_attachment_metadata();
							echo $metadata['width']; ?> &times;<?php echo $metadata['height']; ?>
						</a>
					</div>
					<div id="advisor-image-nav">
						<nav class="advisor-image-nav-link"> <?php previous_image_link( '%link', '<i class="fa fa-arrow-left"></i>' . __( 'PREV', 'restaurant-advisor' ) ); ?> </nav>
						<nav class="advisor-image-nav-link"> <?php next_image_link( '%link', __( 'NEXT', 'restaurant-advisor' ) . '<i class="fa fa-arrow-right"></i>' ); ?> </nav>
					</div> <!-- #advisor-image-nav -->
				</div><!-- #advisor-single-page-bottom -->
				<div class="advisor-clear"></div>
			</article> <!-- .advisor-the-post -->
			<div class="advisor-clear"></div>
		</div> <!-- .advisor-posts -->
		<?php get_sidebar(); ?>
	</div> <!-- .advisor-main -->
<?php get_footer();
