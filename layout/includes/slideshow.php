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

$maxslides = 6;
$numberofslides = theme_hsfk_get_setting('numberofslides');
$slides = ceil($numberofslides / $maxslides);

if ($numberofslides) { ?>

<h2>Contributors</h2>
<div class="theme-slider">
  <div id="home-page-carousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
     <?php for($s=0;$s<$slides;$s++): 
					       $cls_txt = ($s=="0")?' class="active"':'';
					?>
     <li data-target="#home-page-carousel" data-slide-to="<?php echo $s; ?>" <?php echo $cls_txt; ?>></li>
					<?php endfor; ?>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

    <?php for($s1=1;$s1<=$slides;$s1++): 
      $cls_txt2 = ($s1=="1")?' active':'';
      $offset = ($s1-1)*$maxslides; 
      //if(($numberofslides-$offset)<$maxslides) { $offset = $maxslides; }
      $temp = $numberofslides - $offset;if($temp > $maxslides) {$temp = $maxslides;}
    ?>

      <div class="item<?php echo $cls_txt2; ?>">
        <div class="carousel-overlay-content">
          <div class="content-wrap">    
            <div class="container-fluid text-center"> 

      <?php for($s2=1;$s2<=$temp;$s2++): 
				$slidecaption = theme_hsfk_get_setting('slide' . ($offset+$s2) . 'caption', true);
				$slidetitle = theme_hsfk_get_setting('slide' . ($offset+$s2) . 'title');
				$slideimg = theme_hsfk_render_slideimg(($offset+$s2),'slide' . ($offset+$s2) . 'image');	
				$slideluname = theme_hsfk_get_setting('slide' . ($offset+$s2) . 'luname');
				$slideluurl = theme_hsfk_get_setting('slide' . ($offset+$s2) . 'luurl');
			 ?>
                
                  <div class="span2">
                  <div class="profilebg" data-img="<?php echo htmlspecialchars ($slideimg); ?>" data-title="<?php echo htmlspecialchars($slidetitle); ?>" data-description="<?php echo htmlspecialchars($slidecaption); ?>" data-luname="<?php echo htmlspecialchars($slideluname); ?>" data-luurl="<?php echo htmlspecialchars($slideluurl); ?>">
                  <div class="profileimg"><img src="<?php echo $slideimg; ?>"></div>
                  <div class="profiledesc">
                  <h3><?php echo $slidetitle; ?></h3>
                  <p><?php echo strlen($slidecaption) > 100 ? substr($slidecaption, 0, 99).'…' : $slidecaption; ?></p>
                  </div>
                  </div>
                  </div>
				  
				  
                

         <?php endfor; ?>
                  </div>
               </div>
            </div>
        </div>  
        <?php endfor; ?>   
    </div>
     
     <?php if($slides > 1) { ?>
      <a class="left carousel-control" href="#home-page-carousel" data-slide="prev"><i class="fa fa-caret-left"></i></a>
      <a class="right carousel-control" href="#home-page-carousel" data-slide="next"><i class="fa fa-caret-right"></i></a> <?php } ?>   
    
  </div>
</div>

<!--E.O.Slider-->    
    
    
<?php } ?>
