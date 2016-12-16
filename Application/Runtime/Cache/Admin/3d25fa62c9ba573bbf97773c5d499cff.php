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
  <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>添加管理员</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form class="form-horizontal m-t" id="signupForm">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">用户名：</label>
                                <div class="col-sm-8">
                                    <input id="username" name="username" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error">
                                    <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 这里输入用户名</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">密码：</label>
                                <div class="col-sm-8">
                                    <input id="password" name="password" class="form-control" type="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">确认密码：</label>
                                <div class="col-sm-8">
                                    <input id="confirm_password" name="confirm_password" class="form-control" type="password">
                                    <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 请再次输入您的密码</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-3">
                                    <button class="btn btn-primary postData" >提交</button>
                                </div>
                            </div>
                        </form>
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
                    $('.postData').click(function(){
                var data=$('#signupForm').serialize();
                   // alert(data);return false;
                    $.ajax({
                        type:'post',
                        url:"<?php echo U('Admin/User/addUser');?>",
                        data:data,
                        dataType:'json',
                        contentType:"application/x-www-form-urlencoded;charset=UTF-8",
                        success:function(info){
                            if(info.status==0){
                                layer.open({
                                  title: '信息',
                                  content: info.info,
                                }                            
                                );
                            }else{ 
                                 alert(info.info);
                                 window.location.href=info.url;                  
                            }
                        }
                    });
                });

    </script>