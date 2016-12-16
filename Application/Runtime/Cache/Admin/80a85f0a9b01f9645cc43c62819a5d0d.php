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
    <div class="wrapper wrapper-content">
     <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo ($detail["id"]); ?>" />
        <div class="row animated fadeInRight">
                <div class="col-md-2">
                   <div class="form-group">
                       <label for="showEasing">门店名称</label>
                       <input id="showEasing" type="text" name="name" placeholder="" class="form-control" value="<?php echo ($detail["name"]); ?>" required>
                   </div>
                   <div class="form-group">
                       <label for="showEasing">门店位置</label>
                       <input id="showEasing" type="text" name="address" placeholder="" class="form-control" value="<?php echo ($detail["address"]); ?>" required>
                   </div>
                   <div class="form-group">
                       <label for="showEasing">门店价格</label>
                       <input id="showEasing" type="text" name="price" placeholder="" class="form-control" value="<?php echo ($detail["price"]); ?>" required>
                   </div>
                </div>
        </div>
        <button type="submit" class="btn btn-w-m btn-primary">提交</button>
        <button type="button" class="btn btn-w-m btn-primary" onclick="history.go(-1)">返回</button>
        </form>
    </div>
    <script src="../../../Public/js/jquery.min.js?v=2.1.4"></script>
    <script src="../../../Public/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="../../../Public/js/content.min.js?v=1.0.0"></script>
    <script src="../../../Public/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="../../../Public/js/demo/peity-demo.min.js"></script>


</body>
</html>