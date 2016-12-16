<?php if (!defined('THINK_PATH')) exit();?><html>

  <head></head>

  <body class="gray-bg">

    <head>
      <meta charset="utf-8" />

      <link href="/Public/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet" />
      <link href="/Public/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet" />
      <link href="/Public/css/animate.min.css" rel="stylesheet" />
      <link href="/Public/css/style.min862f.css?v=4.1.0" rel="stylesheet" />
      <style>
        .pages a,
        .pages span {
          display: inline-block;
          padding: 2px 5px;
          margin: 0 1px;
          border: 1px solid #f0f0f0;
          -webkit-border-radius: 3px;
          -moz-border-radius: 3px;
          border-radius: 3px;
        }
        
        .pages a,
        .pages li {
          display: inline-block;
          list-style: none;
          text-decoration: none;
          color: #58A0D3;
        }
        
        .pages a.first,
        .pages a.prev,
        .pages a.next,
        .pages a.end {
          margin: 0;
        }
        
        .pages a:hover {
          border-color: #50A8E6;
        }
        
        .pages span.current {
          background: #50A8E6;
          color: #FFF;
          font-weight: 700;
          border-color: #50A8E6;
        }
      </style>
    </head>

    <div class="wrapper wrapper-content animated fadeInRight">
      <div class="row">
        <div class="col-sm-12">
          <div class="ibox float-e-margins">
            <div class="ibox-title">
              <h5>消息列表</h5>
            </div>
            <div class="ibox-content">
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>标题</th>
                      <th>消息发布时间</th>
                      <th>发布人id</th>
                      <th>操作</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(is_array($mylist)): $i = 0; $__LIST__ = $mylist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><tr>
                        <td><?php echo ($row["id"]); ?></td>
                        <td><?php echo ($row["title"]); ?></td>
                        <td><?php echo ($row["addtime"]); ?></td>
                        <td><?php echo ($row["admin"]); ?></td>
                        <td>

                          <a href="/index.php/Admin/message/message_edit?id=<?php echo ($row["id"]); ?>">编辑</a>

                          <a href="javascript:del(<?php echo ($row["id"]); ?>)">删除</a>
                        </td>
                      </tr><?php endforeach; endif; else: echo "" ;endif; ?>

                  </tbody>
                </table>
                <div class="pages">
                  <?php echo ($page); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="/Public/js/jquery.min.js?v=2.1.4"></script>
    <script type="text/javascript">
      function adsubmit() {
        $('#handlepost').submit();
      }

      function del(id) {
        if(confirm('确定删除吗？') == true) {
          $.ajax({
            url: '/index.php/admin/message/ajax_message_del',
            type: 'post',
            dataType: 'json',
            data: {
              'id': id
            },
            success: function(data) {
              if(data.state == true) {
                alert('删除成功！');
                window.location.reload();
              } else {
                alert('删除失败!');
                window.location.reload();
              }
            }
          });
        }
      }
    </script>
  </body>

</html>