<?php

if ( function_exists( 'register_block_pattern_category' ) ) {
    register_block_pattern_category(
      'dynamic',
      array( 'label' => __( 'Dynamic', 'dynamic-drive' ) )
   );
}

// Route for the Block Generator.
add_action( 'rest_api_init', function () {
  register_rest_route( 'acfengine/v1', 'generate', array(
    'methods' => 'GET',
    'callback' => 'generate_pattern',
  ) );
} );


/**
 * Plugin Generation
 */
class PluginGenerator {

	public function blockPatternRegistration() {

		$contents = '';
		$contents .= '$pattern_properties = array(';
		$contents .= "\n\t";
		$contents .= "'title' => 'Pattern 3',";
		$contents .= "\n\t";

		/*

			Block "className" set in the block markup is created by the element classes from the generator,
			either the blueprint or the classes chosen by the user customizations.

      @IDEA - It would be nice to map classes to elements in an automated way?

		*/

		$headerClasses = 'mb-3 py-0 gap-3';


		$markup = '<!-- wp:acf/acfg-header {"id":"block_62cb2a0ebf753","name":"acf/acfg-header","className":"' . $headerClasses . '","data":{"field_624664fa30c34":"rgb(186,167,24)","field_6246674274d96":"","field_624ea919eea29":{"field_624ea8dceea27":"200","field_624ea8f0eea28":"px"},"field_62689445bc7f9":"1140","field_6247b97e3655e":"lato","field_6246685c00985":"25","field_6247b4aeb2f01":"0"},"align":"","mode":"preview"} -->
<!-- wp:paragraph -->
<p>Test 235</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p></p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2>Test 9182</h2>
<!-- /wp:heading -->
<!-- /wp:acf/acfg-header -->';

		$contents .= "'content' => '" . $markup . "',";
		$contents .= "\n";
		$contents .= ');';
		$contents .= "\n\n";
		$contents .= 'register_block_pattern( \'acf-engine/pattern3\', $pattern_properties );';
		$contents .= "\n\n";
		return $contents;

	}

}

function generate_pattern() {

	$data = new stdClass;

	$plugin = new PluginGenerator();
	$plugin->name = 'pattern3';
	$plugin->uri  = 'https://acfengine.com/';

	/* Plugin Definition Generate. */
	$contents = '';
	$contents .= '<?php';
	$contents .= "\n\n";
	$contents .= "/**";
	$contents .= "\n * ";
	$contents .= 'Plugin Name: ' . $plugin->name;
	$contents .= "\n * ";
	$contents .= 'Plugin URI: ' . $plugin->uri;
	$contents .= "\n * ";
	$contents .= "\n */";
	$contents .= "\n\n";

	// Get Block Pattern Registration.
	$contents .= $plugin->blockPatternRegistration();

	$basepath = WP_CONTENT_DIR . '/uploads/acfengine/generator/';

	// Make directory for plugin.
	$dir_path = $basepath . $plugin->name;
	if( ! is_dir( $dir_path ) ) {
		mkdir( $dir_path );
	}

	$filepath =  $dir_path . '/' . $plugin->name . '.php';
	file_put_contents( $filepath, $contents );

	// Enter the name to creating zipped directory
	$zip_path = $basepath . '/' . $plugin->name . '.zip';

	// Create new zip class
	$zip = new ZipArchive;

	if( $zip->open( $zip_path, ZipArchive::CREATE ) === true ) {

	  $dir = opendir( $dir_path );

	  while( $file = readdir( $dir ) ) {

	    if( is_file( $dir_path . '/' . $file ) ) {
	      $zip->addFile( $dir_path . '/' . $file, $file );
	    }

	  }

	  $zip->close();

	}


	$data->plugin = $plugin;
	$data->dir    = WP_CONTENT_DIR;
	$data->download = 'http://google.com/plugin';
	$response = new WP_REST_Response( $data );
	return $response;

}

add_filter( 'template_include', function( $template ) {
	return $template;
});

/**
 * Dynamic Drive theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Dynamic Drive
 * @since Dynamic Drive 1.0.0
 */


if ( ! function_exists( 'dynamicdrive_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function dynamicdrive_support() {

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );

	}

endif;

add_action( 'after_setup_theme', 'dynamicdrive_support' );

if ( ! function_exists( 'dynamicdrive_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function dynamicdrive_styles() {

		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );

		$version_string = is_string( $theme_version ) ? $theme_version : false;

		// Register Dynamic Drive Pura, inspired by Tailwinds CSS.
		wp_register_style(
			'dynamic-drive-pura',
			get_template_directory_uri() . '/css/pura.css',
			array(),
			$version_string
		);

		// Enqueue Pura.
		wp_enqueue_style( 'dynamic-drive-pura' );

		// Register main stylesheet.
		wp_register_style(
			'dynamic-drive-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$version_string
		);

		// Add styles inline.
		wp_add_inline_style( 'dynamic-drive-style', dynamicdrive_get_font_face_styles() );

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'dynamic-drive-style' );

	}

endif;

add_action( 'wp_enqueue_scripts', 'dynamicdrive_styles' );

if ( ! function_exists( 'dynamicdrive_editor_styles' ) ) :

	/**
	 * Enqueue editor styles.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function dynamicdrive_editor_styles() {

		// Add styles inline.
		wp_add_inline_style( 'wp-block-library', dynamicdrive_get_font_face_styles() );

	}

endif;

add_action( 'admin_init', 'dynamicdrive_editor_styles' );


if ( ! function_exists( 'dynamicdrive_get_font_face_styles' ) ) :

	/**
	 * Get font face styles.
	 * Called by functions dynamic-drive_styles() and dynamic-drive_editor_styles() above.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return string
	 */
	function dynamicdrive_get_font_face_styles() {

		return "
		@font-face{
			font-family: 'Source Serif Pro';
			font-weight: 200 900;
			font-style: normal;
			font-stretch: normal;
			font-display: swap;
			src: url('" . get_theme_file_uri( 'assets/fonts/SourceSerif4Variable-Roman.ttf.woff2' ) . "') format('woff2');
		}

		@font-face{
			font-family: 'Source Serif Pro';
			font-weight: 200 900;
			font-style: italic;
			font-stretch: normal;
			font-display: swap;
			src: url('" . get_theme_file_uri( 'assets/fonts/SourceSerif4Variable-Italic.ttf.woff2' ) . "') format('woff2');
		}
		";

	}

endif;

if ( ! function_exists( 'dynamicdrive_preload_webfonts' ) ) :

	/**
	 * Preloads the main web font to improve performance.
	 *
	 * Only the main web font (font-style: normal) is preloaded here since that font is always relevant (it is used
	 * on every heading, for example). The other font is only needed if there is any applicable content in italic style,
	 * and therefore preloading it would in most cases regress performance when that font would otherwise not be loaded
	 * at all.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function dynamicdrive_preload_webfonts() {
		?>
		<link rel="preload" href="<?php echo esc_url( get_theme_file_uri( 'assets/fonts/SourceSerif4Variable-Roman.ttf.woff2' ) ); ?>" as="font" type="font/woff2" crossorigin>
		<?php
	}

endif;

add_action( 'wp_head', 'dynamicdrive_preload_webfonts' );

// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';
