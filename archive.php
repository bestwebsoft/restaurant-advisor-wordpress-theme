<?php
/**
 * The template for displaying archives lists of posts or pages
 *
 * @package    BestWebLayout
 * @subpackage Restaurant Advisor
 * @since      Restaurant Advisor 1.0
 **/

get_header(); ?>
	<div class="advisor-main">
		<div class="advisor-posts">
			<h2 class="advisor-date-title"> <?php the_archive_title(); ?> </h2>
			<h5 class="advisor-date-description"> <?php the_archive_description(); ?> </h5>
			<div class="advisor-line advisor-archive-line"></div>
			<?php if ( have_posts() ) {
				while ( have_posts() ) {
					the_post(); ?>
					<article <?php post_class( 'advisor-the-post' ); ?> id="advisor_post_<?php the_ID(); ?>">
						<div class="advisor-post-title">
							<h1>
								<?php if ( is_sticky() ) {
									echo '<i class="fa fa-paperclip" style="display:none;"></i>';
								} ?>
								<a <?php do_action( 'advisor_link_for_title' ); ?> >
									<?php if ( 'link' == get_post_format() ) {
										echo '<i class="fa fa-external-link"></i>';
									}
									the_title(); ?>
								</a>
							</h1>
						</div> <!-- .advisor-post-title -->
						<?php do_action( 'advisor_entry_meta', $post );
						if ( has_post_thumbnail() ) { ?>
							<div class="advisor-thumbnail-wrap">
								<div class="advisor-post-image">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail(); ?>
									</a>
									<?php echo apply_filters( 'advisor_thumbnail_caption', '' ); ?>
								</div>
							</div> <!-- .advisor-thumbnail-wrap -->
						<?php } ?>
						<div class="advisor-content">
							<?php the_excerpt(); ?>
						</div> <!-- .advisor-content -->
						<div class="advisor-clear"></div>
						<?php wp_link_pages( array(
							'before'      => '<div class="advisor-page-links"><span class="advisor-page-links-title">' . __( 'Pages', 'restaurant-advisor' ) . ':' . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>&nbsp;',
							'link_after'  => '&nbsp;</span>',
						) ); ?>
						<div class="advisor-tags-cat">
							<?php if ( has_tag() ) { ?>
								<div class="advisor-tags-index-page">
									<i class="fa fa-tags"></i>
									<?php the_tags( '', ', ' ); ?>
								</div>
							<?php }
							if ( has_category() ) { ?>
								<div class="advisor-categories">
									<i class="fa fa-folder-open">&nbsp;</i>
									<?php the_category( ', ', '' ); ?>
								</div>
							<?php } ?>
						</div>
						<div class="advisor-clear"></div>
						<div class="advisor-bottom-post">
							<span class="advisor-for-go-top">
								<a class="advisor-go-top" href="#top">
									<?php _e( 'top', 'restaurant-advisor' ); ?>
								</a>
							</span>
							<a class="advisor-read-more" href="<?php the_permalink(); ?>"></a>
						</div> <!-- .advisor-bottom-post -->
					</article> <!-- .advisor-the-post -->
					<div class="advisor-clear"></div>
				<?php }
				the_posts_pagination( array(
					'mid_size'           => 3,
					'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
					'next_text'          => '<i class="fa fa-angle-double-right"></i>',
					'screen_reader_text' => '',
				) );
			} else { ?>
				<h1 id="advisor-not_found">
					<?php _e( 'Sorry, no posts were found', 'restaurant-advisor' ); ?>
				</h1>
				<?php get_search_form();
			} ?>
		</div> <!-- .advisor-posts -->
		<?php get_sidebar(); ?>
	</div> <!-- .advisor-main -->
<?php get_footer();
