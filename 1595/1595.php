<?php
$url_host = 'http://' . $_SERVER['HTTP_HOST'];
$pattern_document_root = addcslashes(realpath($_SERVER['DOCUMENT_ROOT']), '\\');
$pattern_uri = '/' . $pattern_document_root . '(.*)$/';

preg_match_all($pattern_uri, __DIR__, $matches);
$url_path = $url_host . $matches[1][0];
$url_path = str_replace('\\', '/', $url_path);

require_once'lib/scss.inc.php';
use ScssPhp\ScssPhp\Compiler;
$scss = new Compiler();
$str = file_get_contents('sass/1595-styles.scss');
$str = $scss->compile($str);
file_put_contents('css/1595-styles.css', $str);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo $url_path ?>/css/1595-styles.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $url_path ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $url_path ?>/font/all.min.css" rel="stylesheet"/>
    <script src="<?php echo $url_path ?>/js/jquery-3.5.1.min.js"></script>
    <script  src="<?php echo $url_path ?>/js/scripts.js"></script>
    <title>Document</title>
</head>
<body>
   <?php
      include "./1595-content.php";
   ?>
</body>
</html>