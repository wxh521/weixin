<?php

include $_SERVER['DOCUMENT_ROOT'].'/../myfolder/init.php';
include $_SERVER['DOCUMENT_ROOT'].'/../myfolder/function.php';
include $_SERVER['DOCUMENT_ROOT'].'/../myfolder/translate.php';

if (count($_POST)) {
    $translate = getTranslateInfo($_POST['translate_content']);
    
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>实时翻译</title>
    <link href="/front/css/bootstrap.min.css" rel="stylesheet">
    <link href="/front/css/life.css" rel="stylesheet">
  </head>
  <body>
      <div class="container">
          <form role="form" method="post" id="translateform">
  <div class="form-group">
    <label for="delivery_name">翻译文本</label>
    <textarea class="form-control" rows="3" name="translate_content" id="translate_content"></textarea>
  </div>
  <button type="button" class="btn btn-default" id="trans">查询</button>
</form>
          
          
      </div>
<script type="text/javascript">
    document.getElementById("trans").addEventListener("click", function () {
        var delivery_number = document.getElementById("translate_content");
        if (delivery_number.value) {
            document.getElementById("translateform").submit();
        } else {
            alert("请填写要翻译的文本！");
        }
    });
    </script>
  </body>
</html>