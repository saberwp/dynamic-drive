<?php

require_once( get_template_directory() . '/renderers/render.php' );
$blueprint = 'lincoln-s'; // a52 | lincoln | lincoln-s
require_once( get_template_directory() . '/definitions/header/' . $blueprint .'.php' );

/* Render function. */
function render( $def ) {

  $header = new HeaderRender();
  $header->def = $def;
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
  <div style="height: 800px">SCROLLER</div>
</body>
</html>
