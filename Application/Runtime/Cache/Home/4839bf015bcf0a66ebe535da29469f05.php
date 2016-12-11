<?php if (!defined('THINK_PATH')) exit();?><html>
 <head></head>
 <body class="gray-bg">
  <!DOCTYPE html>
<html>
 <head> 
  <meta charset="utf-8" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
  <meta name="renderer" content="webkit" /> 
  <meta http-equiv="Cache-Control" content="no-siteapp" /> 
  <title>达喀尔约车后台管理</title> 
  <meta name="keywords" content="" /> 
  <meta name="description" content="" /> 
  <link href="../../../Public/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet" /> 
  <link href="../../../Public/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet" /> 
  <link href="../../../Public/css/animate.min.css" rel="stylesheet" /> 
  <link href="../../../Public/css/style.min862f.css?v=4.1.0" rel="stylesheet" /> 
 </head>   
  <div class="wrapper wrapper-content animated fadeInRight"> 
   <div class="row"> 
    <div class="col-sm-12"> 
     <div class="ibox float-e-margins"> 
      <div class="ibox-title"> 
       <h5>司机列表</h5> 
      </div> 
      <div class="ibox-content">  
       <div class="table-responsive"> 
        <table class="table table-striped"> 
         <thead> 
          <tr> 
           <th>id</th> 
           <th>姓名</th> 
           <th>手机</th> 
           <th>头像</th>
           <th>城市</th> 
           <th>车牌号</th> 
           <th>车型</th>
           <th>车辆注册时间</th>  
           <th>操作</th> 
          </tr> 
         </thead> 
         <tbody> 
         <?php if(is_array($driver_list)): foreach($driver_list as $key=>$item): ?><tr> 
           <td><?php echo ($item["PID"]); ?></td> 
           <td><?php echo ($item["FName"]); ?></td> 
           <td><?php echo ($item["FMobilePhone"]); ?></td> 
           <td><img src="<?php echo ($item["FImg"]); ?>" width="32" height="32"></td> 
           <td><?php echo ($item["KCity"]); ?></td>
           <td><?php echo ($item["FCarCode"]); ?></td> 
           <td><?php echo ($item["FCarType"]); ?></td> 
           <td><?php echo ($item["FRegisterTime"]); ?></td> 
           <td>
              <a href="/index.php/Home/driver/driverInfo?PID=<?php echo ($item["PID"]); ?>">查看</a>
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
  </div> 
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
  <script type="text/javascript">
     function del(PID){
    	 if (confirm('确定删除吗？') == true){
    		 $.ajax({
    			 url: '<?php echo U('Home/driver/del');?>',
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