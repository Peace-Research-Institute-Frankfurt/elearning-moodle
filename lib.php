<?php

/**
 * @package   theme_hsfk
 * @copyright 2023 PRIF
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

function append_additionalhtmlhead()
{
  global $CFG;

  $additionalhtmlhead = $CFG->additionalhtmlhead . "\n";

  // Add Matomo Analytics
  $matomo = '<!-- Matomo -->
<script type="text/javascript">
  var _paq = _paq || [];
  _paq.push([\'requireConsent\']);
  _paq.push([\'trackPageView\']);
  _paq.push([\'enableLinkTracking\']);
  (function() {
    var u="https://analytics.nonproliferation-elearning.eu/";
    _paq.push([\'setTrackerUrl\', u+\'piwik.php\']);
    _paq.push([\'setSiteId\', \'1\']);
    var d=document, g=d.createElement(\'script\'), s=d.getElementsByTagName(\'script\')[0];
    g.type=\'text/javascript\'; g.async=true; g.defer=true; g.src=u+\'piwik.js\'; s.parentNode.insertBefore(g,s);
  })();
</script>
<!-- End Matomo Code -->' . "\n";

  $additionalhtmlhead .= $matomo;
  $CFG->additionalhtmlhead = $additionalhtmlhead;
}


/**
 * Load the our theme js file
 *
 */
function theme_hsfk_page_init(moodle_page $page)
{
  if (!is_siteadmin()) append_additionalhtmlhead();
}

/**
 * Loads the CSS Styles and replace the background images.
 * If background image not available in the settings take the default images.
 *
 * @param $css
 * @param $theme
 * @return string
 */

function theme_hsfk_process_css($css, $theme)
{

  // Set the background image for the logo.
  $logo = $theme->setting_file_url('logo', 'logo');
  $css = theme_hsfk_set_logo($css, $logo);

  // Set custom CSS.
  if (!empty($theme->settings->customcss)) {
    $customcss = $theme->settings->customcss;
  } else {
    $customcss = null;
  }
  $css = theme_hsfk_set_customcss($css, $customcss);
  $css = theme_hsfk_set_fontwww($css);

  return $css;
}

/**
 * Adds the logo to CSS.
 *
 * @param string $css The CSS.
 * @param string $logo The URL of the logo.
 * @return string The parsed CSS
 */
function theme_hsfk_set_logo($css, $logo)
{
  $tag = '[[setting:logo]]';
  $replacement = $logo;
  if (is_null($replacement)) {
    $replacement = '';
  }

  $css = str_replace($tag, $replacement, $css);

  return $css;
}

/**
 * Serves any files associated with the theme settings.
 *
 * @param stdClass $course
 * @param stdClass $cm
 * @param context $context
 * @param string $filearea
 * @param array $args
 * @param bool $forcedownload
 * @param array $options
 * @return bool
 */
function theme_hsfk_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload, array $options = array())
{
  static $theme;

  if (empty($theme)) {
    $theme = theme_config::load('hsfk');
  }
  if ($context->contextlevel == CONTEXT_SYSTEM) {
    if ($filearea === 'logo') {
      return $theme->setting_file_serve('logo', $args, $forcedownload, $options);
    } else if ($filearea === 'footerlogo') {
      return $theme->setting_file_serve('footerlogo', $args, $forcedownload, $options);
    } else if ($filearea === 'style') {
      theme_hsfk_serve_css($args[1]);
    } else if ($filearea === 'pagebackground') {
      return $theme->setting_file_serve('pagebackground', $args, $forcedownload, $options);
    } else if (preg_match("/slide[1-9][0-9]*image/", $filearea) !== false) {
      return $theme->setting_file_serve($filearea, $args, $forcedownload, $options);
    } else {
      send_file_not_found();
    }
  } else {
    send_file_not_found();
  }
}

/**
 * Serves CSS for image file updated to styles.
 *
 * @param string $filename
 * @return string
 */
function theme_hsfk_serve_css($filename)
{
  global $CFG;
  if (!empty($CFG->themedir)) {
    $thestylepath = $CFG->themedir . '/hsfk/style/';
  } else {
    $thestylepath = $CFG->dirroot . '/theme/hsfk/style/';
  }
  $thesheet = $thestylepath . $filename;


  $etagfile = md5_file($thesheet);
  $lastmodified = filemtime($thesheet);
  $ifmodifiedsince = (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) ? $_SERVER['HTTP_IF_MODIFIED_SINCE'] : false);
  $etagheader = (isset($_SERVER['HTTP_IF_NONE_MATCH']) ? trim($_SERVER['HTTP_IF_NONE_MATCH']) : false);

  if ((($ifmodifiedsince) && (strtotime($ifmodifiedsince) == $lastmodified)) || $etagheader == $etagfile) {
    theme_hsfk_send_unmodified($lastmodified, $etagfile);
  }
  theme_hsfk_send_cached_css($thestylepath, $filename, $lastmodified, $etagfile);
}

