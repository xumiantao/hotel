<?php if (!defined('THINK_PATH')) exit();?><html>
 <head></head>
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
 <body class="gray-bg">
  <html>
 <head> 
  <meta charset="utf-8" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
  <meta name="renderer" content="webkit" /> 
  <meta http-equiv="Cache-Control" content="no-siteapp" /> 
  <meta name="keywords" content="" /> 
  <meta name="description" content="" /> 
  <link href="../../../../../../../Public/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet" /> 
  <link href="../../../../../../../Public/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet" /> 
  <link href="../../../../../../../Public/css/animate.min.css" rel="stylesheet" /> 
  <link href="../../../../../../../Public/css/style.min862f.css?v=4.1.0" rel="stylesheet" /> 
 </head> 
  <div class="wrapper wrapper-content animated fadeInRight"> 
   <div class="row"> 
    <div class="col-sm-12"> 
     <div class="ibox float-e-margins"> 
      <div class="ibox-title"> 
       <h5>门店列表</h5>
       <div class="btn-group" style="float:right;margin-top:-10px;">
          <button data-toggle="dropdown" class="btn btn-warning dropdown-toggle" onclick="location='/index.php/admin/store/storeAdd'">添加门店+</button>
       </div>
      </div> 
      <div class="ibox-content">  
       <div class="table-responsive"> 
        <table class="table table-striped"> 
         <thead> 
          <tr> 
           <th>ID</th>  
           <th>门店名称</th>
           <th>门店位置</th>
           <th>门店价格</th>
           <th>操作</th> 
          </tr> 
         </thead> 
         <tbody> 
         <?php if(is_array($store_list)): foreach($store_list as $key=>$item): ?><tr> 
           <td><?php echo ($item["id"]); ?></td> 
           <td><?php echo ($item["name"]); ?></td> 
           <td><?php echo ($item["address"]); ?></td> 
           <td><?php echo ($item["price"]); ?></td> 
           <td>
              <a href="/index.php/admin/store/storeEdit?id=<?php echo ($item["id"]); ?>">编辑</a>
              <a href="javascript:del(<?php echo ($item["id"]); ?>)">删除</a>
           </td>  
          </tr><?php endforeach; endif; ?>
         </tbody> 
        </table> 
       </div> 
      </div> 
     </div> 
    </div> 
   </div> 
   <div class="pages">
       <?php echo ($page); ?>
   </div>
  </div> 
  <script src="../../../../../../../Public/js/jquery.min.js?v=2.1.4"></script> 
  <script src="../../../../../../../Public/js/bootstrap.min.js?v=3.3.6"></script> 
  <script src="../../../../../../../Public/js/plugins/metisMenu/jquery.metisMenu.js"></script> 
  <script src="../../../../../../../Public/js/plugins/slimscroll/jquery.slimscroll.min.js"></script> 
  <script src="../../../../../../../Public/js/plugins/layer/layer.min.js"></script> 
  <script src="../../../../../../../Public/js/hplus.min.js?v=4.1.0"></script> 
  <script type="text/javascript" src="../../../../../../../Public/js/contabs.min.js"></script> 
  <script src="../../../../../../../Public/js/plugins/pace/pace.min.js"></script>  
  <script src="../../../../../../../Public/js/plugins/peity/jquery.peity.min.js"></script>
  <script src="../../../../../../../Public/js/content.min.js?v=1.0.0"></script>
  <script src="../../../../../../../Public/js/plugins/iCheck/icheck.min.js"></script>
  <script src="../../../../../../../Public/js/demo/peity-demo.min.js"></script>
  <script>
        $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
  </script> 
    <script type="text/javascript">
     function del(id){
    	 if (confirm('确定删除吗？') == true){
    		 $.ajax({
    			 url: '<?php echo U('Admin/product/ajax_cate_delete');?>',
    			 type: 'post',
    			 dataType: 'json',
    		     data: {'id':id},
    		     success: function (data) {
    		    	 if (data.state == true) {
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