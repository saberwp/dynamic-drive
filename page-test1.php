<?php

require_once( get_template_directory() . '/renderers/render.php' );
$blueprint = 'a52'; // a52 | lincoln | lincoln-s
require_once( get_template_directory() . '/definitions/header/' . $blueprint .'.php' );

/* Render function. */
function render( $def ) {

  $header = new HeaderRender();

  // Get height setting.
  if( isset( $def->height ) ) {
    $height = $def->height;
  }

  // Button Styling.

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



  if( $def->rows ) {
    $header->rows = $def->rows;
  }

  $flex = new FlexRender();
  $flex->children[] = $header->logo( $def );
  $flex->children[] = $header->nav( $def );
  $flex->children[] = $button;

  // Background color across entire header applied to the flex child element.
  if( $def->background->color ) {
    $flex->backgroundColor = $def->background->color;
  }

  $header->children[] = $flex;

  // Content wrap gap.
  if( $def->content->gap ) {
    $header->gap = $def->content->gap;
  }

  $header->render();

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
  <?php render( $def ); ?>
</body>
</html>
