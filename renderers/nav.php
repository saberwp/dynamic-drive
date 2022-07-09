<?php

/* Rendering Class for Nav Blocks */
class NavRender extends Render {

  public $gap     = 'gap-2';
  public $item;
  public $classes = 'flex';

  public function __construct() {

    $this->item = new stdClass;

  }

  public function render() {

    $this->addClass( $this->gap );
    $classes = $this->getClasses();

    // Render nav.
    print '<ul class="' . $classes . '">';
    $navItem = new NavItemRender();

    // Set NavItem styles.

    if( $this->item->fontWeight ) {
      $navItem->fontWeight = $this->item->fontWeight;
    }

    if( $this->item->textColor ) {
      $navItem->textColor = $this->item->textColor;
    }

    $navItem->render();
    $navItem->render();
    $navItem->render();
    print '</ul>';

  }

}
