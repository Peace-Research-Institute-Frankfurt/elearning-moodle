<?php
$footnote = theme_hsfk_get_setting('footnote', 'format_html');

$fburl    = theme_hsfk_get_setting('fburl');
$pinurl   = theme_hsfk_get_setting('pinurl');
$twurl    = theme_hsfk_get_setting('twurl');
$gpurl    = theme_hsfk_get_setting('gpurl');

$address  = theme_hsfk_get_setting('address');
$emailid  = theme_hsfk_get_setting('emailid');
$phoneno  = theme_hsfk_get_setting('phoneno');
$copyright_footer = theme_hsfk_get_setting('copyright_footer');
$info1title = theme_hsfk_get_setting('info1title');
$info1links = theme_hsfk_get_setting('info1links');
$info2title = theme_hsfk_get_setting('info2title');
$info2links = theme_hsfk_get_setting('info2links');


?>
<style>
  #footer ul li span {
    display: block;
    font-size: 0.8em;
    line-height: 1.1;
    margin-top: -0.2em;
    max-width: 20em;
  }
</style>
<footer id="footer">
  <div class="footer-main">
    <div class="container-fluid">
      <div class="row-fluid">

        <?php if ($info1title != '') { ?>
          <div class="span2">
            <div class="foot-links">
              <h5><?php echo $info1title; ?></h5>
              <ul>
                <?php
                $info_settings =  explode("\n", $info1links);

                foreach ($info_settings as $key => $settingval) {
                  $exp_set = explode("|", $settingval);
                  list($ltxt, $lurl) = $exp_set;
                  $ltxt = trim($ltxt);
                  $lurl = trim($lurl);
                  if (empty($ltxt))
                    continue;
                  echo '<li><a href="' . $lurl . '">' . $ltxt . '</a></li>';
                }
                //	$atto_settings = $natto_settings;

                ?>
              </ul>
            </div>
          </div>
        <?php }
        if ($info2title != '') { ?>
          <div class="span4">
            <div class="foot-links">
              <h5><?php echo $info2title; ?></h5>
              <ul>
                <li><a href="http://www.nonproliferation.eu/">
                    EUNPDC
                    <span>Consortium Homepage</span>
                  </a></li>
                <li><a href="http://prif.org">
                    HSFK/PRIF
                    <span>Lead institution homepage
                    </span>
                    <span></span>
                  </a></li>
                <li><a href="http://prif.org">
                    Teaching Resources
                    <span>Materials to facilitate non-proliferation and disarmament education in universities</span>
                  </a></li>
              </ul>
            </div>
          </div>
        <?php } ?>
        <div class="span6">
          <div class="contact-info foot-links">
            <h5>Contact</h5>
            <p><?php echo $address; ?><br>
              <?php if ($phoneno != '') {
                echo $phoneno . "<br>";
              } ?>
              <a class="mail-link" href="mailto:<?php echo $emailid; ?>"><?php echo $emailid; ?></a>
            </p>
          </div>
        </div>
      </div>
      <div class="row-fluid">
        <div class="span2">
          <div class="eu-info">
            <img src="<?= $CFG->wwwroot ?>/theme/hsfk/pix/flag-eu-outline.svg" alt="Flag of the European Union">
          </div>
        </div>
        <div class="span8">
          <div class="eu-info">
            <p>Produced by <a href="http://www.prif.org">PRIF</a> with the financial assistance of the European Union.</p>
            <p>The contents of the Learning Units are the sole responsibility of their respective authors and can under no circumstances be regarded as reflecting the position of the European Union.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-foot">
    <div class="container-fluid">
      <?php if ($copyright_footer) : ?>
        <p><?php echo $copyright_footer; ?></p>
      <?php endif; ?>

    </div>
  </div>

</footer>
<!--E.O.Footer-->


<?php echo $OUTPUT->standard_end_of_body_html() ?>