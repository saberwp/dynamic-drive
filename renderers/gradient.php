<?php

class GradientRender extends Render {

  public $classes = 'h-40 basis-4 bg-gradient-to-b to-fuchsia-800 from-fuchsia-500';

  public function render() {

    $classes = $this->getClasses();
    print '<div class="' . $classes . '">';
    print '</div>';

  }

}
