<?php
// Get the HTML for the settings bits.
$html = theme_hsfk_get_html_for_settings($OUTPUT, $PAGE);

$regionbsid = 'region-bs-main-and-pre';
$courserenderer = $PAGE->get_renderer('core', 'course');

$context = theme_hsfk_get_context();
echo $OUTPUT->render_from_template('theme_hsfk/course', $context);
