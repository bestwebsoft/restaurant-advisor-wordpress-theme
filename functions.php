<?php

/* Set content width value based on the theme's design */
if ( ! isset( $content_width ) ) {
	$content_width = 753;
}
/* Register Theme Features */
function advisor_theme_setup() {
	global $wp_version, $wp_version_for_logo;

	$wp_version_for_logo = isset( $wp_version ) && $wp_version >= 4.5;
	/* Add theme support for Automatic Feed Links */
	add_theme_support( 'automatic-feed-links' );

	/* Add theme support for Post Formats */
	add_theme_support( 'post-formats', array(
		'status',
		'quote',
		'gallery',
		'image',
		'video',
		'audio',
		'link',
		'aside',
		'chat',
	) );

	/* Add theme support for Featured Images */
	add_theme_support( 'post-thumbnails' );
	if ( $wp_version_for_logo ) {
		$logo_args = array(
			'height' => 141,
			'width'  => 138,
		);
		add_theme_support( 'custom-logo', $logo_args );
	}
	/* Add theme support for Custom Background */
	$background_args = array(
		'default-color' => 'fff',
	);
	add_theme_support( 'custom-background', $background_args );

	/* Add theme support for Custom Header */
	$header_args = array(
		'default-image'      => get_template_directory_uri() . '/images/banner.png',
		'width'              => 1600,
		'height'             => 259,
		'flex-width'         => false,
		'flex-height'        => false,
		'uploads'            => true,
		'random-default'     => false,
		'header-text'        => true,
		'default-text-color' => 'fff',
	);
	add_theme_support( 'custom-header', $header_args );
	register_default_headers( array(
		'cook' => array(
			'url'           => get_template_directory_uri() . '/images/banner.png',
			'thumbnail_url' => get_template_directory_uri() . '/images/thumbnail-banner.png',
		),
	) );

	/* Add theme support for HTML5 Semantic Markup */
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

	/* This theme styles the visual editor to resemble the theme style. */
	add_editor_style( 'css/editor-style.css' );

	/* Add theme support for document Title tag */
	add_theme_support( 'title-tag' );

	/* Add theme support for Translation */
	load_theme_textdomain( 'restaurant-advisor', get_template_directory() . '/languages' );

	/* This theme uses wp_nav_menu() in three locations. */
	register_nav_menu( 'primary', __( 'Primary Menu', 'restaurant-advisor' ) );
	register_nav_menu( 'top', __( 'Top Menu', 'restaurant-advisor' ) );
	register_nav_menu( 'footer', __( 'Footer Menu', 'restaurant-advisor' ) );

	/* Adding image size for widget "Advisor Resent Posts"  */
	add_image_size( 'advisor_widget_thumbnail', 67, 67, true );
}

/**
 * Sets up the theme customizer for settings.
 *
 * @param WP_Customize_Manager $wp_customize The Customizer object.
 */
