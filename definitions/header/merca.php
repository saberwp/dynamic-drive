<?php

$def = new stdClass;
$def->key                   = 'merca';
$def->title                 = "Merca";
$def->description           = "Full page hero header.";
$def->rows                  = 3; // Total rows in the header.
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
$def->logo->fill            = 'fill-zinc-200';
$def->button                = new stdClass;
$def->button->text          = "Register Now";
$def->button->borderColor   = 'border-fuchsia-300';
$def->button->textColor     = 'text-white';
$def->button->padding       = 'px-6 py-2';

/* Define Content Rows. */
$def->content->rows = array();

// Add Flex Row.
$row1 = new FlexRender();
$row1->backgroundColor = 'bg-none';
$row1->addClass( 'justify-between' );

// Add Nav.
$nav = new NavRender();

// Setup Nav Item Styles.
$navItemTextColor         = 'text-fuchsia-500';
$navItemHoverTextColor    = 'hover:text-fuchsia-200';

// Add Nav Items.
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

// Add Nav to Row.
$row1->children[] = $nav;

// Add Logo.
$logo = new LogoRender();
$logo->fill = 'fill-white';
$row1->children[] = $logo;

// Add Button.
$button              = new ButtonRender();
$button->text        = 'Open Account';
$button->textColor   = 'text-fuchsia-500';
$button->borderColor = 'border-fuchsia-500';
$button->addClass( 'rounded-md' );
$row1->children[]    = $button;

// Add extra bottom margin under row.
$row1->addClass( 'mb-12' );

// Add Row to Header.
$def->content->rows[] = $row1;

/* Second Row */
/*************************/
$row2 = new FlexRender();
$row2->backgroundColor = 'bg-black/30';
$row2->addClass( 'justify-between' );
$row2->padding = 'py-20 px-0';

// Add SVG image.
$svg              = new SvgRender();
$row2->children[] = $svg;

// Add Copy text.
$copy             = new CopyRender();
$copy->addClass( 'max-w-md' );
$copy->addClass( 'text-fuchsia-700' );
$copy->addClass( 'font-bold' );
$copy->addClass( 'text-3xl' );
$copy->addClass( 'text-center' );
$row2->children[] = $copy;

$gradient          = new GradientRender();
$row2->children[] = $gradient;

$def->content->rows[] = $row2;

// Row 3.
$row3 = new FlexRender();
$row3->backgroundColor = 'bg-none';
$row3->addClass( 'justify-between' );
$row3->addClass('h-20');
$def->content->rows[] = $row3;

// Make Row 3, Col 1.
$copy = new CopyRender();
$copy->text = 'Legal Notices';
$copy->addClass( 'text-zinc-200' );
$copy->addClass( 'font-semibold' );
$row3->children[] = $copy;

// Make Row 3, Col 2.
$button           = new ButtonRender();
$button->text     = __( 'LEARN MORE', 'acf-engine' );
$button->addClass( 'border-none' );
$row3->children[] = $button;

// Make Row 3, Col 3.
$button                       = new ButtonRender();
$button->text                 = __( 'Client Portal', 'acf-engine' );
$button->textColor            = 'text-zinc-200';
$button->hoverBackgroundColor = 'hover:bg-none';
$button->hasIcon              = true;
$button->icon                 = new SvgRender();
$button->icon->width          = 'w-8';
$button->addClass( 'flex flex-col justify-center items-center gap-0' );
$row3->children[] = $button;

/* Nav Blocks */
$def->nav                       = new stdClass;
$def->nav->gap                  = 'gap-3';

/* Nav Item Blocks */
$def->nav->item                 = new stdClass;
$def->nav->item->fontWeight     = 'font-semibold';
$def->nav->item->textColor      = 'text-fuchsia-500';
$def->nav->item->hoverTextColor = 'hover:text-gray-300';

/* Add Full Height Support */
$def->fullHeight = true;
