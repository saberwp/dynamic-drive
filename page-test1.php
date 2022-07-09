<?php

require_once( get_template_directory() . '/renderers/render.php' );
require_once( get_template_directory() . '/renderers/header.php' );
require_once( get_template_directory() . '/renderers/flex.php' );
require_once( get_template_directory() . '/renderers/button.php' );
require_once( get_template_directory() . '/renderers/logo.php' );
require_once( get_template_directory() . '/renderers/nav.php' );
require_once( get_template_directory() . '/renderers/nav-item.php' );
require_once( get_template_directory() . '/renderers/footer.php' );

// require_once( get_template_directory() . '/definitions/header/lincoln.php' );
// require_once( get_template_directory() . '/definitions/header/lincoln-s.php' );
require_once( get_template_directory() . '/definitions/header/a52.php' );

function defaults() {

  $def = new stdClass;
  $def->title        = "Header 1";
  $def->description  = "This is a basic header with 1 row.";

  // Special settings.
  $def->rows       = 2; // Total rows in the header.
  $def->sticky     = false;
  $def->fullHeight = false;
  $def->height     = 'auto'; // Auto | Tailwinds height class.
  $def->background   = new stdClass;
  $def->background->color = 'bg-gray-100';
  $def->contentCentered = true;
  $def->contentMaxWidth = 'max-w-screen-lg';
  $def->contentWrap   = new stdClass();
  $def->contentWrap->padding = 'py-3';
  $def->contentWrap->gap     = 'gap-4';

  // Button.
  $def->button               = new stdClass;
  $def->button->text         = "Shop Now";
  $def->button->borderRadius = 'rounded-none';

  // Nav.
  $def->nav = new stdClass;
  $def->nav->gap = 'gap-3';
  $def->nav->item = new stdClass;
  $def->nav->item->fontWeight = 'font-medium';

  return $def;

}

/* Render function. */
function render( $def ) {

  // Load the render defaults.
  $default = defaults();

  // Init child block renderers.
  $logo = new LogoRender();

  /* Logo Fill */
  if( $def->logo->fill ) {
    $logo->fill = $def->logo->fill;
  } else {
    $logo->fill = $default->logo->fill;
  }

  // Main element classes.
  $classes = '';

  // Main element padding.
  if( $def->contentWrap->padding ) {
    $classes .= $def->contentWrap->padding;
  } else {
    $classes .= $default->contentWrap->padding;
  }

  // Background color across entire header.
  if( $def->background->color ) {
    $classes .= ' ' . $def->background->color;
  } else {
    $classes .= ' ' . $default->background->color;
  }

  // Get height setting.
  if( isset( $def->height ) ) {
    $height = $def->height;
  } else {
    $height = $default->height;
  }

  // Apply height setting.
  if( $height !== 'auto' ) {
    $classes .= ' ' . $height;
  }

  // Setup header for sticky.
  if( $def->sticky ) {
    $classes .= ' sticky top-0 shadow-md mb-2';
  }

  // Setup header for full screen height.
  if( $def->fullHeight ) {
    $classes .= ' h-screen';
  }

  /*
   * Content centering.
   */

  // Content wrapper element classes.
  $contentClasses = 'flex items-center content-center';
  $contentCentered = $default->contentCentered; // Set default.
  if( isset( $def->contentCentered ) ) { // Apply definition.
    $contentCentered = $def->contentCentered;
  }

  // Handle $contentCentered option.
  if( $contentCentered ) {
    $contentClasses .= ' mx-auto';
  }

  if( $def->contentMaxWidth ) {
    $contentClasses .= ' ' . $def->contentMaxWidth;
  } else {
    $contentClasses .= ' ' . $default->contentMaxWidth;
  }

  // Content wrap gap.
  if( $def->contentWrap->gap ) {
    $contentClasses .= ' ' . $def->contentWrap->gap;
  } else {
    $contentClasses .= ' ' . $default->contentWrap->gap;
  }

  /*
   * Nav Classes
   */
  $nav = new NavRender();

  if( $def->nav->gap ) {
    $nav->gap = $def->nav->gap;
  } else {
    $nav->gap = $default->nav->gap;
  }

  /* Nav Items. */

  // Nav Item Font Weight.
  if( $def->nav->item->fontWeight ) {
    $nav->item->fontWeight = $def->nav->item->fontWeight;
  } else {
    $nav->item->fontWeight = $default->nav->item->fontWeight;
  }

  // Nav Item Text Color.
  if( $def->nav->item->textColor ) {
    $nav->item->textColor = $def->nav->item->textColor;
  } else {
    $nav->item->textColor = $default->nav->item->textColor;
  }

  /* ./ End Nav Item Classes */

  /* ./ End Nav Classes */

  /* Upper Nav. */
  $nav2 = new NavRender();
  $nav2->addClass( 'justify-end' ); // Push nav to the right. 

  // Button Styling.

  $button = new ButtonRender();

  // Button Text.
  if( $def->button->text ) {
    $button->text = $def->button->text;
  } else {
    $button->text = $default->button->text;
  }

  // Button Text Color.
  if( $def->button->textColor ) {
    $button->textColor = $def->button->textColor;
  } else {
    $button->textColor = $default->button->textColor;
  }

  // Button Border Color.
  if( $def->button->borderColor ) {
    $button->borderColor = $def->button->borderColor;
  } else {
    $button->borderColor = $default->button->borderColor;
  }

  // Button Radius.
  if( $def->button->borderRadius ) {
    $button->borderRadius = $def->button->borderRadius;
  } else {
    $button->borderRadius = $default->button->borderRadius;
  }

  // Button Padding.
  if( $def->button->padding ) {
    $button->padding = $def->button->padding;
  } else {
    $button->padding = $default->button->padding;
  }

  if( $def->rows > 1 ) {
    $flex1 = new FlexRender();
    $flex1->backgroundColor = 'bg-slate-50';
    $flex1->children[] = $nav2;
    $flex1->render();
  }

  print '<header class="' . $classes . '">'; // Opening header.
  print '<div class="' . $contentClasses . '">'; // Content wrapper.

    $logo->render();
    $nav->render();

    if( $def->button || $default->button ) {
      $button->render();
    }

  print '</header>';

}

?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <?php

    // Do render.
    render( $def );

  ?>

  <p>asfdsafdsa safsda fdsfdsafsdafd sf</p>
  <p>asfdsafdsa safsda fdsfdsafsdafd sf</p>
  <p>asfdsafdsa safsda fdsfdsafsdafd sf</p>
  <p>asfdsafdsa safsda fdsfdsafsdafd sf</p>
  <p>asfdsafdsa safsda fdsfdsafsdafd sf</p>
  <p>asfdsafdsa safsda fdsfdsafsdafd sf</p>
  <p>asfdsafdsa safsda fdsfdsafsdafd sf</p>
  <p>asfdsafdsa safsda fdsfdsafsdafd sf</p>
  <p>asfdsafdsa safsda fdsfdsafsdafd sf</p>
  <p>asfdsafdsa safsda fdsfdsafsdafd sf</p>
  <p>asfdsafdsa safsda fdsfdsafsdafd sf</p>

</body>
</html>

<?php

var_dump( $def );
$defj = json_encode( $def );
var_dump( $defj );
