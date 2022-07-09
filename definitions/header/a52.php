<?php

/*
 * Definition Code Standards
 *
 * 1) We only use arrays when there are multiple items, anything singular should be an object.
 *
 */

$def = new stdClass;
$def->title        = "Header 1";
$def->description  = "This is a basic header with 1 row.";

// Special settings.
$def->rows       = 2; // Total rows in the header.
$def->sticky     = false;
$def->fullHeight = false;


$def->logo                 = 'http://bigbrains.local/wp-content/uploads/2022/07/Group-1.png';
$def->height               = 'auto'; // Auto | Tailwinds height class.
$def->background           = new stdClass;
$def->background->color    = 'bg-purple-800';
$def->contentCentered      = true;
$def->contentMaxWidth      = 'max-w-screen-lg';
$def->contentWrap          = new stdClass();
$def->contentWrap->padding = 'py-6';
$def->content              = new stdClass();
$def->content->gap         = 'gap-4';

$def->logo                 = new stdClass;
$def->logo->fill           = 'fill-white';

// Button.
$def->button               = new stdClass;
$def->button->text         = "Register Now";
$def->button->borderColor  = 'border-white';
$def->button->textColor    = 'text-white';
$def->button->padding      = 'px-6 py-2';

// Nav.
$def->nav = new stdClass;
$def->nav->gap = 'gap-3';
$def->nav->item             = new stdClass;
$def->nav->item->fontWeight = 'font-semibold';
$def->nav->item->textColor  = 'text-white';
