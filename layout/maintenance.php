<?php
// Get the HTML for the settings bits.
$html = theme_hsfk_get_html_for_settings($OUTPUT, $PAGE);

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>

<head>
  <title><?php echo $OUTPUT->page_title(); ?></title>
  <link rel="shortcut icon" href="<?php echo $OUTPUT->favicon(); ?>" />
  <?php echo $OUTPUT->standard_head_html() ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body <?php echo $OUTPUT->body_attributes(); ?>>

  <?php echo $OUTPUT->standard_top_of_body_html() ?>

  <div id="page" class="container-fluid">

    <header id="page-header" class="clearfix">
      <?php echo $html->heading; ?>
    </header>

    <div id="page-content" class="row-fluid">
      <section id="region-main" class="span12">
        <?php echo $OUTPUT->main_content(); ?>
      </section>
    </div>
  </div>

  <?php // require_once(dirname(__FILE__) . '/includes/footer.php');
  ?>

</body>

</html>