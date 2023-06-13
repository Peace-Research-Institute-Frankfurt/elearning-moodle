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
 * @copyright 2015 Nephzat Dev Team,nephzat.com
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// Get the HTML for the settings bits.
$html = theme_hsfk_get_html_for_settings($OUTPUT, $PAGE);

if (right_to_left()) {
  $regionbsid = 'region-bs-main-and-post';
} else {
  $regionbsid = 'region-bs-main-and-pre';
}

$PAGE->requires->js('/theme/hsfk/javascript/bootstrap-carousel.js');
$PAGE->requires->js('/theme/hsfk/javascript/bootstrap-transition.js');
$PAGE->requires->js('/theme/hsfk/javascript/custom.js');
$courserenderer = $PAGE->get_renderer('core', 'course');

echo $OUTPUT->doctype()
?>

<html <?php echo $OUTPUT->htmlattributes(); ?>>
<head>
  <title><?php echo $OUTPUT->page_title(); ?></title>
  <link rel="shortcut icon" href="<?php echo $OUTPUT->favicon(); ?>" />
  <?php echo $OUTPUT->standard_head_html() ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
  <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>

  <script src="//cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js"></script>
</head>

<body <?php echo $OUTPUT->body_attributes(); ?>>

  <?php echo $OUTPUT->standard_top_of_body_html() ?>

  <div id="wrapper">

    <?php require_once(dirname(__FILE__) . '/includes/header.php'); ?>

    <!-- Custom frontpage video -->
    <div class="container-fluid">
      <?php require_once(dirname(__FILE__) . '/includes/video.php'); ?>
    </div>

    <!--Custom theme Who We Are block-->
    <div id="page" >
      <div id="page-content" class="container">
        <div id="<?php echo $regionbsid ?>">
          <?php
            echo $courserenderer->new_courses();
            echo $OUTPUT->course_content_header();
            echo $OUTPUT->main_content();
            echo $OUTPUT->course_content_footer();
          ?>
        </div>
      </div>

      <!-- Certificates -->
      <div class="jumbotron section-certificates">
        <div class="container">
          <?php require_once(dirname(__FILE__) . '/includes/certificates.php'); ?>
        </div>
      </div>

      <!-- Slideshow -->
      <?php if (theme_hsfk_get_setting('toggleslideshow') == 1) { ?>
        <div class="jumbotron section-contributors">
          <div class="container">
            <?php require_once(dirname(__FILE__) . '/includes/slideshow.php'); ?>
          </div>
        </div>
      <?php } ?>

      <div class="container-fluid">
        <?php echo $OUTPUT->blocks('side-pre', 'span4'); ?>
      </div>
    </div>

    <?php require_once(dirname(__FILE__) . '/includes/footer.php'); ?>
    
  </div><!-- end #wrapper -->
  
  <?php require_once(dirname(__FILE__) . '/includes/popup.php'); ?>

</body>
</html>
