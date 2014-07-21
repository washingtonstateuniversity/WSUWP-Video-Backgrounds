<?php
/*
Plugin Name: WSUWP Video Backgrounds
Version: 0.0.1
Plugin URI: http://web.wsu.edu
Description: A WordPress plugin to display HTML5 video backgrounds.
Author: washingtonstateuniversity, jeremyfelt
Author URI: http://web.wsu.edu
*/

class WSU_Video_Background {
	/**
	 * Setup plugin hooks.
	 */
	public function __construct() {
		add_shortcode( 'wsu_video_background', array( $this, 'video_background' ) );
	}

	/**
	 * Display a video background container.
	 *
	 * @param array  $atts    List of attributes to use in the shortcode.
	 * @param string $content Content provided between shortcode tags.
	 *
	 * @return string
	 */
	public function video_background( $atts, $content = null ) {
		$defaults = array(
			'id'          => 'wsu-video-background',
			'mp4'         => '',
			'ogv'         => '',
			'webm'        => '',
			'poster'      => '',
			'autoplay'    => true,
			'loop'        => true,
			'scale'       => true,
			'zIndex'      => 0,
			'opacity'     => 1,
			'script_only' => false,
		);
		$atts = shortcode_atts( $defaults, $atts );

		ob_start();

		// By default, create the container for the video background.
		if ( false === $atts['script_only'] ) {
			?><div id="<?php echo esc_attr( $atts['id'] ); ?>"><?php if ( null !== $content ) { echo apply_filters( 'the_content', $content ); } ?></div><?php
		}

		$content = ob_get_contents();
		ob_end_clean();

		return $content;
	}
}
new WSU_Video_Background();