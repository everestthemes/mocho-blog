<?php

add_action( 'wp_head', 'mocho_blog_dynamic_css' );

if( !function_exists( 'mocho_blog_dynamic_css' ) ) {

	function mocho_blog_dynamic_css() {

		$enable_header_search = mocho_blog_get_option( 'mocho_blog_enable_header_search' );

		$header_image = get_header_image();
		?>
		<style>
			<?php

			if( $enable_header_search == false ) {
				?>
				.mastheader.header_style3 .primarynav_search_icon {
					display: none;
				}
				<?php
			}

			if( !empty( $header_image ) ) {
				?>
				body .mastheader.header_style3 {
					background-image: url( <?php echo esc_url( $header_image ); ?> );
				}
				<?php
			}

			if( !empty( $header_text_color ) ) {
				?>
				.mastheader .logo h1 a,
				.mastheader.header_style3 .logo .site-description {
					color: #<?php echo esc_attr( $header_text_color ); ?>;
				}
				<?php
			}
			?>
		</style>
		<?php
	}
}