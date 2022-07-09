<?php

class Render {

  public $classes = '';

  public function addClass( $classTitle, $index = null ) {

    if( $index ) {
      $this->{$index} .= ' ' . $classTitle;
    } else {
      $this->classes .= ' ' . $classTitle;
    }

  }

  public function getClasses() {
    return $this->classes;
  }

}
