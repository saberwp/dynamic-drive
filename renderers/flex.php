<?php

class FlexRender extends Render {

  public $maxWidth        = 'max-w-screen-lg';
  public $margin          = 'mx-auto';
  public $backgroundColor = 'bg-gray-200';
  public $children        = array();
  public $wrap; // Wrapping classes.
  public $classes         = 'flex items-center';

  public function render() {

    $this->addClass( $this->maxWidth );
    $this->addClass( $this->margin );
    $this->addClass( $this->backgroundColor, 'wrap' );
    $classes = $this->getClasses();

    print '<div class="' . $this->wrap . '">';
    print '<div class="' . $classes . '">';

    // Children render.
    if( ! empty( $this->children ) ) {
      foreach( $this->children as $child ) {
        $child->render();
      }
    }

    print '</div>';
    print '</div>';

  }

}
