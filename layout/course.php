<?php
// Get the HTML for the settings bits.
global $CFG, $OUTPUT, $SESSION, $OUTPUT;
$html = theme_hsfk_get_html_for_settings($OUTPUT, $PAGE);

$context = array();

$context = theme_hsfk_get_context();

echo $OUTPUT->render_from_template('theme_hsfk/course', $context);
