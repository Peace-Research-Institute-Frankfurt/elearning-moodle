<?php
// Get the HTML for the settings bits.
$html = theme_hsfk_get_html_for_settings($OUTPUT, $PAGE);

$regionbsid = 'region-bs-main-and-pre';
$courserenderer = $PAGE->get_renderer('core', 'course');

$context = theme_hsfk_get_context();

$secondarynavigation = false;
$overflow = '';

if ($PAGE->has_secondary_navigation()) {
  $tablistnav = $PAGE->has_tablist_secondary_navigation();
  $moremenu = new \core\navigation\output\more_menu($PAGE->secondarynav, 'nav-tabs', true, $tablistnav);
  $secondarynavigation = $moremenu->export_for_template($OUTPUT);
  $overflowdata = $PAGE->secondarynav->get_overflow_menu_data();
  if (!is_null($overflowdata)) {
    $overflow = $overflowdata->export_for_template($OUTPUT);
  }
}

$context["secondarymoremenu"] = $secondarynavigation ?: false;

echo $OUTPUT->render_from_template('theme_hsfk/course', $context);
