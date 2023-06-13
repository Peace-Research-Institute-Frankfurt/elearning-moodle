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
  
<div class="theme-slider">
  <div id="home-page-carousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
     <?php for($s=0;$s<$numberofslides;$s++): 
					       $cls_txt = ($s=="0")?' class="active"':'';
					?>
     <li data-target="#home-page-carousel" data-slide-to="<?php echo $s; ?>" <?php echo $cls_txt; ?>></li>
					<?php endfor; ?>
    </ol>
  
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

           <video controls autoplay loop src="http://media.w3.org/2010/05/bunny/movie.ogv">
		   Your user agent does not support the HTML5 Video element.
     <?php for($s1=1;$s1<=$numberofslides;$s1++): 
															$cls_txt2 = ($s1=="1")?' active':'';
															$slidecaption = theme_hsfk_get_setting('slide' . $s1 . 'caption', true);
															$slideurl = theme_hsfk_get_setting('slide' . $s1 . 'url');
															$slideimg = theme_hsfk_render_slideimg($s1,'slide' . $s1 . 'image');
															$slidevideo= theme_hsfk_render_slidevideo ($s1,'slide' . $s1 . 'video');
															
					?>
		
       
		

		<div class="item<?php echo $cls_txt2; ?>" style="background-image: url(<?php echo $slideimg; ?>);">
	

          <div class="carousel-overlay-content">
	
            <div class="content-wrap">
			
			 <h2><?php echo $slidecaption; ?></h2><br>
			   
              <a href="<?php echo $slideurl; ?>" class="read-more"><?php echo get_string('readmore','theme_hsfk'); ?><i class="fa fa-angle-right"></i></a>
         
		   </div>
				 
          </div>
	
      </div>
 
      <?php endfor; ?>
	 
     
    </div>
   
      <a class="left carousel-control" href="#home-page-carousel" data-slide="prev"><i class="fa fa-caret-left"></i></a>
      <a class="right carousel-control" href="#home-page-carousel" data-slide="next"><i class="fa fa-caret-right"></i></a>    
      
  </div>
   
</div>
<video>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
     

<!--E.O.Slider-->    
    
    
    
<?php } ?>