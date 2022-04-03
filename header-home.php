<?php
/**
 * Custom home with full screen header.
 *
 * This is the template that renders a custom ACF Engine header that has full width and 100vh full screen height.
 *
 * @package AlphaDrive
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<?php $viewport_content = apply_filters( 'hello_elementor_viewport_content', 'width=device-width, initial-scale=1' ); ?>
	<meta name="viewport" content="<?php echo esc_attr( $viewport_content ); ?>">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php

$headerPost = get_post( 210 );
$postContent = $headerPost->post_content;
$parsedBlocks = parse_blocks( $postContent );
foreach( $parsedBlocks as $block ) {
  echo render_block( $block );
}

?>

<?php get_footer(); ?>
