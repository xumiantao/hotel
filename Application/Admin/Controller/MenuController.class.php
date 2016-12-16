<?php 
namespace Admin\Controller;
use Think\Controller;
class MenuController extends Controller {
    
    public function menulist(){
    	$menu = M('menu')->order('sort asc')->select();
        $data= I('post.');
        if (!empty($data)) {
            $images = empty($_FILES['images']) ? '' : $_FILES['images'];
            $upload = new \Think\Upload();  // 实例化上传类
            $upload->maxSize = (1024*1024)*2;   // 设置附件上传大小
            $upload->allowExts  = array(
            'jpg', 'gif', 'png', 'jpeg'
            );// 设置附件上传类型
            $upload->savePath = 'Public/menu/';// 设置附件上传目录
            $upload->replace = true; //存在同名文件是否是覆盖
            $upload->autoSub = false;//子目录保存上传文件 
            $info = $upload->upload();
            if (empty($info)){
                $this->error($upload->getError());
            }else{
                $content = array(
                    'name' => $data['name'],
                    'url' => $data['url'],
                    'sort' => $data['sort'],
                    'image' => $info['images']['savename']
                );
                if(M('menu')->add($content)){
                     $this->success("保存成功",U('Admin/Menu/menulist'));
                }else{
                     $this->error("保存失败",U('Admin/Menu/menulist'));
                }

            }
        }
        $this->assign('mlist',$menu);
    	$this->display();
    	
    }
 	public function menu_save(){
        $id = I('id');
        $mol = M('menu')->where(array('id'=>$id))->find();
        $this->assign('msave',$mol);
        $this->display();
    }
    public function msave(){
        $id = I('post.id');
        $data = I('post.');
        $res = M('menu')->where(array('id'=>$id))->find();
        if(!$res){
            $this->error("数据不存在",U('Admin/Menu/menulist'));
        }
        $content = array(
            'name' => $data['name'],
            'url' => $data['url'],
            'sort' => $data['sort']
        );
        //$images = empty($_FILES['images']) ? '' : $_FILES['images'];
        if($_FILES['images']['error'] != 4){
            $upload = new \Think\Upload();  // 实例化上传类
            $upload->maxSize = (1024*1024)*2;   // 设置附件上传大小
            $upload->allowExts  = array(
            'jpg', 'gif', 'png', 'jpeg'
            );// 设置附件上传类型
            $upload->savePath = 'Public/menu/';// 设置附件上传目录
            $upload->replace = true; //存在同名文件是否是覆盖
            $upload->autoSub = false;//子目录保存上传文件 
            $info = $upload->upload($_FILES);
            if(!$info){
                $this->error($upload->getError());
            }else{
                $content['image'] = $info['images']['savename'];
            }
        }
        if(M('menu')->where(array('id'=>$id))->save($content) !== false){
             $this->success("修改成功",U('Admin/Menu/menulist'));
        }else{
             $this->error("修改失败",U('Admin/Menu/menulist'));
        }
       
    }	
    public function menu_delete(){
        $id = I('id');
        if(M('menu')->where(array('id'=>$id))->find()){
            $res = M('menu')->where(array('id'=>$id))->delete();
            if($res){
                $this->success("删除成功",U('Admin/Menu/menulist'));
            }else{
                $this->error("删除失败",U('Admin/Menu/menulist'));
            }
        }else{
            $this->error("所删除的数据不存在",U('Admin/Menu/menulist'));
        }
       
    }	
    	
}

?>