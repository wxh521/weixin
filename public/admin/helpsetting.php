<?php


?>
<h1 class="page-header">添加帮手</h1>

    <div class="row placeholders">
        <div class="col-md-6">
            <form class="form-horizontal" role="form" method="post" action="/admin/index.php?func=helpsetting">
                <div class="form-group">
                  <label for="helpername" class="col-sm-2 control-label">帮手名称</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="helpername" name="helpername">
                  </div>
                </div>
                <div class="form-group">
                  <label for="helperdesc" class="col-sm-2 control-label">帮手简介</label>
                  <div class="col-sm-10">
                    <textarea id="helperdesc" name="helperdesc" class="form-control" rows="3"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="helperaddr" class="col-sm-2 control-label">帮手地址</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="helperaddr" name="helperaddr" placeholder="以/开头，例如/helper/delivery.php">
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
            <th>帮手地址</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1,001</td>
            <td>Lorem</td>
            <td>ipsum</td>
            <td>dolor</td>
            <td>sit</td>
          </tr>
          
        </tbody>
      </table>
    </div>