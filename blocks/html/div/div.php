<?php

namespace DynamicDrive\BlockType;

class DivBlock extends \AcfEngine\Core\BlockType\BlockType {

  public function key() {
		return 'div';
	}

  public function title() {
    return 'DIV';
  }

  public function description() {
    return 'An HTML div tag.';
  }

  public function renderCallback() {
    return [$this, 'callback'];
  }

  public function callback( $block, $content, $isPreview, $postId ) {

    // Get and set CSS classes.
    $classes = '';
    if( $block['className'] ) {
      $classes .= $block['className'];
    }

    // Set the block template.
		$template = array();

    // Render markup.
    print '<div id="' . $block['id'] . '" class="' . $classes . '">';
    print '<InnerBlocks template="' . esc_attr( wp_json_encode( $template ) ) . '" />';
    print '</div>';
  }

}
