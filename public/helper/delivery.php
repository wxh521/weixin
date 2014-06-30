<?php
include $_SERVER['DOCUMENT_ROOT'].'/../myfolder/init.php';
include $_SERVER['DOCUMENT_ROOT'].'/../myfolder/function.php';
include $_SERVER['DOCUMENT_ROOT'].'/../myfolder/delivery.php';

if (count($_POST)) {
    $delivery_number = $_POST['delivery_number'];
    $delivery_name = $_POST['delivery_name'];
    $delivery_info = getDeliveryInfo($delivery_name, $delivery_number);
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>快递查询</title>
    <link href="/front/css/bootstrap.min.css" rel="stylesheet">
    <link href="/front/css/life.css" rel="stylesheet">
  </head>
  <body>
      <div class="container">
          <form role="form" method="post" id="deliveryform">
  <div class="form-group">
    <label for="delivery_name">快递名称</label>
    <select class="form-control" name="delivery_name" id="delivery_name">
        <option value="jingdong">京东快递</option>
        <option value="dhl">DHL快递</option>
        <option value="ems">EMS快递</option>
        <option value="ups">UPS国际快递</option>
        <option value="debang">德邦物流</option>
        <option value="huitong">汇通快递</option>
        <option value="rufengda">如风达快递</option>
        <option value="shentong">申通快递</option>
        <option value="shunfeng">顺丰快递</option>
        <option value="tiantian">天天快递</option>
        <option value="xindan">新蛋物流</option>
        <option value="yuantong">圆通快递</option>
        <option value="yunda">韵达快递</option>
        <option value="zhongtong">中通快递</option>
        <option value="zjs">宅急送快递</option>
</select>
  </div>
  <div class="form-group">
    <label for="delivery_number">快递单号</label>
    <input type="text" class="form-control" id="delivery_number" name="delivery_number">
  </div>
  <button type="button" class="btn btn-default" id="query">查询</button>
</form>
          
          <?php
          if (count($_POST)) {
              if (count($delivery_info)) {
          ?>
          <table class="table">
              <thead>
              <th>时间</th>
              <th>状态</th>
              </thead>
              <tbody>
                  <?php
                            foreach ($delivery_info as $data) { 
                  ?>
                  <tr>
                      <td><?php echo $data->{'time'}?></td>
                      <td><?php echo $data->{'content'}?></td>
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
          没有查到您的快递信息。
        </div>
      </div>
         <?php  } }
          ?>
      </div>
<script type="text/javascript">
    document.getElementById("query").addEventListener("click", function () {
        var delivery_number = document.getElementById("delivery_number");
        if (delivery_number.value) {
            document.getElementById("deliveryform").submit();
        } else {
            alert("请填写快递单号！");
        }
    });
    </script>
  </body>
</html>