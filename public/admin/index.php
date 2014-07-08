<?php

include $_SERVER['DOCUMENT_ROOT'].'/../myfolder/init.php';
include $_SERVER['DOCUMENT_ROOT'].'/../myfolder/function.php';

$content = '';
if (isset($_GET['func'])) {
    $content = $_GET['func'];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>管理帮手</title>
    <link href="/front/css/bootstrap.min.css" rel="stylesheet">
    <link href="/front/css/dashboard.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/front/js/ie10-viewport-bug-workaround.js"></script>
    <!--[if lt IE 9]>
      <script src="/front/js/html5shiv.js"></script>
      <script src="/front/js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="/admin">生活好帮手</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/">Logout</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li<?php if ($content == 'helpsetting') {echo ' class="active"';} ?>><a href="/admin/index.php?func=helpsetting">帮手列表设定</a></li>
            <li><a href="#">Reports</a></li>
            <li><a href="#">Analytics</a></li>
            <li><a href="#">Export</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item</a></li>
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
            <li><a href="">More navigation</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <?php 
          $includefile = $content.'.php';
          if (file_exists($includefile)) {include $includefile;} else {echo '<h1>欢迎来到帮手管理页面</h1>';} ?>
        </div>
      </div>
    </div>

    <script src="/front/js/jquery.min.js"></script>
    <script src="/front/js/bootstrap.min.js"></script>
    <script src="/front/js/docs.min.js"></script>
  </body>
</html>
