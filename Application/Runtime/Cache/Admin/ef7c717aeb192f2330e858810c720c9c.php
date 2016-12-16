<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
 <head> 
  <meta charset="utf-8" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
  <meta name="renderer" content="webkit" /> 
  <meta http-equiv="Cache-Control" content="no-siteapp" /> 
  <title>澳新考拉后台管理</title> 
  <meta name="keywords" content="" /> 
  <meta name="description" content="" /> 
  <link href="/Public/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet" /> 
  <link href="/Public/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet" /> 
  <link href="/Public/css/animate.min.css" rel="stylesheet" /> 
  <link href="/Public/css/style.min862f.css?v=4.1.0" rel="stylesheet" /> 
  <link href="/Public/css/plugins/jqgrid/ui.jqgridffe4.css?0820" rel="stylesheet" /> 
  <link href="/Public/css/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">
  <link href="/Public/css/plugins/footable/footable.core.css" rel="stylesheet">
    <style>
.pages a,.pages span {
    display:inline-block;
    padding:2px 5px;
    margin:0 1px;
    border:1px solid #f0f0f0;
    -webkit-border-radius:3px;
    -moz-border-radius:3px;
    border-radius:3px;
}
.pages a,.pages li {
    display:inline-block;
    list-style: none;
    text-decoration:none; color:#58A0D3;
}
.pages a.first,.pages a.prev,.pages a.next,.pages a.end{
    margin:0;
}
.pages a:hover{
    border-color:#50A8E6;
}
.pages span.current{
    background:#50A8E6;
    color:#FFF;
    font-weight:700;
    border-color:#50A8E6;
}
</style> 
</head> 
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <div class="row row-lg">
                    <div class="col-sm-6">
                        <!-- Example Align -->
                        <div class="example-wrap">
                            <h4 class="example-title">导航栏</h4>
                            <div class="example">
                                <table data-toggle="table" data-mobile-responsive="true">
                                    <thead>
                                        <tr>
                                            <th data-field="name" data-halign="center" data-align="center">导航栏名称</th>
                                            <th data-field="image" data-halign="center" data-align="center">图片</th>
                                            <th data-field="url" data-halign="center" data-align="center">连接</th>
                                            <th data-field="sort" data-halign="center" data-align="center">排序</th>
                                            <th data-field="make" data-halign="center" data-align="center">操作</th>
                                        </tr>
                                    </thead>
                                    <?php if(is_array($mlist)): $i = 0; $__LIST__ = $mlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ct): $mod = ($i % 2 );++$i;?><tr>
                                            <td><?php echo ($ct["name"]); ?></td>
                                            <td><img src="/Uploads/Public/menu/<?php echo ($ct["image"]); ?>" width="80" height="80" /></td>
                                            <td><?php echo ($ct["url"]); ?></td>
                                            <td><?php echo ($ct["sort"]); ?></td>
                                            <td>
                                                <a href="<?php echo U('/Admin/Menu/menu_save/id/'.$ct[id]);?>">编辑</a>
                                                <a href="<?php echo U('/Admin/Menu/menu_delete/id/'.$ct[id]);?>">删除</a>
                                            </td>
                                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                </table>
                            </div>
                        </div>
                        <!-- End Example Align -->
                    </div>
                </div>
            
       
<p></p>
        <div class="row">
            <div class="col-sm-5">
                <div class="ibox float-e-margins">
                    <div class="">
                        <h5>添加自定义导航栏</h5>
                    </div>
                    <div class="ibox-content">
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">导航栏名称：</label>
                                <div class="col-sm-8">
                                    <input type="text" name="name" class="form-control" required> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">图片：</label>
                                <div class="col-sm-8">
                                    <input type="file" name="images" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">连接：</label>
                                <div class="col-sm-8">
                                    <input type="text" name="url" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">排序：</label>
                                <div class="col-sm-8">
                                    <input type="text" name="sort" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-8">
                                    <button class="btn btn-sm btn-white" type="submit">保存</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
         </div>
    </div> 
   <script src="/Public/js/jquery.min.js?v=2.1.4"></script> 
  <script src="/Public/js/bootstrap.min.js?v=3.3.6"></script> 
  <script src="/Public/js/plugins/metisMenu/jquery.metisMenu.js"></script> 
  <script src="/Public/js/plugins/slimscroll/jquery.slimscroll.min.js"></script> 
  <script src="/Public/js/plugins/layer/layer.min.js"></script> 
  <script src="/Public/js/hplus.min.js?v=4.1.0"></script> 
  <script type="text/javascript" src="/Public/js/contabs.min.js"></script> 
  <script src="/Public/js/plugins/pace/pace.min.js"></script>  
  <script src="/Public/js/plugins/peity/jquery.peity.min.js"></script>
  <script src="/Public/js/content.min.js?v=1.0.0"></script>
  <script src="/Public/js/plugins/iCheck/icheck.min.js"></script>
  <script src="/Public/js/demo/peity-demo.min.js"></script>
  <script src="/Public/js/plugins/peity/jquery.peity.min.js"></script>
  <script src="/Public/js/plugins/jqgrid/i18n/grid.locale-cnffe4.js?0820"></script>
  <script src="/Public/js/plugins/jqgrid/jquery.jqGrid.minffe4.js?0820"></script>
  <script src="/Public/js/plugins/bootstrap-table/bootstrap-table.min.js"></script>
  <script src="/Public/js/plugins/bootstrap-table/bootstrap-table-mobile.min.js"></script>
  <script src="/Public/js/plugins/bootstrap-table/locale/bootstrap-table-zh-CN.min.js"></script>
  <script src="/Public/js/plugins/footable/footable.all.min.js"></script>
  <script>
        $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
        
  </script>

</body>

</html>