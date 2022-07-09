<?php

class NavItemRender extends Render {

  public $text           = 'Nav Item';
  public $url            = 'site_url';
  public $fontWeight     = 'font-medium';
  public $textColor      = 'text-black';
  public $hoverTextColor = 'hover:text-gray-500';

  public function render() {

    if( 'site_url' === $this->url ) {
      $url = site_url();
    } else {
      $url = $this->url;
    }

    $this->addClass( $this->fontWeight );
    $this->addClass( $this->textColor );
    $this->addClass( $this->hoverTextColor );
    $classes = $this->getClasses();
    print '<li class="' . $classes . '">';
    print '<a href="' . $url . '">';
    print $this->text;
    print '</a>';
    print '</li>';

  }


}
