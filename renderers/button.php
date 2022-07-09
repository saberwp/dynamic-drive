<?php


/* @TODO Move me!! */
class Render {}

/* Rendering Class for Button Blocks */
class ButtonRender extends Render {

  public $text         = 'Button Text';
  public $textColor    = 'text-black';
  public $url          = 'site_url';
  public $borderColor  = 'border-black';
  public $borderRadius = 'rounded-none';
  public $fontWeight   = 'font-medium';
  public $padding      = 'p-2';
  public $classes      = 'ml-auto border border-black';

  public function render() {

    // Add classes.
    $this->addClass( $this->textColor );
    $this->addClass( $this->borderRadius );
    $this->addClass( $this->borderColor );
    $this->addClass( $this->fontWeight );
    $this->addClass( $this->padding );
    $classes = $this->getClasses();

    // Set $url.
    $url = site_url();

    print '<button class="' . $classes . '">';
    print '<a href="' . $url . '">';
    print $this->text;
    print '</a>';
    print '</button>';

  }

  public function addClass( $classTitle ) {
    $this->classes .= ' ' . $classTitle;
  }

  public function getClasses() {
    return $this->classes;
  }

}
