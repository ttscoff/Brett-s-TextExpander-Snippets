<?php
  $group = (isset($_REQUEST['group'])) ? $_REQUEST['group'] : '';
  $prefix = (isset($_REQUEST['prefix'])) ? $_REQUEST['prefix'] : ',,';
?>
<!DOCTYPE html>  

<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Create TextExpander Group download URL</title>
  <meta name="description" content="Use this page to create a custom download URL for a TextExpander group">
  <meta name="author" content="Brett Terpstra">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">

  <link rel="stylesheet" href="css/style.css?v=2">
  <link rel="stylesheet" href="css/formalize.css" />
  <script src="js/libs/modernizr-1.6.min.js"></script>

</head>

<body>

  <div id="container">
    <header>
      <h1>Create a custom TextExpander URL</h1>
    </header>
    
    <div id="main">
      <form id="prefixform" action="te-download.php" method="get">
        <div>
          <input type="hidden" name="baseurl" value="http://<?php echo $_SERVER['HTTP_HOST']; ?>/share/te-snippets/te-download.php?group=%grp%&prefix=%pre%" id="baseurl">
          <label>Group</label>
          <select name="group" id="group">
            <?php
            foreach (glob("*.tedist") as $filename) {
              $groupname = basename($filename,'.tedist');
              $selected = ($groupname == $group) ? ' selected' : '';
              echo "<option value=\"$groupname\"$selected>$groupname</option>\n";
            } ?>
          </select>
          <label>Prefix</label>
          <input type="text" name="prefix" id="prefix" value="<?php echo $prefix; ?>" />
        </div>
      </form>
      <div id="responsediv">
        <p>
          Your custom url is: <input type="text" id="outputurl">
        </p>
        <p>
          <a id="download" href="#">Download .textexpander file</a>
        </p>
        <p>Select a group and enter your preferred prefix for the shortcuts assigned to each snippet. The resulting url may be downloaded as a custom .textexpander file, or used with TextExpander's "Install from URL" feature. Using the latter will provide automatic updates if the group is added to or changed, custom prefixes are preserved.</p>
      </div>
    </div>
    <div id="preview">
      
    </div>
    <footer>
      <p>
        &copy;2011 Brett Terpstra. All rights reserved.
      </p>
    </footer>
  </div> <!-- end of #container -->


  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.js"></script>
  <script>!window.jQuery && document.write(unescape('%3Cscript src="js/libs/jquery-1.4.2.js"%3E%3C/script%3E'))</script>
  <script src="js/mylibs/jquery.formalize.min.js"></script>
  <!-- scripts concatenated and minified via ant build script-->
  <!-- <script src="js/plugins.js"></script> -->
  <script src="js/script.js"></script>
  <!-- end concatenated and minified scripts-->
  
  
  <!--[if lt IE 7 ]>
    <script src="js/libs/dd_belatedpng.js"></script>
    <script> DD_belatedPNG.fix('img, .png_bg'); </script>
  <![endif]-->
  <?php $dev = preg_match("/\.dev/",$_SERVER['SERVER_NAME']) ? true : false; ?>

  <?php if (!$dev) { ?>
  <!-- change the UA-XXXXX-X to be your site's ID -->
  <script>
   var _gaq = [['_setAccount', 'UA-19894778-1'], ['_trackPageview']];
   (function(d, t) {
    var g = d.createElement(t),
        s = d.getElementsByTagName(t)[0];
    g.async = true;
    g.src = ('https:' == location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g, s);
   })(document, 'script');
  </script>
  <?php } ?>
</body>
</html>