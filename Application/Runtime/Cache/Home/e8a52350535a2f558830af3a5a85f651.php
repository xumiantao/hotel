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
  <title>达喀尔约车后台管理</title> 
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
       <h5>提现记录</h5>
       <div class="btn-group" style="float:right;">
          <button data-toggle="dropdown" class="btn btn-warning dropdown-toggle"><?php echo ($title); ?><span class="caret"></span></button>
          <ul class="dropdown-menu">
              <li><a href="/index.php/Home/system/draw?status=1">申请</a>
              </li>
              <li><a href="/index.php/Home/system/draw?status=2">提现</a>
              </li>
              <li><a href="/index.php/Home/system/draw?status=3">取消</a>
              </li>
          </ul>
       </div>
      </div> 
      <div class="ibox-content">  
       <div class="table-responsive"> 
        <table class="table table-striped"> 
         <thead> 
          <tr> 
           <th>id</th> 
           <th>司机ID&姓名</th> 
           <th>提现帐号&卡号ID</th> 
           <th>提现金额</th>
           <th>提现状态</th> 
           <th>是否审核</th> 
           <th>审核人</th>
           <th>审核时间</th>
           <th>状态</th>  
           <th>操作</th> 
          </tr> 
         </thead> 
         <tbody> 
         <?php if(is_array($draw_list)): foreach($draw_list as $key=>$item): ?><tr> 
           <td><?php echo ($item["PID"]); ?></td> 
           <td><?php echo ($item["KDriverID"]); ?>&<?php echo ($item["driver_name"]); ?></td> 
           <td><?php echo ($item["bankaccount"]); ?>&<?php echo ($item["KBankAccountID"]); ?></td> 
           <td><?php echo ($item["FBacMoney"]); ?></td> 
           <td><?php echo ($item["FCashState"]); ?></td>
           <td><?php echo ($item["FIsAudit"]); ?></td> 
           <td><?php echo ($item["KAccountID"]); ?></td> 
           <td><?php echo ($item["FAuditTime"]); ?></td>
           <td><?php echo ($item["FState"]); ?></td>  
           <td>
           <?php if($item["FCashState"] == '申请'): ?><a href="javascript:adopt(<?php echo ($item["PID"]); ?>)">通过</a><?php endif; ?>
           <?php if($item["FCashState"] == '申请'): ?><a href="javascript:no_adopt(<?php echo ($item["PID"]); ?>)">不通过</a><?php endif; ?>
              <a href="javascript:del(<?php echo ($item["PID"]); ?>)">删除</a>
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
     function del(PID){
    	 if (confirm('确定删除吗？') == true){
    		 $.ajax({
    			 url: '<?php echo U('Home/system/del');?>',
    			 type: 'post',
    			 dataType: 'json',
    		     data: {'PID':PID},
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
 
  <script type="text/javascript">
     function adopt(PID){
    	 if (confirm('确定通过申请吗？') == true){
    		 $.ajax({
    			 url: '<?php echo U('Home/system/adopt');?>',
    			 type: 'post',
    			 dataType: 'json',
    		     data: {'PID':PID},
    		     success: function (data) {
    		    	 if (data.state == true) {
                         alert('审核成功！');
                         window.location.reload(); 
                     } else {
                    	 alert('审核失败!');
                    	 window.location.reload(); 
                     }
    		     }
    		 });
    	 }
     }
  </script>
  
  <script type="text/javascript">
     function no_adopt(PID){
    	 if (confirm('确定不通过吗？') == true){
    		 $.ajax({
    			 url: '<?php echo U('Home/system/no_adopt');?>',
    			 type: 'post',
    			 dataType: 'json',
    		     data: {'PID':PID},
    		     success: function (data) {
    		    	 if (data.state == true) {
                         alert('取消通过成功！');
                         window.location.reload(); 
                     } else {
                    	 alert('取消通过失败!');
                    	 window.location.reload(); 
                     }
    		     }
    		 });
    	 }
     }
  </script> 
   
 </body>
</html>