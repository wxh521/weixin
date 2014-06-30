<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
          <form role="form">
  <div class="form-group">
    <label for="exampleInputEmail1">快递名称</label>
    <select class="form-control" name="delivery_name">
  <option>1</option>
  <option>2</option>
  <option>3</option>
  <option>4</option>
  <option>5</option>
</select>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">快递单号</label>
    <input type="text" class="form-control" id="delivery_number" name="delivery_number">
  </div>
  <button type="submit" class="btn btn-default">查询</button>
</form>
      </div>

  </body>
</html>


