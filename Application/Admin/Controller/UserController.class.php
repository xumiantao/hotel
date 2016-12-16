<?php 
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller {
    
    public function index(){    	
        $count = M('user')->count();
        $page = getpage($count,10);
        $user = M('user')->limit($page->firstRow.','.$page->listRows)->select();
    	$this->assign('user',$user);
        $this->assign('page',$page->show());
        $this->display();
    }
    
    public function userInfo(){
        $id = I('get.id');
        $info = M('user')->where(array('id'=>$id))->find();
        if(!$info){
            $this->error('该会员不存在~');
        }
        $level = M('membercard')->field('id,description')->select();
        $this->assign('level',$level);
        $this->assign('info',$info);
        $this->display();                
    }
    
    public function editUser(){
        if(IS_POST){
            $data['nickname'] = I('post.nickname');   
            $data['sex'] = I('post.sex');
            $data['autograph'] = I('post.autograph');
            $data['address'] = I('post.address');
            $data['integral'] = I('post.integral');
            $data['grade'] = I('post.grade');            
            $id = I('post.id');
            //如果有上传图片
            if($_FILES['photo']['error'] != 4){
                $upload = new \Think\Upload();
                $upload->savePath = 'Public/user/';
                $upload->replace = true; //存在同名文件是否是覆盖
                $upload->autoSub = false;//子目录保存上传文件                  
                $res = $upload->upload($_FILES);
                if(!$res){
                    $this->error($upload->getError());
                }else{
                    $data['touxiang'] = $res['photo']['savename'];
                }                
            }                        
            $res = M('user')->where(array('id'=>$id))->data($data)->save();
            if($res !== false){
                $this->success('保存成功',U('Admin/User/index/'));
            }
            else{
                $this->error('保存失败,请稍后再试');
            }
        }
    }
    
    public function addUser(){
        if(IS_POST){
            $username = I('post.username');
            $pwd = I('post.password');
            $pwd2 = I('post.confirm_password');
            $type = 1;
            if(empty($pwd)||empty($pwd2)||empty($username)){
                echo json_encode(array('status'=>0,'info'=>'请输入数据'));
                exit();
            }
            $ishas=D('admin')->where(array('username'=>$username))->find();
            if($ishas){
                echo json_encode(array('status'=>0,'info'=>'用户名已被注册'));
                exit();
            }
            if($pwd2!=$pwd){
                echo json_encode(array('status'=>0,'info'=>'两次输入的密码不相同'));
                exit();
            }
            $data['username']=$username;
            $data['password']=md5($pwd);
            $data['type']=$type;
            if(D('admin')->add($data)){
                $url=U('Admin/User/index');
                 echo json_encode(array('status'=>1,'info'=>'注册成功','url'=>$url));
                 exit();
            }
            exit();
        }
        else{
    	$this->display();            
        }

    }
    
    public function delUser(){
        if(IS_POST){
            $id = I('post.id');            
            $res = M('user')->where(array('id'=> $id))->delete();
            if($res){
                $url=U('Admin/User/index');
                echo json_encode(array('status'=>1,'info'=>'删除成功','url'=>$url));
                exit();
            }
            else{
                echo json_encode(array('status'=>0,'info'=>'删除失败'));
                exit();
            }           
        }
        exit();        
    }
    
}

?>