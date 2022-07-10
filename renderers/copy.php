<?php

class CopyRender extends Render {

  public $text = '';

  public function render() {

    if( $this->text ) {
      $text = $this->text;
    } else {
      $text = 'Wealth management you can trust, from <span class="text-zinc-200">industry leaders.</span>';
    }

    $classes = $this->getClasses();

    print '<div class="' . $classes . '">';
    print $text;
    print '</div>';

  }

}
