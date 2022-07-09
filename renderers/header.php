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

    // Get the main content child (a flex block).
    $this->children[] = $this->content( $this->def );

    $this->addClass( $this->margin );
    $this->addClass( $this->padding );
    $this->addClass( $this->gap );

    // Set height from definition.
    if( isset( $this->def->height ) ) {
      $this->height = $this->def->height;
    }

    // Set rows count from definition.
    if( isset( $this->def->rows ) ) {
      $this->rows = $this->def->rows;
    }

    // Apply height class. 
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

  public function content( $def ) {

    $flex = new FlexRender();
    $flex->children[] = $this->logo( $def );
    $flex->children[] = $this->nav( $def );
    $flex->children[] = $this->button( $def );

    // Background color across entire header applied to the flex child element.
    if( $def->background->color ) {
      $flex->backgroundColor = $def->background->color;
    }

    if( $def->content->padding ) {
      $flex->padding = $def->content->padding;
    }

    // Content wrap gap.
    if( $def->content->gap ) {
      $flex->gap = $def->content->gap;
    }

    return $flex;

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

  public function button( $def ) {

    $button = new ButtonRender();

    // Button Text.
    if( $def->button->text ) {
      $button->text = $def->button->text;
    }

    // Button Text Color.
    if( $def->button->textColor ) {
      $button->textColor = $def->button->textColor;
    }

    // Button Border Color.
    if( $def->button->borderColor ) {
      $button->borderColor = $def->button->borderColor;
    }

    // Button Radius.
    if( $def->button->borderRadius ) {
      $button->borderRadius = $def->button->borderRadius;
    }

    // Button Padding.
    if( $def->button->padding ) {
      $button->padding = $def->button->padding;
    }

    return $button;

  }


}
