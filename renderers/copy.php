<?php

class CopyRender extends Render {

  public function render() {

    $text = 'Wealth management you can trust, from <span class="text-zinc-200">industry leaders.</span>';

    $classes = $this->getClasses();

    print '<div class="' . $classes . '">';
    print $text;
    print '</div>';

  }

}
