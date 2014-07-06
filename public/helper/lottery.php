<?php

include $_SERVER['DOCUMENT_ROOT'].'/../myfolder/init.php';
include $_SERVER['DOCUMENT_ROOT'].'/../myfolder/function.php';
include $_SERVER['DOCUMENT_ROOT'].'/../myfolder/lottery.php';

if (count($_POST)) {
    $lottery_name = $_POST['lottery_name'];
    $lottery_info = getLotteryInfo($lottery_name);
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>彩票查询</title>
    <link href="/front/css/bootstrap.min.css" rel="stylesheet">
    <link href="/front/css/life.css" rel="stylesheet">
  </head>
  <body>
      <div class="container">
          <form role="form" method="post" id="lotteryform">
  <div class="form-group">
    <label for="delivery_name">彩票名称</label>
    <select class="form-control" name="lottery_name" id="lottery_name">
        <option value="dlt">超级大乐透</option>
        <option value="fc3d">3D</option>
        <option value="pl3">排列3</option>
        <option value="pl5">排列5</option>
        <option value="qlc">七乐彩</option>
        <option value="qxc">七星彩</option>
        <option value="ssq">双色球</option>
        <option value="zcbqc">六场半全场</option>
        <option value="zcjqc">四场进球彩</option>
        <option value="zcsfc">足彩胜负彩(任九)</option>
</select>
  </div>
  <button type="button" class="btn btn-default" id="query">查询</button>
</form>
          
          <?php
          if (count($_POST)) {
              if (count($lottery_info->{'data'})) {
          ?>
          <table class="table">
              <thead>
              <th>期数</th>
              <th>开奖结果</th>
              <th>开奖时间</th>
              </thead>
              <tbody>
                  <?php
                            foreach ($lottery_info->{'data'} as $data) { 
                  ?>
                  <tr>
                      <td><?php echo $data->{'expect'}?></td>
                      <td><?php echo $data->{'opencode'}?></td>
                      <td><?php echo $data->{'opentime'}?></td>
                  </tr>
                            <?php }
                  ?>
                  
              </tbody>
</table>
           <?php
          } else {?>
               <hr>
      
       <div class="row">
        <div class="col-md-2">
          没有查到彩票信息。
        </div>
      </div>
         <?php  } }
          ?>
      </div>
<script type="text/javascript">
    document.getElementById("query").addEventListener("click", function () {
        document.getElementById("lotteryform").submit();
    });
    </script>
  </body>
</html>