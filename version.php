<?php

defined('MOODLE_INTERNAL') || die;

$plugin->version   = 201912020003;
$plugin->maturity = MATURITY_STABLE; // this version's maturity level.
$plugin->release = 'Moodle 3.0.1 (Build: 20151221)';
$plugin->requires  = 2013110500;
$plugin->component = 'theme_hsfk';
$plugin->dependencies = array(
	'theme_boost' => '2016102100'
);
