<?php

/*
 * Rendering Class for Nav Blocks
 */
 
class NavRender extends Render {

  public $gap         = 'gap-2';
  public $classes     = 'flex';
  public $children    = array();

  public function __construct() {


  }

  public function render() {

    $this->addClass( $this->gap );
    $classes = $this->getClasses();

    // Render nav.
    print '<ul class="' . $classes . '">';
    $this->renderChildren();
    print '</ul>';

  }

}
