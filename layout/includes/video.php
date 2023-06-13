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
 *
 * @package     theme_hsfk
 * @copyright   2015 Nephzat Dev Team,nephzat.com
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

?>
<?php
$feature_1_title    = theme_hsfk_get_setting('main_feature_1_title');
$feature_1_body     = theme_hsfk_get_setting('main_feature_1_body');
$feature_2_title    = theme_hsfk_get_setting('main_feature_2_title');
$feature_2_body     = theme_hsfk_get_setting('main_feature_2_body');
$feature_3_title    = theme_hsfk_get_setting('main_feature_3_title');
$feature_3_body     = theme_hsfk_get_setting('main_feature_3_body');
$feature_4_title    = theme_hsfk_get_setting('main_feature_4_title');
$feature_4_body     = theme_hsfk_get_setting('main_feature_4_body');
?>

<div id="header-video">
  <div class="header-video__media" data-video-URL="learningunits/video.php?vl=trailer&autoplay&sub" data-video-ratio="0.5625"></div>
  <!-- style="background-image: url('theme/hsfk/pix/header.jpg')" -->
  <a class="header-video__close-trigger" id="header-video__close-trigger"><i class="fa fa-times fa-3x" aria-hidden="true"></i></a>

  <div>
    <div class="container" style="height: 100%; position: relative;">
      <div id="header-infobox">
        <h1>
          <small>Welcome to the</small>
          EU Non-Proliferation<br>and Disarmament
          <small>eLearning Course</small>
        </h1>
        <p>
          This course aims to cover all aspects of the EU non-proliferation and disarmament agenda and provide a comprehensive knowledge resource. Both the course and the certification are offered free of charge. Watch the trailer for a quick overview or jump right in!
        </p>
      </div>

      <a class="header-video__play-trigger" id="header-video__play-trigger">
        <i class="fa fa-play" aria-hidden="true"></i>Watch the trailer
      </a>

      <ul id="main-facts">
        <li class="main-fact">
          <h2><?php echo $feature_1_title; ?></h2><?php echo $feature_1_body; ?>
        </li>
        <li class="main-fact">
          <h2><?php echo $feature_2_title; ?></h2><?php echo $feature_2_body; ?>
        </li>
        <li class="main-fact">
          <h2><?php echo $feature_3_title; ?></h2><?php echo $feature_3_body; ?>
        </li>
        <li class="main-fact">
          <h2><?php echo $feature_4_title; ?></h2><?php echo $feature_4_body; ?>
        </li>
      </ul>
    </div>
  </div>
</div>

<?php
//$page->requires->js('/theme/hsfk/javascript/modernizr.js'); 
//$page->requires->js('/theme/hsfk/javascript/script.js'); 
?>
<script src="theme/hsfk/javascript/modernizr.js"></script>
<script src="theme/hsfk/javascript/video.js"></script>

<script>
  $(document).ready(function() {
    var headerVideo = new HeaderVideo({
      element: $('#header-video'),
      media: '.header-video__media',
      playTrigger: '.header-video__play-trigger',
      closeTrigger: '.header-video__close-trigger'
    });
    $('body').on('iframePlaybackFinish', function(e) {
      headerVideo.removeVideo();
    });
  });
</script>

<!--E.O.Slider-->