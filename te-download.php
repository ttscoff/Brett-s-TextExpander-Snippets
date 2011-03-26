<?php
if (isset($_REQUEST['group']) && isset($_REQUEST['prefix'])) {
  $group = $_REQUEST['group'];
  $prefix = $_REQUEST['prefix'];
  $filename = $group.'.tedist';
  $handle = fopen($filename, "r");
  $contents = fread($handle, filesize($filename));
  fclose($handle);
  $output = preg_replace('/\[\[PREFIX\]\]/',preg_replace('/\\\\/','\\\\\\\\',$prefix),$contents);
  header("Pragma: no-cache");
  header("Expires: 0");
  header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
  header("Robots: none");
  header("Content-Type: application/x-binary");
  header("Content-Description: File Transfer");            
  header("Content-Transfer-Encoding: binary");
  header("Content-Disposition: attachment; filename=\"$group.textexpander\";");
  echo $output;
} else {
  header('Content-Type: "text/html; charset=UTF-8"');
	die('Requires both "group" and "prefix" query strings.');
}
?>