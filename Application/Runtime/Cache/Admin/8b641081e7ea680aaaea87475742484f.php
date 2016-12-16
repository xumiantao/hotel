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
        <input type="hidden" name="id" value="<?php echo ($detail["id"]); ?>">
        <div class="row animated fadeInRight">
                <div class="col-md-2">
                   <div class="form-group">
                       <label for="showEasing">产品名称</label>
                       <input id="showEasing" type="text" name="name" placeholder="" class="form-control" value="<?php echo ($detail["name"]); ?>" required>
                   </div>
                   <div class="form-group">
                       <label for="hideEasing">所需积分</label>
                       <input id="hideEasing" type="text" name="integral" placeholder="" class="form-control" value="<?php echo ($detail["integral"]); ?>" required>
                   </div>
                   <div class="form-group">
                       <label>库存</label>
                       <input type="text" name="stock" placeholder="" class="form-control" value="<?php echo ($detail["stock"]); ?>" required>
                   </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="showDuration">分类</label>
                           <select class="form-control" name="categore" required>
                           <?php if(($detail["categore"] == '')): if(is_array($cate_list)): foreach($cate_list as $key=>$item): ?><option value="<?php echo ($item["id"]); ?>"><?php echo ($item["catename"]); ?></option><?php endforeach; endif; ?>
                             <?php else: ?><option value="<?php echo ($detail["categore"]); ?>"><?php echo ($detail["catename"]); ?></option><?php endif; ?>
                           </select>
                    </div>
                    <div class="form-group">
                       <label for="showMethod">市场价</label>
                       <input id="showMethod" type="text" name="market_price" placeholder="" class="form-control" value="<?php echo ($detail["market_price"]); ?>" required>
                   </div>
               </div>
        </div>
        <div class="row animated fadeInRight">
               <div class="col-md-2">
                   <div class="form-group">
                       <label for="showEasing">产品图片</label>
                       <?php if(($detail["images"] == '')): ?><input type="file" name="images" class="form-control" required>
                         <?php else: ?><img src="/Uploads/Public/product/<?php echo ($detail["images"]); ?>" width="200" hight="200" /><?php endif; ?>
                   </div>
               </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>商品详情:</h5>
                    </div>
                    <div class="ibox-content">
                        <textarea id="editor" placeholder="这里输入内容" name="content" autofocus><?php echo ($detail["content"]); ?></textarea>
                    </div>
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
    <script type="text/javascript" src="../../../Public/js/plugins/simditor/module.js"></script>
    <script type="text/javascript" src="../../../Public/js/plugins/simditor/uploader.js"></script>
    <script type="text/javascript" src="../../../Public/js/plugins/simditor/hotkeys.js"></script>
    <script type="text/javascript" src="../../../Public/js/plugins/simditor/simditor.js"></script>
    <script>
        $(document).ready(function(){var editor=new Simditor({textarea:$("#editor"),defaultImage:"img/a9.jpg"})});
    </script>

</body>
</html>