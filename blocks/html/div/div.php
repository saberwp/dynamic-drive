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
    print '<div>Div tag...</div>';
  }

}
