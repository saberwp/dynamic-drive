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


    // Load the blueprint.
    require_once( get_template_directory() . '/definitions/header/' . $blueprint['key'] .'.php' );

    // Render the header.
    $header = new HeaderRender();
    $header->id  = 'header-' . $def->key;
    $header->def = $def;
    $header->render();

    // Render the JSON version of the blueprint definition.
    print '<div id="header-def-'. $def->key .'" style="display:none;">';
    print json_encode( $def );
    print '</div>';

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

      <h2 class="font-bold text-md my-4">Converting Generator Classes Into Block Classes</h2>
      <p>Style information in the form of Tailwinds CSS classes are used here in the generator. These initially come from the design blueprint. They are then edited as you customize the design using the generator configuration settings.</p>

    </div>
    <!-- ./ #docs Docs -->

  </div>

  <script>

    const blueprintSelector = document.getElementById('blueprint-selector');
    blueprintSelector.addEventListener( 'change', function( e ) {

      const blueprintId = blueprintSelector.value;
      const canvas   = document.getElementById( 'canvas' );

      const currentArray = document.querySelectorAll( '.editor-preview-selected' );

      console.log( currentArray )

      if( currentArray.length > 0 ) {

        for ( let el of currentArray ) {

          console.log('removing class and hiding el')
          console.log( el )

          el.classList.remove( 'editor-preview-selected' );
          el.style.display = 'none';
        }

      }

      // Show the selected header.
      const selected = document.getElementById( 'header-' + blueprintId );
      selected.style.display = 'block';
      selected.classList.add( 'editor-preview-selected' );

      // Show the selected header definition JSON.
      const selectedDef = document.getElementById( 'header-def-' + blueprintId );
      selectedDef.style.display = 'block';
      selectedDef.classList.add( 'editor-preview-selected' );

    });

    /* Export */

    const exportButton = document.getElementById('export-button');
    exportButton.addEventListener( 'click', function( e ) {

      console.log('exporting...')

      fetch('http://bigbrains.local/wp-json/acfengine/v1/generate/')
        .then( response => response.json() )
        .then( data => console.log( data ) );
      });

  </script>

  <style>

    .flex svg {
      max-width: 100%;
    }

    <?php
      foreach( $blueprints as $blueprint ) {
        print '#header-' . $blueprint['key'] . ' { display: none; }';
        print '#header-def-' . $blueprint['key'] . ' { display: none; }';
      }
    ?>
  </style>

</body>
</html>
