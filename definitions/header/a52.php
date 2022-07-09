<?php

$def = new stdClass;
$def->title                 = "Header 1";
$def->description           = "This is a basic header with 1 row.";
$def->rows                  = 2; // Total rows in the header.
$def->logo                  = 'http://bigbrains.local/wp-content/uploads/2022/07/Group-1.png';
$def->background            = new stdClass;
$def->background->color     = 'bg-purple-800';
$def->contentCentered       = true;
$def->contentMaxWidth       = 'max-w-screen-lg';
$def->contentWrap           = new stdClass();
$def->content               = new stdClass();
$def->content->gap          = 'gap-4';
$def->content->padding      = 'py-8';
$def->logo                  = new stdClass;
$def->logo->fill            = 'fill-white';
$def->button                = new stdClass;
$def->button->text          = "Register Now";
$def->button->borderColor   = 'border-white';
$def->button->textColor     = 'text-white';
$def->button->padding       = 'px-6 py-2';

/* Nav Blocks */
$def->nav                       = new stdClass;
$def->nav->gap                  = 'gap-3';

/* Nav Item Blocks */
$def->nav->item                 = new stdClass;
$def->nav->item->fontWeight     = 'font-semibold';
$def->nav->item->textColor      = 'text-white';
$def->nav->item->hoverTextColor = 'hover:text-gray-300';
