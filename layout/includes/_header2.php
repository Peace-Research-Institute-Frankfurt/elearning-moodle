<?php
$surl = new moodle_url('/course/search.php');
?>
<header id="header">

	<?php if(is_siteadmin()): ?>
	<div class="header-top">
  	<div class="container-fluid">
   <?php if($CFG->branch > "27"): ?>
			    <?php echo $OUTPUT->user_menu(); ?>
   <?php endif; ?> 
      <div class="clearfix"></div>
    </div>
	<?php endif; ?>
  </div>
  <div class="header-main">
	  <div class="header-main-content">
    	<div class="container-fluid">
      	<div class="row-fluid">
        	<div class="span6">
          	<div id="logo"><a href="<?php echo $CFG->wwwroot;?>"><img src="<?php echo get_logo_url(); ?>" width="183" height="80" alt="hsfk"></a></div>
          </div>
           <?php if(! $PAGE->url->compare($surl, URL_MATCH_BASE)): ?>
        	<div class="span6">
          	<div class="top-search">
           <form action="<?php echo new moodle_url('/course/search.php'); ?>" method="get">
              <input type="text" placeholder="<?php echo get_string('searchcourses'); ?>" name="search" value="">
              <input type="submit" value="Search">
           </form>    
            </div>
            <div class="clearfix"></div>
          </div>
           <?php endif; ?>  
        </div>
      </div>
    </div>
    <div class="header-main-menubar">
      <div class="navbar">
        <div class="navbar-inner">
          <div class="container">
            <a data-target=".navbar-responsive-collapse" data-toggle="collapse" class="btn btn-navbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </a>
            <a href="#" class="brand" style="display: none;">Title</a>
            <p class="navbar-text"><a href="<?php echo $CFG->wwwroot;?>"><i class="fa fa-home" title="Home"></i>Home</a></p>
            <div id="Menu" class="nav-collapse collapse navbar-responsive-collapse">
              <p id="Home" class="navbar-text" class="dropdown-toggle" title="Home"><a id="Home" href="http://localhost/moodle/"><i class="fa fa-home" title="Home"></i>Home</a></p>
              <ul id="dropdown-menu" class="nav"><li class="dropdown"><a href="http://localhost/moodle/"class="dropdown-toggle" data-toggle="dropdown" title="Learning Units">Learning Units<b class="caret"></b></a><ul class="dropdown-menu">
			  <li><a title="LU 1" href="http://lernbar.uni-frankfurt.de/courses/2104/1643/index.html?id=0e8647bd284964e5831b267976b3338bc746a8" target="_blank">LU 1:</a></li>
			  <li><a title="LU 2: Chemical Weapons" href="http://lernbar.uni-frankfurt.de/courses/2104/1625/index.html?id=0e8645bf284964e5831b267976b3338bc746a8" target="_blank">LU 2: Chemical Weapons</a></li>
			  <li><a title="LU 3: Biological Weapons" href="http://lernbar.uni-frankfurt.de/courses/2104/1627/index.html?id=0e8645b9284964e5831b267976b3338bc746a8" target="_blank">LU 3: Biological Weapons</a></li>
			  <li><a title="LU 4" href="http://localhost/moodle/course/view.php?id=5"target="_blank">LU 4</a></li>
			  <li><a title="LU 5" href="http://localhost/moodle/course/view.php?id=6"target="_blank">LU 5:</a></li>
			  <li><a title="LU 6" href="http://localhost/moodle/course/view.php?id=7"target="_blank">LU 6:</a></li>
			  <li><a title="LU 7: WMD Terrorism" href="http://lernbar.uni-frankfurt.de/courses/2104/1622/index.html?id=0e8645bc284964e5831b267976b3338bc746a8"target="_blank">LU 7: WMD Terrorism</a></li>
			  <li><a title="LU 8" href="http://localhost/moodle/course/view.php?id=9"target="_blank">LU 8</a></li>
			  <li><a title="LU 9" href="http://localhost/moodle/course/view.php?id=10"target="_blank">LU 9:</a></li>
			  <li><a title="LU 10" href="http://localhost/moodle/course/view.php?id=11"target="_blank">LU 10:</a></li>
			  <li><a title="LU 11" href="http://localhost/moodle/course/view.php?id=12"target="_blank">LU 11:</a></li>
			  <li><a title="LU 12" href="http://localhost/moodle/course/view.php?id=13"target="_blank">LU 12:</a></li>
			  <li><a title="LU 13: Compliance &amp; Enforcement" href="http://localhost/moodle/course/view.php?id=14"target="_blank">LU 13: Compliance &amp; Enforcement</a></li>
			  <li><a title="LU 14" href="http://localhost/moodle/course/view.php?id=15"target="_blank">LU 14</a></li>
			  <li><a title="LU 15: Emerging Technologies" href="http://localhost/moodle/course/view.php?id=16"target="_blank">LU 15: Emerging Technologies</a></li></ul></li>
			  
			  <li class="divider">&nbsp;</li><li id="yui_3_17_2_2_1473172879787_13"><a id="yui_3_17_2_2_1473172879787_12" title="Certificate Section" href="https://nonproliferation-elearning.eu/course/view.php?id=7">Certificate Section</a></li><li><a title="About" href="https://nonproliferation-elearning.eu/mod/page/view.php?id=18">About</a></li></ul>              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
      

</header>


          
		 
       
<!--E.O.Header-->
