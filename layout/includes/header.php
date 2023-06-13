<?php
$surl = new moodle_url('/course/search.php');
?>
<header id="header">

  <?php if(is_siteadmin()): ?>
	<div class="header-top">
  	<div class="container">
   <?php //if($CFG->branch > "27"): ?>
   <?=$OUTPUT->user_menu(); ?>
   
      <div class="clearfix"></div>
    </div>
  </div>
<?php endif; ?>
  <div class="header-main">
	  <div class="header-main-content">
    	<div class="container">
      	<div class="row-fluid">
        	<div class="span6">
          	<div id="logo"><a href="<?php echo $CFG->wwwroot;?>"><img src="<?php echo get_logo_url(); ?>" width="183" height="80" alt="Klass"></a></div>
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
      <div class="container">
        <div class="navbar">
          <div class="navbar-inner">    
            <a data-target=".navbar-responsive-collapse" data-toggle="collapse" class="btn btn-navbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </a>
            <a href="<?php echo $CFG->wwwroot;?>" class="brand"><img src="<?php echo get_logo_url('navbar'); ?>" width="40" height="40" alt="Small logo"></a>
            <div class="nav-collapse collapse navbar-responsive-collapse">
              <?php echo str_replace('href="http://lernbar.uni-frankfurt.de/hsfk/','target="_blank" href="http://lernbar.uni-frankfurt.de/hsfk/',$OUTPUT->custom_menu()); ?>
              <ul class="nav pull-right">
                  <li><?php echo $OUTPUT->page_heading_menu(); ?></li>
                  <?php //if (isloggedin() and !isguestuser()) {
					  if (isloggedin()) {
                    echo "<li class=\"navbar-text\"><div class=\"logininfo\">You are logged in as <strong>{$USER->firstname} {$USER->lastname}</strong></div></li><li><a href=\"{$CFG->wwwroot}/login/logout.php?sesskey={$USER->sesskey}\">Logout</a></li>";
                  } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</header>
<!--E.O.Header-->
