<?php

require_once( get_template_directory() . '/renderers/header.php' );
require_once( get_template_directory() . '/renderers/flex.php' );
require_once( get_template_directory() . '/renderers/button.php' );
require_once( get_template_directory() . '/renderers/logo.php' );
require_once( get_template_directory() . '/renderers/nav.php' );
require_once( get_template_directory() . '/renderers/nav-item.php' );
require_once( get_template_directory() . '/renderers/footer.php' );

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
