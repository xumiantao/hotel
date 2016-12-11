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
       <h5>司机银行卡列表</h5>
      </div> 
      <div class="ibox-content">  
       <div class="table-responsive"> 
        <table class="table table-striped"> 
         <thead> 
          <tr> 
           <th>id</th> 
           <th>司机ID&姓名</th>
           <th>用户名称</th> 
           <th>预留号码</th> 
           <th>银行名称</th>
           <th>银行卡号</th>
           <th>添加日期</th>  
           <th>操作</th> 
          </tr> 
         </thead> 
         <tbody> 
         <?php if(is_array($bank_list)): foreach($bank_list as $key=>$item): ?><tr> 
           <td><?php echo ($item["PID"]); ?></td> 
           <td><?php echo ($item["KDriverID"]); ?>&<?php echo ($item["driver"]); ?></td> 
           <td><?php echo ($item["FUserName"]); ?></td>
           <td><?php echo ($item["FBankMobile"]); ?></td> 
           <td><?php echo ($item["FBankName"]); ?></td>
           <td><?php echo ($item["FBankCode"]); ?></td> 
           <td><?php echo ($item["FCreateDate"]); ?></td> 
           <td>
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
    			 url: '<?php echo U('Home/driver/bankdel');?>',
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
 </body>
</html>