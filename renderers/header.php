<?php

/* Rendering Class for Header Blocks */
class HeaderRender extends Render {

  public $def; // Storage for the block definition.
  public $rows           = 1;
  public $padding        = 'py-0';
  public $margin         = 'mb-3';
  public $gap            = 'gap-3';
  public $height         = 'auto';
  public $contentWrap; // Holds content wrap element data.
  public $contentClasses = 'flex items-center content-center';
  public $children       = array();

  public function render() {

    $this->addClass( $this->margin );
    $this->addClass( $this->padding );
    $this->addClass( $this->gap );

    if( $this->height !== 'auto' ) {
      $this->addClass( $this->height );
    }

    $classes = $this->getClasses();

    if( $this->rows > 1 ) {

      $nav = new NavRender();
      $nav->addClass( 'justify-end' ); // Push nav to the right.
      $nav->addClass( 'flex-1' );

      $flex = new FlexRender();
      $flex->backgroundColor = 'bg-slate-50';
      $flex->children[] = $nav;
      $flex->render();

    }

    print '<header class="' . $classes . '">'; // Opening header.

    if( ! empty( $this->children ) ) {
      foreach( $this->children as $child ) {
        $child->render();
      }
    }

    print '</header>';

  }

  public function logo( $def ) {

    // Init child block renderers.
    $logo = new LogoRender();

    /* Logo Fill */
    if( $def->logo->fill ) {
      $logo->fill = $def->logo->fill;
    }

    return $logo;

  }

  public function nav( $def ) {

    /*
     * Nav Classes
     */
    $nav = new NavRender();

    if( $def->nav->gap ) {
      $nav->gap = $def->nav->gap;
    }

    /* Nav Items. */

    // Nav Item Font Weight.
    if( $def->nav->item->fontWeight ) {
      $nav->item->fontWeight = $def->nav->item->fontWeight;
    }

    // Nav Item Text Color.
    if( $def->nav->item->textColor ) {
      $nav->item->textColor = $def->nav->item->textColor;
    }

    return $nav;

  }


}
