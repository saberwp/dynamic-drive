<?php

/* Rendering Class for Header Blocks */
class HeaderRender extends Render {

  public $id             = 'site-header';
  public $def; // Storage for the block definition.
  public $rows           = 1;
  public $sticky         = false;
  public $fullHeight     = false;
  public $padding        = 'py-0';
  public $margin         = 'mb-3';
  public $gap            = 'gap-3';
  public $height         = 'auto';
  public $contentWrap; // Holds content wrap element data.
  public $contentClasses = 'flex items-center content-center';
  public $children       = array();

  public function render() {

    $this->addClass( $this->margin );
    $this->addClass( $this->padding );
    $this->addClass( $this->gap );

    // Set height from definition.
    if( isset( $this->def->height ) ) {
      $this->height = $this->def->height;
    }

    // Set rows count from definition.
    if( isset( $this->def->rows ) ) {
      $this->rows = $this->def->rows;
    }

    // Setup header for sticky.
    if( $this->def->sticky ) {
      $this->addClass( 'sticky top-0 shadow-md mb-2' );
    }

    // Setup header for full height.
    if( $this->def->fullHeight ) {
      $this->addClass( 'h-screen' );
    }

    // Add Gradient Background.
    // $this->addClass( 'bg-gradient-to-r from-purple-500 to-pink-500' );

    // Add image background.
    $this->addClass( 'bg-[url(\'http://bigbrains.local/wp-content/themes/dynamic-drive/assets/images/lion-head.png\')]' );
    $this->addClass( 'bg-no-repeat' );
    $this->addClass( 'bg-cover' );
    $this->addClass( 'bg-center' );

    // Add parallax support.
    // $this->addClass( 'bg-fixed' );

    // Apply height class.
    if( $this->height !== 'auto' ) {
      $this->addClass( $this->height );
    }

    $classes = $this->getClasses();

    print '<header id="' . $this->id . '" class="' . $classes . '">'; // Opening header.

    // First row.
    if( $this->rows > 1 ) {

      if( isset( $this->def->content->rows ) ) {

        $this->def->content->rows[0]->render();

      } else {

        // Default upper header row.
        $navItem1 = new NavItemRender();
        $navItem1->text = 'Register';
        $navItem1->url  = 'register';

        $navItem2 = new NavItemRender();
        $navItem2->text = 'Login';
        $navItem2->url  = 'login';

        $nav = new NavRender();
        $nav->addClass( 'justify-end' ); // Push nav to the right.
        $nav->addClass( 'flex-1' );
        $nav->children[] = $navItem1;
        $nav->children[] = $navItem2;

        $flex = new FlexRender();
        $flex->backgroundColor = 'bg-slate-50';
        $flex->children[] = $nav;
        $flex->render();

      }

    } /* Render first row or upper row. */


    // Second row.

    if( isset( $this->def->content->rows ) && count( $this->def->content->rows ) >= 2 ) {

      $this->def->content->rows[1]->render();

    } else {

      // Get the main content child (a flex block).
      $this->children[] = $this->content( $this->def );

      if( ! empty( $this->children ) ) {
        foreach( $this->children as $child ) {
          $child->render();
        }
      }

    }

    // Third row.
    if( isset( $this->def->content->rows ) && count( $this->def->content->rows ) >= 3 ) {
      $this->def->content->rows[2]->render();
    }

    print '</header>';

  }

  public function content( $def ) {

    $flex = new FlexRender();
    $flex->children[] = $this->logo( $def );
    $flex->children[] = $this->nav( $def );
    $flex->children[] = $this->button( $def );

    // Background color across entire header applied to the flex child element.
    if( $def->background->color ) {
      $flex->backgroundColor = $def->background->color;
    }

    if( $def->content->padding ) {
      $flex->padding = $def->content->padding;
    }

    // Content wrap gap.
    if( $def->content->gap ) {
      $flex->gap = $def->content->gap;
    }

    return $flex;

  }

  public function logo( $def ) {

    // Init child block renderers.
    $logo = new LogoRender();

    /* Logo Fill */
    if( $def->logo->fill ) {
      $logo->fill = $def->logo->fill;
    }

    return $logo;

  }

  public function nav( $def ) {

    /*
     * Nav Classes
     */
    $nav = new NavRender();

    if( $def->nav->gap ) {
      $nav->gap = $def->nav->gap;
    }

    /*
     * Nav Items
     */

    // Inherit NavItem Text Color style.
    $navItemTextColor = NavItemRender::default( 'textColor' );
    if( isset( $this->def->nav->item->textColor ) ) {
      $navItemTextColor = $this->def->nav->item->textColor;
    }

    // Inherit NavItem Hover Text Color style.
    $navItemHoverTextColor = NavItemRender::default( 'hoverTextColor' );
    if( isset( $this->def->nav->item->hoverTextColor ) ) {
      $navItemHoverTextColor = $this->def->nav->item->hoverTextColor;
    }

    $navItem1                 = new NavItemRender();
    $navItem1->text           = 'Shop';
    $navItem1->url            = 'shop';
    $navItem1->textColor      = $navItemTextColor;
    $navItem1->hoverTextColor = $navItemHoverTextColor;
    $nav->children[]          = $navItem1;

    $navItem2            = new NavItemRender();
    $navItem2->text      = 'Products';
    $navItem2->url       = 'products';
    $navItem2->textColor = $navItemTextColor;
    $navItem2->hoverTextColor = $navItemHoverTextColor;
    $nav->children[]          = $navItem2;

    $navItem3            = new NavItemRender();
    $navItem3->text      = 'Company';
    $navItem3->url       = 'company';
    $navItem3->textColor      = $navItemTextColor;
    $navItem3->hoverTextColor = $navItemHoverTextColor;
    $nav->children[]     = $navItem3;

    // Nav Item Font Weight.
    if( $def->nav->item->fontWeight ) {
      $nav->item->fontWeight = $def->nav->item->fontWeight;
    }

    // Nav Item Text Color.
    if( $def->nav->item->textColor ) {
      $nav->item->textColor = $def->nav->item->textColor;
    }

    return $nav;

  }

  public function button( $def ) {

    $button = new ButtonRender();

    // Button Text.
    if( $def->button->text ) {
      $button->text = $def->button->text;
    }

    // Button Text Color.
    if( $def->button->textColor ) {
      $button->textColor = $def->button->textColor;
    }

    // Button Border Color.
    if( $def->button->borderColor ) {
      $button->borderColor = $def->button->borderColor;
    }

    // Button Radius.
    if( $def->button->borderRadius ) {
      $button->borderRadius = $def->button->borderRadius;
    }

    // Button Padding.
    if( $def->button->padding ) {
      $button->padding = $def->button->padding;
    }

    return $button;

  }


}
