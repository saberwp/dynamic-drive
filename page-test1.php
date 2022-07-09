<?php

require_once( get_template_directory() . '/renderers/render.php' );

$blueprints = array(
  array(
    'key'   => 'lincoln',
    'title' => 'Lincoln',
  ),
  array(
    'key'   => 'lincoln-s',
    'title' => 'Lincoln S',
  ),
  array(
    'key'   => 'a52',
    'title' => 'A52',
  ),
  array(
    'key'   => 'a52-s',
    'title' => 'A52 S',
  ),
  array(
    'key'   => 'merca',
    'title' => 'Merca',
  ),
);

/* Render function. */
function render( $blueprints ) {

  foreach( $blueprints as $blueprint ) {

    require_once( get_template_directory() . '/definitions/header/' . $blueprint['key'] .'.php' );
    $header = new HeaderRender();
    $header->id  = 'header-' . $def->key;
    $header->def = $def;
    $header->render();

  }

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

  <div id="canvas">
    <?php render( $blueprints ); ?>
  </div>

  <div class="py-8" style="min-height: 1200px">

    <!-- Editor #editor -->
    <div id="editor" class="py-8 mx-auto max-w-screen-lg">
      <select id="blueprint-selector" class="bg-gray-200">
        <option value="lincoln">Lincoln</option>
        <option value="lincoln-s">Lincoln S</option>
        <option value="a52">A52</option>
        <option value="a52-s">A52 S</option>
        <option value="merca">Merca</option>
      </select>

      <div>
        <button id="export-button" class="bg-gray-800 text-white py-2 px-3 font-semibold my-4">Export</button>
      </div>

    </div>
    <!-- ./ #editor Editor -->

    <!-- Docs #docs -->
    <div id="docs" class="py-8 mx-auto max-w-screen-lg">
      <h2 class="font-bold text-lg">Header Block Documentation</h2>
      <h5>Header Block Generator is supported by ACF Engine and engineered by SaberWP.</h5>

      <h2 class="font-bold text-md my-4">Getting Started Guide</h2>
      <ol class="list-decimal p-0 m-0 ml-4">
        <li>Choose a blueprint for your header.</li>
        <li>Adjust settings to customize the header.</li>
        <li>Save your header design to your account.</li>
        <li>Export your header for use on your WordPress website.</li>
        <li>Install the exported header plugin as you would any other WordPress plugin.</li>
      </ol>
    </div>
    <!-- ./ #docs Docs -->

  </div>

  <script>

    const blueprintSelector = document.getElementById('blueprint-selector');
    blueprintSelector.addEventListener( 'change', function( e ) {

      const blueprintId = blueprintSelector.value;
      const canvas   = document.getElementById( 'canvas' );

      const currentArray = document.getElementsByClassName( 'editor-preview-selected' );

      if( currentArray.length > 0 ) {

        const current = currentArray[0];
        current.classList.remove( 'editor-preview-selected' );
        current.style.display = 'none';

      }



      const selected = document.getElementById( 'header-' + blueprintId );
      selected.style.display = 'block';


      selected.classList.add( 'editor-preview-selected' );



    });

  </script>

  <style>
    <?php
      foreach( $blueprints as $blueprint ) {
        print '#header-' . $blueprint['key'] . ' { display: none; }';
      }
    ?>
  </style>

</body>
</html>
