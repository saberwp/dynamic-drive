<?php

/* Rendering Class for Button Blocks */
class ButtonRender extends Render {

  public $text         = 'Button Text';
  public $textColor    = 'text-black';
  public $url          = 'site_url';
  public $borderColor  = 'border-black';
  public $borderRadius = 'rounded-none';
  public $fontWeight   = 'font-medium';
  public $padding      = 'p-2';
  public $backgroundColor      = 'bg-transparent';
  public $hoverBackgroundColor = 'hover:bg-slate-500';
  public $hoverTextColor       = 'hover:text-white';
  public $hasIcon      = false;
  public $icon; // SvgRender.

  public function render() {

    // Add classes.
    $this->addClass( $this->textColor );
    $this->addClass( $this->borderRadius );
    $this->addClass( $this->borderColor );
    $this->addClass( $this->fontWeight );
    $this->addClass( $this->padding );
    $this->addClass( $this->hoverBackgroundColor );
    $this->addClass( $this->hoverTextColor );
    $classes = $this->getClasses();

    // Setup icon rendering.
    if( $this->hasIcon ) {
      $this->children[] = $this->icon;
    }

    // Set $url.
    $url = site_url();

    print '<a href="' . $url . '">';
    print '<button class="' . $classes . '">';
    $this->renderChildren();
    print $this->text;
    print '</button>';
    print '</a>';

  }

}