function advisor_customize_register( $wp_customize ) {
	global $wp_version_for_logo;

	$logo_description = ! $wp_version_for_logo ? '<br />&#9900; ' . __( 'for header logo', 'restaurant-advisor' ) . ' - 138 &times; 141 px' : '';
	$wp_customize->add_section( 'advisor_logo_section', array(
		'title'       => __( 'Logo', 'restaurant-advisor' ),
		'priority'    => 30,
		'description' => __( 'Load the logo to your site.', 'restaurant-advisor' ) . '<br />' . __( 'Recommended sizes', 'restaurant-advisor' ) . ':' . $logo_description . '<br />&#9900; ' . __( 'for footer logo', 'restaurant-advisor' ) . ' - 77 &times; 78 px',
	) );

	$wp_customize->add_panel( 'advisor_info_panel', array(
		'title'       => __( 'Theme Options', 'restaurant-advisor' ),
		'priority'    => 30,
		'description' => __( "Here you can change the address and phone the site owner, and also link to reservation service . It's posible to save forms empty.", 'restaurant-advisor' ),
	) );

	$wp_customize->add_section( 'advisor_info_address', array(
		'title'       => __( 'Address', 'restaurant-advisor' ),
		'priority'    => 10,
		'description' => __( 'Enter you address. E.g.', 'restaurant-advisor' ) . ' ' . __( '1600 Amphitheatre Parkway Mountain View CA 94043', 'restaurant-advisor' ),
		'panel'       => 'advisor_info_panel',
	) );

	$wp_customize->add_section( 'advisor_info_phone', array(
		'title'       => __( 'Phone', 'restaurant-advisor' ),
		'priority'    => 20,
		'description' => __( 'Enter you phone number. E.g.', 'restaurant-advisor' ) . ' "(123) 123-4567"',
		'panel'       => 'advisor_info_panel',
	) );

	$wp_customize->add_section( 'advisor_info_reservation', array(
		'title'       => __( 'Reservation', 'restaurant-advisor' ),
		'priority'    => 30,
		'description' => __( 'Enter the reservation system URL. E.g.', 'restaurant-advisor' ) . ' "http://some-reservation.com"',
		'panel'       => 'advisor_info_panel',
	) );

	$wp_customize->add_section( 'advisor_info_email', array(
		'title'       => __( 'Email', 'restaurant-advisor' ),
		'priority'    => 40,
		'description' => __( 'Enter the e-mail for feedback. E.g.', 'restaurant-advisor' ) . ' "example.mail@mail.com"',
		'panel'       => 'advisor_info_panel',
	) );

	$wp_customize->add_setting( 'advisor_info_address', array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '',
	) );

	$wp_customize->add_setting( 'advisor_info_phone', array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '',
	) );

	$wp_customize->add_setting( 'advisor_info_email', array(
		'sanitize_callback' => 'sanitize_email',
		'default'           => '',
	) );

	$wp_customize->add_setting( 'advisor_info_reservation', array(
		'sanitize_callback' => 'esc_url_raw',
		'default'           => '',
	) );

	if ( ! $wp_version_for_logo ) {
		$wp_customize->add_setting( 'advisor_header_logo', array(
			'sanitize_callback' => 'esc_url_raw',
			'default'           => get_template_directory_uri() . '/images/logo.png',
		) );
	}

	$wp_customize->add_setting( 'advisor_footer_logo', array(
		'sanitize_callback' => 'esc_url_raw',
		'default'           => get_template_directory_uri() . '/images/logo-copy.png',
	) );

	if ( ! $wp_version_for_logo ) {
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'advisor_header_logo', array(
			'label'    => __( 'Header Logo', 'restaurant-advisor' ),
			'section'  => 'advisor_logo_section',
			'settings' => 'advisor_header_logo',
		) ) );
	}

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'advisor_footer_logo', array(
		'label'    => __( 'Footer Logo', 'restaurant-advisor' ),
		'section'  => 'advisor_logo_section',
		'settings' => 'advisor_footer_logo',
	) ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'advisor_info_phone', array(
		'label'    => __( 'Phone', 'restaurant-advisor' ),
		'section'  => 'advisor_info_phone',
		'settings' => 'advisor_info_phone',
		'type'     => 'text',
	) ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'advisor_info_address', array(
		'label'    => __( 'Address', 'restaurant-advisor' ),
		'section'  => 'advisor_info_address',
		'settings' => 'advisor_info_address',
		'type'     => 'text',
	) ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'advisor_info_reservation', array(
		'label'    => __( 'Reservation link', 'restaurant-advisor' ),
		'section'  => 'advisor_info_reservation',
		'settings' => 'advisor_info_reservation',
		'type'     => 'text',
	) ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'advisor_info_email', array(
		'label'    => __( 'E-mail for feedback', 'restaurant-advisor' ),
		'section'  => 'advisor_info_email',
		'settings' => 'advisor_info_email',
		'type'     => 'text',
	) ) );
}

/* Shading the background of light footer logo in Cuntomize menu */
function advisor_customize_head() {
	echo "<style type='text/css'>#customize-control-advisor_footer_logo .attachment-media-view { background-color: rgba(0,0,0,0.2); }</style>";
}

function advisor_scripts() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/* Strings for js to translate */
	wp_register_script( 'restaurant-advisor-script', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ) );
	$input_file_string_js = array(
		'button_string'   => __( 'Choose File', 'restaurant-advisor' ),
		'no_file_choosen' => __( 'No file chosen', 'restaurant-advisor' ),
	);
	wp_localize_script( 'restaurant-advisor-script', 'choose_file_button', $input_file_string_js );

	/* Load Java Scripts for theme */
	wp_enqueue_script( 'restaurant-advisor-script', get_template_directory_uri() . 'js/scripts.js', array( 'jquery' ) );

	/* Load the JQuery plugin for select */
	wp_enqueue_script( 'jquery-ikSelect', get_template_directory_uri() . '/js/jquery.ikSelect.min.js', array( 'jquery' ) );

	/* Add stylesheet */
	wp_enqueue_style( 'restaurant-advisor-style', get_stylesheet_uri() );

	/* Add Font Awesome icons */
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
}

