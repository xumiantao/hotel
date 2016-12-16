<?php 
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    
    public function index(){
    	if (empty($_COOKIE['name'])){
            redirect(U("index/login"));
        }
        $this->display('index');
    }
    
    public function login(){
        $data = I('post.');
        if (!empty($data)){
            $account = $data['username'];
            $password = $data['password'];
            $admin_pwd = M('admin')->where(array('username'=>$account))->getField('password');
            if (empty($admin_pwd)){
                $this->error("账号不存在！",U('admin/index/login'));
            }
            if (md5($password) != $admin_pwd){
                $this->error("密码错误！",U('admin/index/login'));
            }else{
                cookie('name', $account, 3600);
                $this->success('登录成功!','/index.php/Admin');
            }
        }
        $this->display('login');
    }
    
    public function logout(){
        cookie('name', null);
        redirect(U("admin/index/login"));
    }
    
}

?>