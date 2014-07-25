<?php

include $_SERVER['DOCUMENT_ROOT'].'/../myfolder/rb.php';
include $_SERVER['DOCUMENT_ROOT'].'/../myfolder/init.php';

if (count($_POST)) {
    if ($_POST['email'] == 'ivan820819@qq.com' && $_POST['password'] == '123456') {
        $_SESSION['username'] = 'admin';
    }
}

$content = '';
if (isset($_GET['func'])) {
    if ($_GET['func'] == 'logout') {
        $_SESSION['username'] = '';
    } else {
        $content = $_GET['func'];
    }
}

if ($_SESSION['username'] != 'admin') {
    header('location: /');
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
            <li><a href="/admin/index.php?func=logout">Logout</a></li>
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
            <li<?php if ($content == 'syssetting') {echo ' class="active"';} ?>><a href="/admin/index.php?func=syssetting">帮手系统设定</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li<?php if ($content == 'helpsetting') {echo ' class="active"';} ?>><a href="/admin/index.php?func=helpsetting">帮手列表设定</a></li>
            <li<?php if ($content == 'gamesetting') {echo ' class="active"';} ?>><a href="/admin/index.php?func=gamesetting">游戏列表设定</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li<?php if ($content == 'delivsetting') {echo ' class="active"';} ?>><a href="/admin/index.php?func=delivsetting">快递设定</a></li>
          </ul>
           <ul class="nav nav-sidebar">
            <li<?php if ($content == 'lottsetting') {echo ' class="active"';} ?>><a href="/admin/index.php?func=lottsetting">彩种设定</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="javascript:;">待定功能</a></li>
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
