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

$numberofslides = theme_hsfk_get_setting('numberofslides');

if ($numberofslides) { ?>

 <div class="header-video">
    <img src="theme/hsfk/pix/video.png"
         class="header-video__media"
         data-video-URL="theme/hsfk/pix/video"
         data-teaser="theme/hsfk/pix/teaser-video"
         data-video-width="560"
         data-video-height="315">
    <a class="header-video__play-trigger" id="header-video__play-trigger">Play video</a>
    <a class="header-video__close-trigger" id="header-video__close-trigger">Close video</a>
  </div>     

<?php 
	//$page->requires->js('/theme/hsfk/javascript/modernizr.js'); 
	//$page->requires->js('/theme/hsfk/javascript/script.js'); 
?>
	<script src="theme/hsfk/javascript/modernizr.js"></script>
	<script src="theme/hsfk/javascript/video.js"></script>

<script>
  $(document).ready(function() {
    $('.header-video').each(function(i, elem) {
        headerVideo = new HeaderVideo({
          element: elem,
          media: '.header-video__media',
          playTrigger: '.header-video__play-trigger',
          closeTrigger: '.header-video__close-trigger'
        });
    });
  });
</script>

<!--E.O.Slider-->    
   
    
<?php } ?>