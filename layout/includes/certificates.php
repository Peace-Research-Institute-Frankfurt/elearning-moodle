<!-- whoop -->
<h2>Certificates</h2>
<div class="span5" style="margin-left:0;">
  <p class="large">Complete the tests of the first five Learning Units and get the <strong>Basic Certificate</strong>.</p>
  <p class="large">Pass the tests of the first fifteen Learning Units to aquire the <strong>Comprehensive Certificate</strong>.</p>
  <p class="faded">You may work through the Learning Units without creating an account.</p>
  <p class="faded">If you'd like to be issued a certificate for completing the Learning Units, we need you to <a class="link" href="https://nonproliferation-elearning.eu/login/signup.php" >register first</a>.</p>
</div>
<div class="span6 frontpage-login">
  <?php
    if (isloggedin() and !isguestuser()) {
      echo "<p>You are logged in as <strong>{$USER->firstname} {$USER->lastname}</strong> – <a class=\"link\" href=\"/login/logout.php?sesskey={$USER->sesskey}\">Logout</a></p><p><a class=\"button\" href=\"/certificate\">Continue to Certificate Section</a></p>";
    } else {
      $authsequence = get_enabled_auth_plugins(true); // auths, in sequence
      $authsequence[2]="email";

      foreach($authsequence as $authname) {
        $authplugin = get_auth_plugin($authname);
        $authplugin->loginpage_hook();
      }

      global $SESSION;
      $SESSION->wantsurl = $CFG->wwwroot.'/certificate';

      $loginform = new \core_auth\output\login($authsequence, $authsequence[0] != 'shibboleth' ? get_moodle_cookie() : '');
      echo $OUTPUT->render($loginform);
      echo "<div class=\"signuplink\">First time here? <a class=\"link\" href=\"https://nonproliferation-elearning.eu/login/signup.php\" >Create a new account</a></div>";
    }
  ?>
</div>
