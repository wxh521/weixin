<?php
include '../init.php';

if (count($_POST)) {
    $delivery_number = $_POST['delivery_number'];
    $delivery_name = $_POST['delivery_name'];
    $delivery_info = array();
    if ($delivery_name == 'shunfeng') {
        $delivery_url = 'http://www.sf-express.com/sf-service-web/service/bills/'.$delivery_number.'/routes?app=bill&lang=sc&region=cn';
        $output = getPage($delivery_url);
        $result_data =  json_decode($output);
        $data_array= $result_data[0]->{'routes'};
        foreach ($data_array as  $key =>$data) { 
            $delivery_info[$key]['time'] = $data->{'scanDateTime'};
            $delivery_info[$key]['content'] =  $data->{'remark'};
        }
    } else {
        $postdata = array('id'=>$delivery_name, 'order'=>$delivery_number);
        $output = getPage('http://www.aikuaidi.cn/query', 'post', $postdata);
        $result_data =  json_decode($output);
        $delivery_info = $result_data->{'data'};
        if (!count($delivery_info)) {
            $aikuaidi_key = '2e848e76b56940168a7bc735ac771c35';
            $aikuaidi_url = 'http://www.aikuaidi.cn/rest/?key='.$aikuaidi_key.'&order='.$delivery_number.'&id='.$delivery_name.'&ord=desc';
            $output = getPage($aikuaidi_url);
            $result_data =  json_decode($output);
            $delivery_info = $result_data->{'data'};
        }
    }
   
    
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
          <form role="form" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">快递名称</label>
    <select class="form-control" name="delivery_name">
        <option value="jingdong">京东快递</option>
        <option value="debang">德邦物流</option>
        <option value="dtwl">大田物流</option>
        <option value="ems">EMS快递</option>
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
    <label for="exampleInputPassword1">快递单号</label>
    <input type="text" class="form-control" id="delivery_number" name="delivery_number">
  </div>
  <button type="submit" class="btn btn-default">查询</button>
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
                            foreach ($delivery_info as  $data) { 
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
          没有查到您的订单信息。
        </div>
      </div>
         <?php  } }
          ?>
      </div>

  </body>
</html>