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
<div class="wrapper wrapper-content animated fadeInRight"> 
   <div class="row"> 
    <div class="col-sm-12"> 
     <div class="ibox float-e-margins"> 
      <div class="ibox-title"> 
       <h5>会员列表</h5> 
       <div class="btn-group" style="float: right;">
       <button class="btn btn-success" onclick="location.href='/index.php/Admin/User/addUser'">添加管理员</button>
      </div> 
      <div class="ibox-content">  
       <div class="table-responsive"> 
        <table class="table table-striped"> 
         <thead> 
          <tr> 
           <th>id</th> 
           <th>用户名</th> 
           <th>手机号码</th> 
           <th>会员昵称</th>
           <th>性别</th> 
           <th>签名</th> 
           <th>头像</th>
           <th>积分</th>
           <th>等级</th>
           <th>操作</th> 
          </tr> 
         </thead> 
         <tbody> 
         <?php if(is_array($user)): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr> 
           <td><?php echo ($vo["id"]); ?></td> 
           <td><?php echo ($vo["username"]); ?></td>  
           <td><?php echo ($vo["mobile_phone"]); ?></td>
           <td><?php echo ($vo["nickname"]); ?></td>
           <td>
           <?php if($vo["sex"] == '0'): ?>男
           <?php else: ?>女<?php endif; ?>
           </td>
           <td><?php echo ($vo["nickname"]); ?></td>
           <td><img src="/Uploads/Public/user/<?php echo ($vo["touxiang"]); ?>" width="32" height="32"></td> 
           <td><?php echo ($vo["integral"]); ?></td>
           <td><?php echo ($vo["grade"]); ?></td>
           <td>
              <a href="<?php echo U('Admin/User/userInfo/',array('id'=>$vo['id']));?>">查看</a>
              <a href="javascript:del(<?php echo ($vo["id"]); ?>)">删除</a>
           </td>  
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
              </tbody> 
        </table> 
       </div> 
       <div class="pages"><?php echo ($page); ?></div> 
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
            function del(id)
        {
            if(!confirm('确定要删除吗?'))
                return false;
		$.ajax({
			url:"<?php echo U('Admin/User/delUser');?>",
            type:'post',
            dataType:'json',
            contentType:"application/x-www-form-urlencoded;charset=UTF-8",            
            data:{'id':id},
			success:function(info){	
                if(info.status==0){
                    layer.open({
                    title: '信息',
                    content: info.info,
                    });
                }
                else{ 
                    alert(info.info);
                    window.location.href=info.url;                  
                }  
          
			}
		}); 
               return false;
          }
  </script>