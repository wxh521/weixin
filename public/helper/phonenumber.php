<?php

include $_SERVER['DOCUMENT_ROOT'].'/../myfolder/init.php';
include $_SERVER['DOCUMENT_ROOT'].'/../myfolder/function.php';
include $_SERVER['DOCUMENT_ROOT'].'/../myfolder/phonenumber.php';

if (count($_POST)) {
    $phone_number = $_POST['phone_number'];
    $phone_info = getPhoneInfo($phone_number);
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>手机号归属地查询</title>
    <link href="/front/css/bootstrap.min.css" rel="stylesheet">
    <link href="/front/css/life.css" rel="stylesheet">
  </head>
  <body>
      <div class="container">
          <form role="form" method="post" id="phoneform">
  <div class="form-group">
    <label for="delivery_number">手机号</label>
    <input type="text" class="form-control" id="phone_number" name="phone_number">
  </div>
  <button type="button" class="btn btn-default" id="query">查询</button>
</form>
          
          <?php
          if (count($_POST)) {
              if ($phone_info) {
                 echo '<br>'.$phone_info;
          } else {?>
               <hr>
      
       <div class="row">
        <div class="col-md-2">
          没有查到您输入的手机号。
        </div>
      </div>
         <?php  } }
          ?>
      </div>
<script type="text/javascript">
    document.getElementById("query").addEventListener("click", function () {
        var phone_number = document.getElementById("phone_number");
        if (phone_number.value) {
            document.getElementById("phoneform").submit();
        } else {
            alert("请填写手机号！");
        }
    });
    </script>
  </body>
</html>