// Set browser cache used in php header
function theme_hsfk_send_unmodified($lastmodified, $etag)
{
  $lifetime = 60 * 60 * 24 * 60;
  header('HTTP/1.1 304 Not Modified');
  header('Expires: ' . gmdate('D, d M Y H:i:s', time() + $lifetime) . ' GMT');
  header('Cache-Control: public, max-age=' . $lifetime);
  header('Content-Type: text/css; charset=utf-8');
  header('Etag: "' . $etag . '"');
  if ($lastmodified) {
    header('Last-Modified: ' . gmdate('D, d M Y H:i:s', $lastmodified) . ' GMT');
  }
  die;
}

// // Cache CSS
// function theme_hsfk_send_cached_css($path, $filename, $lastmodified, $etag)
// {
// 	global $CFG;
// 	require_once($CFG->dirroot . '/lib/configonlylib.php'); // For min_enable_zlib_compression().
// 	// 60 days only - the revision may get incremented quite often.
// 	$lifetime = 60 * 60 * 24 * 60;

// 	header('Etag: "' . $etag . '"');
// 	header('Content-Disposition: inline; filename="' . $filename . '"');
// 	header('Last-Modified: ' . gmdate('D, d M Y H:i:s', $lastmodified) . ' GMT');
// 	header('Expires: ' . gmdate('D, d M Y H:i:s', time() + $lifetime) . ' GMT');
// 	header('Pragma: ');
// 	header('Cache-Control: public, max-age=' . $lifetime);
// 	header('Accept-Ranges: none');
// 	header('Content-Type: text/css; charset=utf-8');
// 	if (!min_enable_zlib_compression()) {
// 		header('Content-Length: ' . filesize($path . $filename));
// 	}

// 	readfile($path . $filename);
// 	die;
// }


/**
 * Adds any custom CSS to the CSS before it is cached.
 *
 * @param string $css The original CSS.
 * @param string $customcss The custom CSS to add.
 * @return string The CSS which now contains our custom CSS.
 */
function theme_hsfk_set_customcss($css, $customcss)
{
  $tag = '[[setting:customcss]]';
  $replacement = $customcss;
  if (is_null($replacement)) {
    $replacement = '';
  }

  $css = str_replace($tag, $replacement, $css);

  return $css;
}

/**
 * Returns an object containing HTML for the areas affected by settings.
 *
 * Do not add Clean specific logic in here, child themes should be able to
 * rely on that function just by declaring settings with similar names.
 *
 * @param renderer_base $output Pass in $OUTPUT.
 * @param moodle_page $page Pass in $PAGE.
 * @return stdClass An object with the following properties:
 *      - navbarclass A CSS class to use on the navbar. By default ''.
 *      - heading HTML to use for the heading. A logo if one is selected or the default heading.
 *      - footnote HTML to use as a footnote. By default ''.
 */
function theme_hsfk_get_html_for_settings(renderer_base $output, moodle_page $page)
{
  global $CFG;
  $return = new stdClass;

  $return->navbarclass = '';
  if (!empty($page->theme->settings->invert)) {
    $return->navbarclass .= ' navbar-inverse';
  }

  if (!empty($page->theme->settings->logo)) {
    $return->heading = html_writer::link($CFG->wwwroot, '', array('title' => get_string('home'), 'class' => 'logo'));
  } else {
    $return->heading = $output->page_heading();
  }

  $return->footnote = '';
  if (!empty($page->theme->settings->footnote)) {
    $return->footnote = '<div class="footnote text-center">' . format_text($page->theme->settings->footnote) . '</div>';
  }

  return $return;
}

/**
 * Loads the CSS files and injects the font path
 *
 * @param $css
 * @return string
 */
function theme_hsfk_set_fontwww($css)
{
  global $CFG, $PAGE;
  if (empty($CFG->themewww)) {
    $themewww = $CFG->wwwroot . "/theme";
  } else {
    $themewww = $CFG->themewww;
  }

  $tag = '[[setting:fontwww]]';

  $theme = theme_config::load('hsfk');

  $css = str_replace($tag, $themewww . '/hsfk/fonts/', $css);

  return $css;
}

/**
 * Logo Image URL Fetch from theme settings
 *
 * @return string
 */


if (!function_exists('get_logo_url')) {
  function get_logo_url($type = 'header')
  {
    global $OUTPUT;
    static $theme;
    if (empty($theme)) {
      $theme = theme_config::load('hsfk');
    }

    if ($type == "header") {
      $logo = $theme->setting_file_url('logo', 'logo');
      $logo = empty($logo) ? $OUTPUT->image_url('home/logo', 'theme') : $logo;
    } else if ($type == "footer") {
      $logo = $theme->setting_file_url('footerlogo', 'footerlogo');
      $logo = empty($logo) ? $OUTPUT->icon_url('home/footerlogo', 'theme') : $logo;
    } else if ($type == "navbar") {
      $logo = $theme->setting_file_url('navbarlogo', 'navbarlogo');
      $logo = empty($logo) ? $OUTPUT->image_url('home/navbarlogo', 'theme') : $logo;
    }

    return $logo;
  }
}


