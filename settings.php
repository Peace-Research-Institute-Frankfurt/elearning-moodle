<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * @package   theme_hsfk
 * @copyright 2015 Nephzat Dev Team, nephzat.com
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;
$settings = null;

if (is_siteadmin()) {

	$ADMIN->add('themes', new admin_category('theme_hsfk', 'HSFK'));

	/* Header Settings */
	$temp = new admin_settingpage('theme_hsfk_header', get_string('headerheading', 'theme_hsfk'));

	// Logo file setting.
	$name = 'theme_hsfk/logo';
	$title = get_string('logo', 'theme_hsfk');
	$description = get_string('logodesc', 'theme_hsfk');
	$setting = new admin_setting_configstoredfile($name, $title, $description, 'logo');
	$setting->set_updatedcallback('theme_reset_all_caches');
	$temp->add($setting);


	/* Front Page Settings */
	$temp = new admin_settingpage('theme_hsfk_frontpage', get_string('frontpageheading', 'theme_hsfk'));

	// Image
	$name = 'theme_hsfk/hero_image';
	$title = "Hero image";
	$description = null;
	$setting = new admin_setting_configstoredfile($name, $title, $description, "hero_image");
	$setting->set_updatedcallback('theme_reset_all_caches');
	$temp->add($setting);

	// Hero Features 1-4
	for ($i = 1; $i <= 4; $i++) {
		$name = 'theme_hsfk/main_feature_' . $i . '_title';
		$title = get_string('main_feature_' . $i . '_title', 'theme_hsfk');
		$default = get_string('main_feature_' . $i . '_title_default', 'theme_hsfk');
		$setting = new admin_setting_configtext($name, $title, '', $default);
		$temp->add($setting);
		$name = 'theme_hsfk/main_feature_' . $i . '_body';
		$title = get_string('main_feature_' . $i . '_body', 'theme_hsfk');
		$default = get_string('main_feature_' . $i . '_body_default', 'theme_hsfk');
		$setting = new admin_setting_configtextarea($name, $title, '', $default);
		$temp->add($setting);
	}

	$ADMIN->add('theme_hsfk', $temp);

	$temp = new admin_settingpage('theme_hsfk_slideshow', "Contributors");
	$temp->add(new admin_setting_heading(
		'theme_hsfk_slideshow',
		get_string('slideshowheadingsub', 'theme_hsfk'),
		format_text(get_string('slideshowdesc', 'theme_hsfk'), FORMAT_MARKDOWN)
	));

	$name = 'theme_hsfk/toggleslideshow';
	$title = get_string('toggleslideshow', 'theme_hsfk');
	$description =  get_string('toggleslideshowdesc', 'theme_hsfk');
	$setting = new admin_setting_configselect($name, $title, $description, 1, array(1 => "Enable", 0 => "Disable"));
	$setting->set_updatedcallback('theme_reset_all_caches');
	$temp->add($setting);


	$contributor_count_setting = new admin_setting_configtext("theme_hsfk/contributor_count", "Contributor count", "The number of learning unit contributors. Must be an integer.", 30, PARAM_INT);
	$contributor_count_setting->set_updatedcallback('theme_reset_all_caches');
	$temp->add($contributor_count_setting);

	$contributor_count = get_config("theme_hsfk", "contributor_count");

	for ($i = 1; $i <= $contributor_count; $i++) {

		// Heading
		$name = 'theme_hsfk/slide' . $i . 'info';
		$heading = get_string('slideno', 'theme_hsfk', array('slide' => $i));
		$information = null;
		$setting = new admin_setting_heading($name, $heading, $information);
		$temp->add($setting);

		// Title
		$name = 'theme_hsfk/slide' . $i . 'title';
		$title = "Name";
		$description = null;
		$default = null;
		$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
		$setting->set_updatedcallback('theme_reset_all_caches');
		$temp->add($setting);

		// Image
		$name = 'theme_hsfk/slide' . $i . 'image';
		$title = get_string('slideimage', 'theme_hsfk');
		$description = null;
		$setting = new admin_setting_configstoredfile($name, $title, $description, 'slide' . $i . 'image');
		$setting->set_updatedcallback('theme_reset_all_caches');
		$temp->add($setting);

		// Caption
		$name = 'theme_hsfk/slide' . $i . 'caption';
		$title = "Bio";
		$description = null;
		$default = null;
		$setting = new admin_setting_confightmleditor($name, $title, $description, $default);
		$setting->set_updatedcallback('theme_reset_all_caches');
		$temp->add($setting);
	}

	$ADMIN->add('theme_hsfk', $temp);

	/* Footer Settings */

	$temp = new admin_settingpage('theme_hsfk_footer', get_string('footerheading', 'theme_hsfk'));

	/* Contact info */
	$name = 'theme_hsfk/address';
	$title = get_string('address', 'theme_hsfk');
	$description = '';
	$default = get_string('defaultaddress', 'theme_hsfk');
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$temp->add($setting);


	$name = 'theme_hsfk/emailid';
	$title = get_string('emailid', 'theme_hsfk');
	$description = '';
	$default = get_string('defaultemailid', 'theme_hsfk');
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$temp->add($setting);

	$name = 'theme_hsfk/phoneno';
	$title = get_string('phoneno', 'theme_hsfk');
	$description = '';
	$default = get_string('defaultphoneno', 'theme_hsfk');
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$temp->add($setting);

	// Copyright
	$name = 'theme_hsfk/copyright_footer';
	$title = get_string('copyright_footer', 'theme_hsfk');
	$description = '';
	$default = get_string('copyright_default', 'theme_hsfk');
	$setting = new admin_setting_configtext($name, $title, $description, $default);
	$temp->add($setting);


	$ADMIN->add('theme_hsfk', $temp);
}
