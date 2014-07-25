<?php

//if (count($_POST)) {
//    $helperArray = R::dispense('helper');
//    $helperArray['name'] = $_POST['name'];
//    $helperArray['description'] = $_POST['description'];
//    $helperArray['url'] = $_POST['url'];
//    $helperArray['status'] = $_POST['status'];
//    $id = R::store($helperArray);
//    header('location: /admin/index.php?func=helpsetting');
//}
//
//$helper = R::find('helper');

?>
<h1 class="page-header">添加游戏</h1>

    <div class="row placeholders">
        <div class="col-md-7">
            <form class="form-horizontal" role="form" method="post" action="/admin/index.php?func=helpsetting">
                <div class="form-group">
                  <label for="helpername" class="col-sm-2 control-label">游戏名称</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="helperdesc" class="col-sm-2 control-label">帮手简介</label>
                  <div class="col-sm-10">
                    <textarea id="description" name="description" class="form-control" rows="3"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="helperaddr" class="col-sm-2 control-label">帮手地址</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="url" name="url" placeholder="以/开头，例如/helper/delivery.php">
                  </div>
                </div>
                <div class="form-group">
                  <label for="helperaddr" class="col-sm-2 control-label">帮手状态</label>
                  <div class="col-sm-3">
                    <label class="radio-inline">
                      <input type="radio" name="status" id="status1" value="0"> 停用
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="status" id="status2" value="1" checked> 启用
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">添加</button>
                  </div>
                </div>
              </form>
      </div>
    </div>

    <h2 class="sub-header">帮手列表</h2>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>帮手名称</th>
            <th>帮手简介</th>
            <th>帮手状态</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php
        foreach ($helper as $value) { ?>
          <tr>
            <td><?php echo $value['id']; ?></td>
            <td class="col-sm-1"><a href="<?php echo $value['url']; ?>" target="_blank"><?php echo $value['name']; ?></a></td>
            <td><?php echo $value['description']; ?></td>
            <td class="col-sm-1"><?php if ($value['status']) {echo '启用';} else {echo '停用';} ?></td>
            <td class="col-sm-1">
                <a href="/admin/index.php?func=helpsetting&type=up&id=<?php echo $value['id']; ?>">编辑</a> 
                <a href="/admin/index.php?func=helpsetting&type=del&id=<?php echo $value['id']; ?>">删除</a>
            </td>
          </tr>
        <?php }
        ?>
        </tbody>
      </table>
    </div>