/* Register tho widget zones and theme widget Advisor Recent Posts */
function advisor_widgets() {
	register_sidebar( array(
		'name'          => __( 'Advisor sidebar', 'restaurant-advisor' ),
		'id'            => 'advisor_sidebar',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="advisor-widgettitle">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget', 'restaurant-advisor' ),
		'id'            => 'footer_widget',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="advisor-widgettitle">',
		'after_title'   => '</h2><div></div>',
	) );
	register_widget( 'Advisor_Widget_Recent_Posts' );
}

/* Display the caption of post thumbnail */
function advisor_thumbnail_caption() {
	$caption = get_post_field( 'post_excerpt', get_post_thumbnail_id() );
	if ( isset( $caption ) && '' != $caption ) {
		return '<i id="advisor-thumbnail-caption">' . $caption . '</i>';
	}

	return '';
}

/* Transform address to http view  */
function advisor_ref_to_maps( $adr ) {
	$link = esc_url( 'https://www.google.com/maps/search/' . substr( http_build_query( array( $adr ) ), 2 ) );

	return $link;
}

/* Adds Advisor Recent Posts widget. */

class Advisor_Widget_Recent_Posts extends WP_Widget {

	/*Register widget with WordPress. */
	function __construct() {
		parent::__construct( 'advisor_widget_recent_posts', __( 'Advisor Recent Posts', 'restaurant-advisor' ), array( 'description' => __( 'Widget recent posts for advisor theme', 'restaurant-advisor' ) ) );
		add_action( 'save_post', array( $this, 'advisor_flush_widget_cache' ) );
		add_action( 'deleted_post', array( $this, 'advisor_flush_widget_cache' ) );
		add_action( 'switch_theme', array( $this, 'advisor_flush_widget_cache' ) );
	}

	public function widget( $args, $instance ) {
		ob_start();
		$title  = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts', 'restaurant-advisor' );
		$title  = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;

		if ( ! isset( $number ) ) {
			$number = 5;
		}

		$widget_query = new WP_Query( apply_filters( 'widget_posts_args', array(
			'posts_per_page'      => $number,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true,
		) ) );

		if ( $widget_query->have_posts() ) {
			echo $args['before_widget'];
			if ( $title ) {
				echo $args['before_title'] . $title . $args['after_title'];
			}
			$current_class = 'class="advisor-background-1"'; ?>
			<ul class="advisor-recentposts">
				<?php while ( $widget_query->have_posts() ) {
					$widget_query->the_post(); ?>
					<li <?php echo $current_class; ?> >
						<div class="advisor-sidebar-recent-post">
							<?php if ( has_post_thumbnail() ) { ?>
								<div class="advisor-recent-posts-thumbnail">
									<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'advisor_widget_thumbnail' ); ?> </a>
								</div>
							<?php } ?>
							<div class="advisor-recent-title">
								<a href="<?php the_permalink(); ?>"><b> <?php get_the_title() ? the_title() : the_ID(); ?> </b></a>
							</div>
					</li>
					<?php if ( 'class="advisor-background-1"' == $current_class ) {
						$current_class = 'class="advisor-background-2"';
					} else {
						$current_class = 'class="advisor-background-1"';
					}
				} ?>
			</ul>
			<?php echo $args['after_widget'];
			wp_reset_query();
		}
	}

	public function update( $new_instance, $old_instance ) {
		$instance           = $old_instance;
		$instance['title']  = strip_tags( $new_instance['title'] );
		$instance['number'] = (int) $new_instance['number'];
		$this->advisor_flush_widget_cache();
		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset( $alloptions['widget_recent_entries'] ) ) {
			delete_option( 'widget_recent_entries' );
		}

		return $instance;
	}

	public function advisor_flush_widget_cache() {
		wp_cache_delete( 'widget_recent_posts', 'widget' );
	}

	public function form( $instance ) {
		$title  = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5; ?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'restaurant-advisor' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:', 'restaurant-advisor' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" />
		</p>
	<?php }
}

/* Link in title */
function advisor_link_for_title() {
	if ( 'link' == get_post_format() ) {
		$get_link = get_url_in_content( get_the_content() );
		if ( false != $get_link ) {
			echo "href='" . esc_url( $get_link ) . "' target='_blank'";
		}
	} else {
		echo "href='" . esc_url( get_the_permalink() ) . "'";
	}
}

