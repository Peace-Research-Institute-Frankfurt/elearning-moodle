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
    $title = get_string('logo','theme_hsfk');
    $description = get_string('logodesc', 'theme_hsfk');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Custom CSS file.
    $name = 'theme_hsfk/customcss';
    $title = get_string('customcss', 'theme_hsfk');
    $description = get_string('customcssdesc', 'theme_hsfk');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
				
	$ADMIN->add('theme_hsfk', $temp);
				
	/* Front Page Settings */
	$temp = new admin_settingpage('theme_hsfk_frontpage', get_string('frontpageheading', 'theme_hsfk'));	

    // Main Feature 1

    $name = 'theme_hsfk/main_feature_1_title';
    $title = get_string('main_feature_1_title', 'theme_hsfk');
    $default = get_string('main_feature_1_title_default', 'theme_hsfk');
    $setting = new admin_setting_configtext($name, $title, '', $default);
    $temp->add($setting);
    $name = 'theme_hsfk/main_feature_1_body';
    $title = get_string('main_feature_1_body', 'theme_hsfk');
    $default = get_string('main_feature_1_body_default', 'theme_hsfk');
    $setting = new admin_setting_configtextarea($name, $title, '', $default);
    $temp->add($setting);
    
    // Main Feature 2

    $name = 'theme_hsfk/main_feature_2_title';
    $title = get_string('main_feature_2_title', 'theme_hsfk');
    $default = get_string('main_feature_2_title_default', 'theme_hsfk');
    $setting = new admin_setting_configtext($name, $title, '', $default);
    $temp->add($setting);
    $name = 'theme_hsfk/main_feature_2_body';
    $title = get_string('main_feature_2_body', 'theme_hsfk');
    $default = get_string('main_feature_2_body_default', 'theme_hsfk');
    $setting = new admin_setting_configtextarea($name, $title, '', $default);
    $temp->add($setting);

    // Main Feature 3

    $name = 'theme_hsfk/main_feature_3_title';
    $title = get_string('main_feature_3_title', 'theme_hsfk');
    $default = get_string('main_feature_3_title_default', 'theme_hsfk');
    $setting = new admin_setting_configtext($name, $title, '', $default);
    $temp->add($setting);
    $name = 'theme_hsfk/main_feature_3_body';
    $title = get_string('main_feature_3_body', 'theme_hsfk');
    $default = get_string('main_feature_3_body_default', 'theme_hsfk');
    $setting = new admin_setting_configtextarea($name, $title, '', $default);
    $temp->add($setting);

    // Main Feature 4

    $name = 'theme_hsfk/main_feature_4_title';
    $title = get_string('main_feature_4_title', 'theme_hsfk');
    $default = get_string('main_feature_4_title_default', 'theme_hsfk');
    $setting = new admin_setting_configtext($name, $title, '', $default);
    $temp->add($setting);
    $name = 'theme_hsfk/main_feature_4_body';
    $title = get_string('main_feature_4_body', 'theme_hsfk');
    $default = get_string('main_feature_4_body_default', 'theme_hsfk');
    $setting = new admin_setting_configtextarea($name, $title, '', $default);
    $temp->add($setting);
	
	$ADMIN->add('theme_hsfk', $temp);

    /* Slideshow Settings Start */
    		
    $temp = new admin_settingpage('theme_hsfk_slideshow', get_string('slideshowheading', 'theme_hsfk'));
    $temp->add(new admin_setting_heading('theme_hsfk_slideshow', get_string('slideshowheadingsub', 'theme_hsfk'),
    format_text(get_string('slideshowdesc', 'theme_hsfk'), FORMAT_MARKDOWN)));
				
	// Display Slideshow.
    $name = 'theme_hsfk/toggleslideshow';
    $title = get_string('toggleslideshow', 'theme_hsfk');
    $description = null; // was: get_string('toggleslideshowdesc', 'theme_hsfk');
    $yes = get_string('yes');
    $no = get_string('no');
    $default = 1;
    $choices = array(1 => $yes , 0 => $no);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
				
				// Number of slides.
    $name = 'theme_hsfk/numberofslides';
    $title = get_string('numberofslides', 'theme_hsfk');
    $description = null; // was: get_string('numberofslides_desc', 'theme_hsfk');
    $default = 3;
    $choices = array(
        1 => '1',
        2 => '2',
        3 => '3',
        4 => '4',
        5 => '5',
        6 => '6',
        7 => '7',
        8 => '8',
        9 => '9',
        10 => '10',
        11 => '11',
        12 => '12',
        13 => '13',
        14 => '14',
        15 => '15',
        16 => '16',
        17 => '17',
        18 => '18',
        19 => '19',
        20 => '20',
        21 => '21',
        22 => '22',
        23 => '23',
        24 => '24',
        25 => '25',
        26 => '26',
        27 => '27',
        28 => '28',
        29 => '29',
        30 => '30',
    );
    $temp->add(new admin_setting_configselect($name, $title, $description, $default, $choices));
				

    $numberofslides = get_config('theme_hsfk', 'numberofslides');
    for ($i = 1; $i <= $numberofslides; $i++) {
				    
		// Heading
        $name = 'theme_hsfk/slide' . $i . 'info';
        $heading = get_string('slideno', 'theme_hsfk', array('slide' => $i));
        $information = null; // was: get_string('slidenodesc', 'theme_hsfk', array('slide' => $i));
        $setting = new admin_setting_heading($name, $heading, $information);
        $temp->add($setting);
								
		// Image
        $name = 'theme_hsfk/slide' . $i . 'image';
        $title = get_string('slideimage', 'theme_hsfk');
        $description = null; // was: get_string('slideimagedesc', 'theme_hsfk');
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'slide' . $i . 'image');
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);				

        // Title
        $name = 'theme_hsfk/slide' . $i . 'title';
        $title = get_string('slidetitle', 'theme_hsfk');
        $description = null; // was: get_string('slidetitledesc', 'theme_hsfk');
        $default = null; // was: get_string('slidetitledefault','theme_hsfk', array('slideno' => sprintf('%02d', $i) ));
        $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);

        // Caption
        $name = 'theme_hsfk/slide' . $i . 'caption';
        $title = get_string('slidecaption', 'theme_hsfk');
        $description = null; // was: get_string('slidecaptiondesc', 'theme_hsfk');
        $default = null; // was: get_string('slidecaptiondefault','theme_hsfk', array('slideno' => sprintf('%02d', $i) ));
        $setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_TEXT);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);

        // LU Name
        $name = 'theme_hsfk/slide' . $i . 'luname';
        $title = get_string('slideluname', 'theme_hsfk');
        $description = null; // was: get_string('slidelunamedesc', 'theme_hsfk');
        $default = null;
        $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);

        // LU ULR
        $name = 'theme_hsfk/slide' . $i . 'luurl';
        $title = get_string('slideluurl', 'theme_hsfk');
        $description = null; // was: get_string('slideluurldesc', 'theme_hsfk');
        $default = null;
        $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);

	}
	
	$ADMIN->add('theme_hsfk', $temp);
	/* Slideshow Settings End*/
	
	/* Footer Settings start */
	
	$temp = new admin_settingpage('theme_hsfk_footer', get_string('footerheading', 'theme_hsfk'));
				
    // Footer Logo file setting.
    $name = 'theme_hsfk/footerlogo';
    $title = get_string('footerlogo','theme_hsfk');
    $description = get_string('footerlogodesc', 'theme_hsfk');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'footerlogo');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

				
	/* Footer Content */
	$name = 'theme_hsfk/footnote';
    $title = get_string('footnote', 'theme_hsfk');
    $description = get_string('footnotedesc', 'theme_hsfk');
    $default = get_string('footnotedefault', 'theme_hsfk');
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
	
	// INFO1 Links
    
    $name = 'theme_hsfk/info1title';
    $title = get_string('info1title', 'theme_hsfk');
    $description = get_string('info1title_desc', 'theme_hsfk');
    $default = get_string('info1title_default','theme_hsfk');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);
	
		$name = 'theme_hsfk/info1links';
    $title = get_string('info1links', 'theme_hsfk');
    $description = get_string('info1links_desc', 'theme_hsfk');
    $default = get_string('info1links_default', 'theme_hsfk');
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
	
	// INFO2 Links
	
    $name = 'theme_hsfk/info2title';
    $title = get_string('info2title', 'theme_hsfk');
    $description = get_string('info2title_desc', 'theme_hsfk');
    $default = get_string('info2title_default','theme_hsfk');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);
	
		$name = 'theme_hsfk/info2links';
    $title = get_string('info2links', 'theme_hsfk');
    $description = get_string('info2links_desc', 'theme_hsfk');
    $default = get_string('info2links_default', 'theme_hsfk');
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
	
	// copyright 
	
	$name = 'theme_hsfk/copyright_footer';
    $title = get_string('copyright_footer', 'theme_hsfk');
    $description = '';
    $default = get_string('copyright_default','theme_hsfk');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);
				

				/* Address , Email , Phone No */
				
				$name = 'theme_hsfk/address';
    $title = get_string('address', 'theme_hsfk');
    $description = '';
    $default = get_string('defaultaddress','theme_hsfk');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);
				
				
				$name = 'theme_hsfk/emailid';
    $title = get_string('emailid', 'theme_hsfk');
    $description = '';
    $default = get_string('defaultemailid','theme_hsfk');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);
				
					$name = 'theme_hsfk/phoneno';
    $title = get_string('phoneno', 'theme_hsfk');
    $description = '';
    $default = get_string('defaultphoneno','theme_hsfk');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);
				
					/* Facebook,Pinterest,Twitter,Google+ Settings */
				$name = 'theme_hsfk/fburl';
    $title = get_string('fburl', 'theme_hsfk');
    $description = get_string('fburldesc', 'theme_hsfk');
    $default = get_string('fburl_default','theme_hsfk');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);
				
				$name = 'theme_hsfk/pinurl';
    $title = get_string('pinurl', 'theme_hsfk');
    $description = get_string('pinurldesc', 'theme_hsfk');
    $default = get_string('pinurl_default','theme_hsfk');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);
				
				$name = 'theme_hsfk/twurl';
    $title = get_string('twurl', 'theme_hsfk');
    $description = get_string('twurldesc', 'theme_hsfk');
    $default = get_string('twurl_default','theme_hsfk');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);
				
				$name = 'theme_hsfk/gpurl';
    $title = get_string('gpurl', 'theme_hsfk');
    $description = get_string('gpurldesc', 'theme_hsfk');
    $default = get_string('gpurl_default','theme_hsfk');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    $ADMIN->add('theme_hsfk', $temp);
			 /*  Footer Settings end */	
				
				
}
