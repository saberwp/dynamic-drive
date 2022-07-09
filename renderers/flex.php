<?php

class FlexRender extends Render {

  public $maxWidth        = 'max-w-screen-lg';
  public $padding         = 'py-2';
  public $margin          = 'mx-auto';
  public $gap             = 'gap-3';
  public $backgroundColor = 'bg-gray-200';
  public $children        = array();
  public $wrap; // Wrapping classes.
  public $classes         = 'flex items-center';

  public function render() {

    $this->addClass( $this->maxWidth );
    $this->addClass( $this->margin );
    $this->addClass( $this->padding );
    $this->addClass( $this->gap );
    $this->addClass( $this->backgroundColor, 'wrap' );
    $classes = $this->getClasses();

    print '<div class="' . $this->wrap . '">';
    print '<div class="' . $classes . '">';

    $this->renderChildren();

    print '</div>';
    print '</div>';

  }

}
