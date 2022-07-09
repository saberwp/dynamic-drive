<?php

class NavItemRender extends Render {

  public $text       = 'Nav Item';
  public $fontWeight = 'font-medium';
  public $textColor  = 'text-black';

  public function render() {

    $this->addClass( $this->fontWeight );
    $this->addClass( $this->textColor );
    $classes = $this->getClasses();
    print '<li class="' . $classes . '">';
    print '<a href="' . site_url() . '">';
    print $this->text;
    print '</a>';
    print '</li>';

  }


}
