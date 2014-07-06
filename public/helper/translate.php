<?php

include $_SERVER['DOCUMENT_ROOT'].'/../myfolder/init.php';
include $_SERVER['DOCUMENT_ROOT'].'/../myfolder/function.php';
include $_SERVER['DOCUMENT_ROOT'].'/../myfolder/translate.php';

if (count($_POST)) {
    $translate = getTranslateInfo($_POST['translate_content']);
    $error_code = array(20=>'要翻译的文本过长', 30=>'无法进行有效的翻译', 40=>'不支持的语言类型', 50=>'无效的key', 60=>'无词典结果，仅在获取词典结果生效');
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
          <?php
          if (count($_POST)) {
              if (is_object($translate) && !$translate->{'errorCode'}) {
          ?>
          <table class="table">
              <tbody>
                  <tr>
                      <td>翻译</td>
                      <td><?php echo implode(',', $translate->{'translation'})?></td>
                  </tr>
                  <?php
                  if (isset($translate->{'basic'})) { ?>
                  <tr>
                      <td colspan="2">基本词典</td>
                  </tr>
                  <?php
                  if (isset($translate->{'basic'}->{'uk-phonetic'})) { ?>
                  <tr>
                      <td>英式发音</td>
                      <td><?php echo $translate->{'basic'}->{'uk-phonetic'};?></td>
                  </tr>
                  <?php } ?>
                  <?php
                  if (isset($translate->{'basic'}->{'us-phonetic'})) { ?>
                  <tr>
                      <td>美式发音</td>
                      <td><?php echo $translate->{'basic'}->{'us-phonetic'};?></td>
                  </tr>
                  <?php } ?>
                  <tr>
                      <td>解释</td>
                      <td><?php foreach ($translate->{'basic'}->{'explains'} as $explain) {echo $explain.'<br>';}?></td>
                  </tr>
                  <?php } ?>
                  <?php
                  if (isset($translate->{'web'})) { ?>
                  <tr>
                      <td colspan="2">网络释义</td>
                  </tr>
                  <?php
                            foreach ($translate->{'web'} as $web) { 
                  ?>
                  <tr>
                      <td><?php echo $web->{'key'}?></td>
                      <td><?php echo implode(',', $web->{'value'});?></td>
                  </tr>
                            <?php } }
                  ?>
                  
              </tbody>
</table>
           <?php
          } else {?>
               <hr>
      
       <div class="row">
        <div class="col-md-2">
          <?php if (is_object($translate)) {echo $error_code[$translate->{'errorCode'}];} else {echo '没有查到您要翻译的内容';} ?>
        </div>
      </div>
         <?php  } }
          ?>
          
      </div>
<script type="text/javascript">
    document.getElementById("trans").addEventListener("click", function () {
        var translate_content = document.getElementById("translate_content");
        if (translate_content.value) {
            document.getElementById("translateform").submit();
        } else {
            alert("请填写要翻译的文本！");
        }
    });
    </script>
  </body>
</html>