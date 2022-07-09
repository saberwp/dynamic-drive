<?php

/*
 * Definition Code Standards
 *
 * 1) We only use arrays when there are multiple items, anything singular should be an object.
 *
 */

$def = new stdClass;
$def->key          = 'lincoln';
$def->title        = "Header 1";
$def->description  = "This is a basic header with 1 row.";
$def->rows         = 1; // Total rows in the header.
$def->logo         = 'http://bigbrains.local/wp-content/uploads/2022/07/Group-1.png';
$def->height       = 'auto'; // Auto | Tailwinds height class.
$def->background   = new stdClass;
$def->background->color = 'bg-gray-100';
$def->contentCentered = true;
$def->contentMaxWidth = 'max-w-screen-lg';
$def->contentWrap   = new stdClass();
$def->contentWrap->padding = 'py-3';
$def->contentWrap->gap     = 'gap-4';

// Button.
$def->button = new stdClass;
$def->button->text = "Shop Now";

// Nav.
$def->nav = new stdClass;
$def->nav->gap = 'gap-3';

// Special settings.
$def->sticky     = false;
$def->fullHeight = false;
