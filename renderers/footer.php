<?php

/* Rendering Class for Footer Blocks */
class FooterRender extends Render {


  public function render() {

    $classes = $this->getClasses();

    print '<footer class="' . $classes . '">';
    print 'FOOTER';
    print '</footer>';

  }

}