/* View post entry meta */
function advisor_entry_meta( $post ) {
	$author = get_the_author_link();
	$date   = get_the_date();
	if ( ! current_user_can( 'edit_post', get_the_ID() ) ) {
		$edit = '';
	} else {
		$edit = '<a href="' . esc_url( get_edit_post_link() ) . ' " class="advisor-entry-edit"><i class="fa fa-pencil"></i>&nbsp;' . __( 'Edit', 'restaurant-advisor' ) . '</a> ';
	}

	if ( is_single() ) {
		$year      = get_the_date( 'Y' );
		$month     = get_the_date( 'm' );
		$date_link = esc_url( get_month_link( $year, $month ) );
	} else {
		$date_link = esc_url( get_permalink() );
	}
	printf(
		'<div class="advisor-entry-meta"><small><b>' .
		__( 'Posted by', 'restaurant-advisor' ) .
		'<span class="advisor-entry-autor"> %1$s </span> &nbsp;&nbsp;/&nbsp;<a href="%4$s"> <div class="advisor-entry-date">%2$s</div></a>&nbsp;&nbsp;' .
		'%3$s' . '</b></small></div><div class="advisor-clear"></div>',
		$author, $date, $edit, $date_link
	);
}

/* Creation comments structure */
function advisor_comment( $comment, $args, $depth ) { ?>
	<li <?php comment_class(); ?> id="advisor-li-comment-<?php comment_ID() ?>">
		<div id="advisor-comment-<?php comment_ID(); ?>">
			<?php if ( 'comment' != get_comment_type() ) { ?>
				<div class="advisor-comment-text advisor-pingback">
					<?php edit_comment_link( __( 'Edit', 'restaurant-advisor' ), ' ' ); ?>
					<p>
						<?php _e( 'Pingback: ', 'restaurant-advisor' );
						comment_author_link(); ?>
					</p>
				</div><!-- .comment_text -->
			<?php } else { ?>
				<div class="advisor-comment-author vcard">
					<div class="advisor-comment-meta">
						<span class="advisor-says"> <?php _e( 'written by', 'restaurant-advisor' ); ?> </span>
						<cite class="advisor-comment-autor-link"> <?php comment_author_link(); ?> </cite>
						<?php printf( '%1$s %2$s', '<span class="advisor-date-time">' . get_comment_date(), get_comment_time() . '</span>' ); ?>
					</div><!-- .advisor-comment-meta -->
					<div class="advisor-reply-share">
						<?php comment_reply_link( array_merge( $args, array(
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
						) ) ) ?>
					</div>
					<?php echo get_avatar( $comment->comment_author_email, $args['avatar_size'] ); ?>
				</div> <!-- comment-author vcard -->
				<div class="advisor-comment-text">
					<?php edit_comment_link( __( 'Edit', 'restaurant-advisor' ), ' ' );
					comment_text(); ?>
				</div><!-- .comment_text -->
			<?php } ?>
		</div><!-- #advisor-comment-<?php comment_ID(); ?> -->
	</li>
	<?php if ( $comment->comment_approved == '0' ) { ?>
		<div class="advisor-comment-awaiting-verification"><?php _e( 'Your comment is awaiting moderation.', 'restaurant-advisor' ) ?> </div>
	<?php }
}

/* Custom <!--more--> link in the_excerpt */
function advisor_excerpt_more( $more ) {
	$advisor_excerpt_more_link = '&nbsp;<a href="' . get_the_permalink() . '"><span>' . __( 'read more', 'restaurant-advisor' ) . '&nbsp;...</span></a> ';

	return $advisor_excerpt_more_link;
}

add_action( 'after_setup_theme', 'advisor_theme_setup' );
add_action( 'customize_register', 'advisor_customize_register' );
add_action( 'customize_controls_print_styles', 'advisor_customize_head' );
add_action( 'widgets_init', 'advisor_widgets' );
add_action( 'wp_enqueue_scripts', 'advisor_scripts' );
add_filter( 'advisor_thumbnail_caption', 'advisor_thumbnail_caption', 10, 1 );
add_filter( 'advisor_ref_to_maps', 'advisor_ref_to_maps', 10, 1 );
add_action( 'advisor_link_for_title', 'advisor_link_for_title' );
add_action( 'advisor_entry_meta', 'advisor_entry_meta', 10, 1 );
add_filter( 'excerpt_more', 'advisor_excerpt_more' );
