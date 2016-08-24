function advisor_content_li() {
	return this.nodType !== 1;
}

function advisor_hide_menu() {
	jQuery( '#advisor-compact-menu' ).slideUp();
	jQuery( '#advisor-compact-menu .sub-menu, #advisor-compact-menu .children' ).slideUp();
	jQuery( '#advisor-compact-menu .sub-menu > li, #advisor-compact-menu .children > li' ).slideUp();
}

(function( $ ) {

	$( document ).ready( function() {

		/* ------------ add span in li ( for styling lists in posts ) ------------- */
		var filter = $( '.advisor-the-post li:not( .gallery_box ul li ), .advisor-comment-text li' ).contents().filter( advisor_content_li );
		filter.wrap( '<span></span>' ).parent().addClass( 'advisor-list-wrap' );
		$( '.advisor-the-post li ul, .advisor-comment-text li ul' ).unwrap();
		$( '.advisor-the-post li ol, .advisor-comment-text li ol' ).unwrap();
		$( '.advisor-the-post ol+span, .advisor-comment-text ol+span' ).detach();
		$( '.advisor-the-post ul+span, .advisor-comment-text ul+span' ).detach();

		/* ------------ select ------------- */
		$( 'select' ).ikSelect();

		/* ------------ input file button ------------- */
		$( 'input[type="file"]' ).each( function() {
			$( this ).wrap( '<div id="advisor-input-file"></div>' ).before( '<div class="advisor-button-value">' + choose_file_button.button_string + '</div>' );
			var filename = $( this ).val();
			if ( '' == filename ) {
				filename = choose_file_button.no_file_choosen;
			}
			$( this ).parent( '#advisor-input-file' ).append( '<div id="advisor-file-name">' + filename + '</div>' );
			$( this ).change( function() {
				filename = $( this )[ 0 ].files[ 0 ][ 'name' ];
				$( this ).siblings( '#advisor-file-name' ).html( filename );
			} );
		} );

		/* ------------ click_menu ------------- */
		advisor_hide_menu();
		$( window ).resize( function() {
			var width = $( document ).width();
			if ( width > 752 ) {
				advisor_hide_menu();
			}
		} );
		$( '#advisor-menu-button' ).click( function() {
			$( '#advisor-compact-menu' ).slideToggle( 'slow' );
			if ( $( '#advisor-compact-menu .menu > .menu-item-has-children, #advisor-compact-menu .menu > .page_item_has_children' ).hasClass( 'advisor-open' ) ) {
				$( '#advisor-compact-menu .menu > .advisor-open' ).removeClass( 'advisor-open' ).addClass( 'advisor-close' );
				$( '.sub-menu, .children' ).find( 'li' ).slideUp();
				$( '.sub-menu, .children' )
					.find( '.menu-item-has-children, .page_item_has_children' )
					.removeClass( 'advisor-open' )
					.addClass( 'advisor-close' );
				$( '#advisor-compact-menu' ).find( '.sub-menu' ).slideUp();
				$( '.sub-menu .advisor-cm-after-a, .children .advisor-cm-after-a' ).css( 'display', 'none' );
			}
		} );
		$( '#advisor-compact-menu .menu-item-has-children, #advisor-compact-menu .page_item_has_children' ).addClass( 'advisor-close' );
		$( '#advisor-compact-menu a' ).after( '<div class="advisor-cm-after-a"></div>' ).wrap( '<div class="advisor-cm-wrap-a"></div>' );
		$( '#advisor-compact-menu .menu-item-has-children, #advisor-compact-menu .page_item_has_children' ).click( function( event ) {
			event.stopPropagation();
			if ( $( this ).hasClass( 'advisor-open' ) ) {
				$( this ).removeClass( 'advisor-open' ).addClass( 'advisor-close' );
				$( this ).find( '.sub-menu, .children' ).slideUp( 600 ).find( '.advisor-cm-after-a' ).css( 'display', 'none' );
				$( this ).find( 'li' ).slideUp( 600 );
				$( this )
					.find( '.menu-item-has-children, .page_item_has_children' )
					.removeClass( 'advisor-open' )
					.addClass( 'advisor-close' );
			} else {
				$( this )
					.siblings()
					.find( '.menu-item-has-children, .page_item_has_children' )
					.removeClass( 'advisor-open' )
					.addClass( 'advisor-close' )
					.slideUp( 600 );
				$( this ).siblings().find( 'li' ).slideUp( 600 ).children( '.advisor-cm-after-a' ).css( 'display', 'none' );
				$( this ).siblings( ".advisor-open" ).removeClass( 'advisor-open' ).addClass( 'advisor-close' );
				$( this ).siblings().find( 'ul' ).slideUp( 600 );
				$( this ).removeClass( 'advisor-close' ).addClass( 'advisor-open' );
				$( this ).children( '.sub-menu, .children' ).slideDown( 1 ).css( 'background-color', '#1b1b1b' )
								 .children( 'li' )
								 .slideDown( 600 )
								 .css( 'background-color', '#1b1b1b' )
								 .delay().queue( function() {
					$( this ).children( '.advisor-cm-after-a' ).css( 'display', 'block' );
					$( this ).dequeue();
				} );
				$( this ).parent( '.sub-menu, .children' ).css( 'background-color', 'black' ).children( 'li' ).css( 'background-color', 'black' );
				var offset = $( this ).parent().offset().top - 100;
				$( 'html, body' ).animate( { scrollTop: offset }, 600 );
			}
		} );

		/* ------------ drop-down menu obfuscation ------------- */
		$( '.advisor-nav-logo-header .sub-menu .sub-menu > li, .advisor-nav-logo-header .children .children > li' ).hover( function() {
		 $( this ).parent().parent().siblings().children( 'a' ).css( { 'opacity': '0.3' } );
		 $( this ).parent().siblings( 'a' ).css( { 'opacity': '0.3' } );
	 },
	 function() {
		 $( this ).parent().parent().siblings().children( 'a' ).css( { 'opacity': '1' } );
		 $( this ).parent().siblings( 'a' ).css( { 'opacity': '1' } );
		 $( '.menu' ).hover( function() {
	 },
	 function() {
		 $( '.advisor-nav-logo-header .sub-menu li > a' ).css( { 'opacity': '1' } );
	 } )
	 } );

		/* ------------ Portfolio and Gallery plugins ------------- */
		$( '.page-template-portfolio .content-area, .single-portfolio .content-area, .page-template-gallery-template .content-area, .single-gallery .content-area, .tax-portfolio_technologies .content-area' ).wrap( '<div><article></article></div>' ).parent().addClass( 'advisor-the-post' ).parent().addClass( 'advisor-posts' );
		if ( $( '.advisor-the-post' ).children().hasClass( 'content-area' ) ) {
			$( '.advisor-posts' ).wrap( '<div></div>' ).parent().addClass( 'advisor-main' );
			$( '.advisor-sidebar' ).appendTo( '.advisor-main' );
			$( '.content-area .entry-header' ).wrap( '<div></div>' ).parent().addClass( 'post-title' );
			$( '.advisor-the-post' ).after( "<div id='advisor-comments'></div>" );
			$( '.advisor-comment-list, .advisor-nocomments, .comment-respond' ).appendTo( '#advisor-comments' );
		}

		/* ------------ Realty plugin min width ------------- */
		$( '.rlt-clearfix' ).wrap( '<div></div>' ).parent().addClass( 'main' );
		if ( $( '.advisor-main > aside' ).hasClass( 'rlt-clearfix' ) ) {
			$( 'body' ).css( { 'min-width': '478px' } );
		}

		/* ------------ for no-avatar in comments ------------- */
		if ( !$( '.vcard img' ).is( '.avatar' ) ) {
			$( '.advisor-comment-meta' ).css( 'padding-left', '0' );
			$( '.advisor-comment .advisor-clear, .pingback .advisor-clear' ).css( {
				'border-top': '1px solid #e1e1e1',
				'margin-top': '10px'
			} );
		}

		/* ------------ focus on search in widgets ------------- */
		var search = $( '.advisor-widgets .advisor-search' );
		search.each( function() {
			if ( '' != $( this ).val() ) {
				$( this ).css( 'width', '77.8%' ).parent().css( {
					'width':            '77.8%',
					'border-color':     '#d1e2c0',
					'background-color': '#fff'
				} );
			}
			$( this ).focus( function() {
				$( this ).css( 'width', '77.8%' ).parent().css( {
					'width':            '77.8%',
					'border-color':     '#d1e2c0',
					'background-color': '#fff'
				} );
			} );
			$( this ).blur( function() {
				if ( '' == $( this ).val() ) {
					$( this ).css( 'width', '' ).parent().css( { 'width': '', 'border-color': '', 'background-color': '' } );
				}
			} );
		} );

	} );
})( jQuery );

