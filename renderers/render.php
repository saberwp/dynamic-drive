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

  public function renderChildren() {
    if( ! empty( $this->children ) ) {
      foreach( $this->children as $child ) {
        $child->render();
      }
    }
  }

  public static function default( $property ) {
    return self::get( $property );
  }

  /* Returns the value for the given property. */
  public function get( $property ) {
    $classVars = get_class_vars( get_called_class() );
    return $classVars[ $property ];
  }

}
