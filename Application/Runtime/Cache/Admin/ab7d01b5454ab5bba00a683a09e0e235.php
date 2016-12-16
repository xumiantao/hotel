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
  <link href="../../../Public/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet" /> 
  <link href="../../../Public/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet" /> 
  <link href="../../../Public/css/animate.min.css" rel="stylesheet" /> 
  <link href="../../../Public/css/style.min862f.css?v=4.1.0" rel="stylesheet" /> 
  <link rel="stylesheet" type="text/css" href="../../../Public/css/plugins/simditor/simditor.css" />
  <link href="../../../../../../../Public/css/plugins/jqgrid/ui.jqgridffe4.css?0820" rel="stylesheet" /> 
  <link href="../../../../../../../Public/css/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">
  <link href="../../../../../../../Public/css/plugins/footable/footable.core.css" rel="stylesheet">
 </head> 
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <!-- Panel Other -->
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5 class="example-title">会员等级</h5>
            </div>
            <div class="ibox-content">
                <div class="row row-lg">
                    <div class="col-sm-12">
                        <!-- Example Toolbar -->
                        <div class="example-wrap">
                            <div class="example table-responsive">
                                <table id="exampleTableToolbar" data-mobile-responsive="true" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th data-field="name">会员等级</th>
                                            <th data-field="description">等级属性</th>
                                            <th data-field="license">累计消费</th>
                                            <th data-field="star">折扣</th>
                                            <th data-field="active">操作</th>
                                        </tr>
                                    </thead>
                                    <?php if(is_array($card)): $i = 0; $__LIST__ = $card;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                            <td><?php echo ($vo["grade"]); ?></td>
                                            <td><?php echo ($vo["description"]); ?></td>
                                            <td><?php echo ($vo["content"]); ?></td>
                                            <td><?php if(($vo["discount"] == 0)): else: echo ($vo["discount"]); ?>折<?php endif; ?></td>
                                            <td><a href="<?php echo U('/Admin/Card/card_save/id/'.$vo[id]);?>">编辑</a></td>
                                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                </table>
                            </div>
                        </div>
                        <!-- End Example Toolbar -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Panel Other -->
    </div>
   <script type="text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script>
<script src="../../../Public/js/jquery.min.js?v=2.1.4"></script> 
  <script src="../../../Public/js/bootstrap.min.js?v=3.3.6"></script> 
  <script src="../../../Public/js/plugins/metisMenu/jquery.metisMenu.js"></script> 
  <script src="../../../Public/js/plugins/slimscroll/jquery.slimscroll.min.js"></script> 
  <script src="../../../Public/js/plugins/layer/layer.min.js"></script> 
  <script src="../../../Public/js/hplus.min.js?v=4.1.0"></script> 
  <script type="text/javascript" src="../../../Public/js/contabs.min.js"></script> 
  <script src="../../../Public/js/plugins/pace/pace.min.js"></script>  
  <script src="../../../Public/js/plugins/peity/jquery.peity.min.js"></script>
  <script src="../../../Public/js/content.min.js?v=1.0.0"></script>
  <script src="../../../Public/js/plugins/iCheck/icheck.min.js"></script>
  <script src="../../../Public/js/demo/peity-demo.min.js"></script>
  <script>
        $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
  </script>
</body>
<script type="text/javascript">
    $('#card_save').click(function(){
        var req={id:$(this).data("id")};
        $.post("<?php echo U('/Admin/Card/card_save');?>",req,function(jsonobj){
            
        });
    });
</script>

<!-- Mirrored from www.zi-han.net/theme/hplus/table_bootstrap.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:20:06 GMT -->
</html>