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
                    <div class="col-sm-12">
                        <!-- Example Card View -->
                        <div class="example-wrap">
                            <h4 class="example-title">会员等级列表</h4>
                            <div style="float: right;">
                                <div class="btn-group">
                                    <button data-toggle="dropdown" class="btn btn-warning btn-sm dropdown-toggle"><?php echo ($title); ?> <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="<?php echo U('/Admin/Card/catelist');?>">全部</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo U('/Admin/Card/catelist/id/5');?>">至尊会员</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo U('/Admin/Card/catelist/id/4');?>">尊贵会员</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo U('/Admin/Card/catelist/id/3');?>">VIP会员</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo U('/Admin/Card/catelist/id/2');?>">高级会员</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo U('/Admin/Card/catelist/id/1');?>">普通会员</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="example">
                                <table data-toggle="table" data-card-view="true" data-mobile-responsive="true">
                                    <thead>
                                        <tr>
                                            <th data-field="username" data-halign="center" data-align="center">会员名称</th>
                                            <th data-field="mobile_photo" data-halign="center" data-align="center">联系方式</th>
                                            <th data-field="nickname" data-halign="center" data-align="center"></th>
                                            <th data-field="sex" data-halign="center" data-align="center">性别</th>
                                            <th data-field="address" data-halign="center" data-align="center">地址</th>
                                            <th data-field="autograph" data-halign="center" data-align="center"></th>
                                            <th data-field="touxiang" data-halign="center" data-align="center">头像</th>
                                            <th data-field="integral" data-halign="center" data-align="center"></th>
                                        </tr>
                                    </thead>
                                    <?php if(is_array($clist)): $i = 0; $__LIST__ = $clist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pt): $mod = ($i % 2 );++$i;?><tr>
                                            <td><?php echo ($pt["username"]); ?></td>
                                            <td><?php echo ($pt["mobile_photo"]); ?></td>
                                            <td><?php echo ($pt["nickname"]); ?></td>
                                            <td><?php if(($pt["sex"] == 0)): ?>男<?php else: ?>女<?php endif; ?></td>
                                            <td><?php echo ($pt["address"]); ?></td>
                                            <td><?php echo ($pt["autograph"]); ?></td>
                                            <td><?php echo ($pt["touxiang"]); ?></td>
                                            <td><?php echo ($pt["integral"]); ?></td>
                                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                    <tfoot>
                                        <tr>
                                            <td colspan="5">
                                                <div class="pages">
                                                        <?php echo ($page); ?>
                                                </div>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
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