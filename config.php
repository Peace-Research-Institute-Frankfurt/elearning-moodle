<?php

$THEME->name = 'hsfk';

$THEME->doctype = 'html5';
$THEME->parents = array('boost');
$THEME->enable_dock = true;
$THEME->yuicssmodules = array();
// $THEME->sheets = array('theme');

$THEME->editor_sheets = [];
$THEME->requiredblocks = '';
$THEME->enable_dock = true;
$THEME->addblockposition = BLOCK_ADDBLOCK_POSITION_FLATNAV;
$THEME->haseditswitch = true;

$THEME->rendererfactory = 'theme_overridden_renderer_factory';
$THEME->csspostprocess = 'theme_hsfk_process_css';

$THEME->layouts = array(
	// The site home page.
	'standard' => array(
		'file' => 'course.php',
		'options' => array('nonavbar' => false),
	),
	'frontpage' => array(
		'file' => 'frontpage.php',
		'options' => array('nonavbar' => false),
	),
	'course' => array(
		'file' => 'course.php',
		'regions' => array('side-pre'),
		'defaultregion' => 'side-pre',
		'options' => array('nonavbar' => true),
	),
	'incourse' => array(
		'file' => 'incourse.php',
		'options' => array('nonavbar' => false),
	),
	'search' => array(
		'file' => 'incourse.php',
		'options' => array('nonavbar' => false),
	),
);