function theme_hsfk_render_slideimg($p, $sliname)
{
  global $PAGE, $OUTPUT;

  $i = $p % 3;
  $slideimage = $OUTPUT->image_url('home/slide' . $i, 'theme');

  // Get slide image or fallback to default
  if (theme_hsfk_get_setting($sliname)) {
    $slideimage = $PAGE->theme->setting_file_url($sliname, $sliname);
  }

  return $slideimage;
}


function theme_hsfk_get_setting($setting, $format = false)
{
  global $CFG;
  require_once($CFG->dirroot . '/lib/weblib.php');
  static $theme;
  if (empty($theme)) {
    $theme = theme_config::load('hsfk');
  }
  if (empty($theme->settings->$setting)) {
    return false;
  } else if (!$format) {
    return $theme->settings->$setting;
  } else if ($format === 'format_text') {
    return format_text($theme->settings->$setting, FORMAT_PLAIN);
  } else if ($format === 'format_html') {
    return format_text($theme->settings->$setting, FORMAT_HTML, array('trusted' => true, 'noclean' => true));
  } else {
    return format_string($theme->settings->$setting);
  }
}

/**
 * Return the current theme url
 *
 * @return string
 */
if (!function_exists('theme_url')) {
  function theme_url()
  {
    global $CFG, $PAGE;
    $theme_url =  $CFG->wwwroot . '/theme/' . $PAGE->theme->name;
    return $theme_url;
  }
}

function theme_hsfk_get_context()
{
  global $CFG, $USER, $OUTPUT, $PAGE, $SITE;

  $renderer = $PAGE->get_renderer('core', 'course');
  $primary = new core\navigation\output\primary($PAGE);
  $primary_menu = $primary->export_for_template($renderer);

  $header = $PAGE->activityheader;
  $header_content = $header->export_for_template($renderer);
  $side_pre_blocks = $OUTPUT->blocks('side-pre');
  $settings_menu = $OUTPUT->region_main_settings_menu();

  $context = array(
    'is_site_admin' => is_siteadmin(),
    "is_logged_in" => isloggedin(),
    "user" => $USER,
    "custom_menu" => $OUTPUT->custom_menu(),
    "logo_url" => get_logo_url(),
    "logo_nav_url" => get_logo_url("navbar"),
    "search_action" => new moodle_url('/course/search.php'),
    "theme_settings" => array(
      'copyright' => theme_hsfk_get_setting('copyright_footer'),
      'address' => theme_hsfk_get_setting('address'),
      'email' => theme_hsfk_get_setting('emailid'),
    ),
    "year" => date("Y"),
    "output" => $OUTPUT,
    "site_name" => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), "escape" => false]),
    "primarymoremenu" => $primary_menu['moremenu'],
    'usermenu' => $primary_menu['user'],
    "config" => $CFG,
    "headercontent" => $header_content,
    "side_pre_blocks" => $side_pre_blocks,
    "settings_menu" => $settings_menu,
  );

  return $context;
}


function theme_hsfk_get_contributors()
{
  $contributors = array();
  $course_helper = new coursecat_helper();
  $course_helper->set_show_courses(core_course_renderer::COURSECAT_SHOW_COURSES_EXPANDED)->set_courses_display_options(array(
    'recursive' => true,
  ));

  $course_ids = array_keys(core_course_category::get(0)->get_courses($course_helper->get_courses_display_options()));
  $courses = array();

  foreach ($course_ids as $course_id) {
    $course = get_course($course_id);
    $custom_fields = theme_hsfk_get_custom_fields($course_id);
    $authors = array();
    if (isset($custom_fields["lu_authors"])) {
      $authors = explode(";", $custom_fields["lu_authors"]);
    }
    $courses[] = array(
      "course" => $course,
      "authors" => $authors
    );
  }

  for ($i = 1; $i <= get_config("theme_hsfk", "contributor_count"); $i++) {

    $contributor = array(
      "name" => theme_hsfk_get_setting('slide' . $i . 'title'),
      "bio" => theme_hsfk_get_setting('slide' . $i . 'caption', true),
      "image" => theme_hsfk_render_slideimg($i, 'slide' . $i . 'image'),
      "in_courses" => array(),
      "id" => "contributor-" . $i
    );

    foreach ($courses as $course) {
      if (array_search($contributor["name"], $course["authors"]) !== false) {
        $contributor["in_courses"][] = $course["course"];
      }
    }

    $contributor["multiple_courses"] = (count($contributor["in_courses"]) > 1);

    if (isset($contributor["name"])) {
      $contributors[] = $contributor;
    }
  }
  return $contributors;
}

function theme_hsfk_get_custom_fields($courseid)
{
  $handler = \core_customfield\handler::get_handler('core_course', 'course');
  $datas = $handler->get_instance_data($courseid);
  $metadata = [];
  foreach ($datas as $data) {
    if (empty($data->get_value())) {
      continue;
    }
    $metadata[$data->get_field()->get('shortname')] = $data->get_value();
  }
  return $metadata;
}
