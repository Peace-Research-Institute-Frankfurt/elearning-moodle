<?php
global $CFG, $OUTPUT, $SESSION, $OUTPUT;
$html = theme_hsfk_get_html_for_settings($OUTPUT, $PAGE);

$context = theme_hsfk_get_context();

$hero_features = array(
	array("title" => theme_hsfk_get_setting('main_feature_1_title'), "body" => theme_hsfk_get_setting('main_feature_1_body')),
	array("title" => theme_hsfk_get_setting('main_feature_2_title'), "body" => theme_hsfk_get_setting('main_feature_2_body')),
	array("title" => theme_hsfk_get_setting('main_feature_3_title'), "body" => theme_hsfk_get_setting('main_feature_3_body')),
	array("title" => theme_hsfk_get_setting('main_feature_4_title'), "body" => theme_hsfk_get_setting('main_feature_4_body'))
);

$contributors = theme_hsfk_get_contributors();

// Join courses

$hero_image = "";
$sn = "hero_image";
if (theme_hsfk_get_setting($sn)) {
	$hero_image = $PAGE->theme->setting_file_url($sn, $sn);
}

$authsequence = get_enabled_auth_plugins(true);
$authsequence[2] = "email";

foreach ($authsequence as $authname) {
	$authplugin = get_auth_plugin($authname);
	$authplugin->loginpage_hook();
}

$SESSION->wantsurl = $CFG->wwwroot . '/certificate';
$login_form = new \core_auth\output\login($authsequence, $authsequence[0] != 'shibboleth' ? get_moodle_cookie() : '');

$context['hero_features'] = $hero_features;
$context['hero_image'] = $hero_image;
$context['contributors'] = $contributors;
$context['login_form'] = $OUTPUT->render($login_form);
$context['show_login_form'] = !(isloggedin() && !isguestuser());

echo $OUTPUT->render_from_template('theme_hsfk/home', $context);
