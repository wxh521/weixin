<?php
header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>功能列表</title>
    <link href="/front/css/bootstrap.min.css" rel="stylesheet">
    <link href="/front/css/life.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="/front/js/html5shiv.js"></script>
      <script src="/front/js/respond.min.js"></script>
    <![endif]-->
    <script src="/front/js/jquery.min.js"></script>
    <script src="/front/js/bootstrap.min.js"></script>
  </head>
  <body>
      <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="http://zbfirst.com">生活好帮手</a>
        </div>
        <div class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" role="form">
            <div class="form-group">
              <input name="email" type="text" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
                <input name="password" type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </div>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>欢迎</h1>
        <div class="row">
        <div class="col-md-6"><p>欢迎来到生活好帮手，这里有最新最全的生活常识与生活助手，您可用微信扫描来关注我们。</p></div>
        <div class="col-md-4"><p><img width="200" height="200" src="/front/image/life_helper_weixin.jpg" title="扫描关注生活好帮手" style="border:none;"></p></div>
        </div>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>帮手列表</h2>
          <p>各种生活帮手助你轻松掌握生活动态</p>
          <p><a class="btn btn-default" href="/list.php" role="button">查看细节 &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>小游戏</h2>
          <p>休闲小游戏让你放松一下 </p>
          <p><a class="btn btn-default" href="#" role="button">查看细节 &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2>帮手社区</h2>
          <p>进入社区解答你的疑问</p>
          <p><a class="btn btn-default" href="#" role="button">查看细节 &raquo;</a></p>
        </div>
      </div>

      <hr>

      <footer>
        <p>&copy; 2014 Design by ivan.</p>
      </footer>
    </div>
      
  </body>
</html>