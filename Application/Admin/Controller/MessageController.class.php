<?php 
namespace Admin\Controller;
use Think\Controller;
class MessageController extends Controller {
    
    public function lists(){
        $message = M('message'); // 实例化message
        $count      = $message->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
        $list = $message->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        foreach ($list as $key => $value) {
            $list[$key]['admin'] = M('admin')->where(array('id'=>$list[$key]['admin_id']))->getField('username');
            $list[$key]['addtime'] = date('Y-m-d h:i:s', $list[$key]['addtime']);
        }
        $this->assign('mylist',$list);// 赋值数据集
        $this->assign('total',$count);
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板       
    }
    //
    public function message_edit()
    {
        $Model = M('message');
        $messageID = I('get.id');
        $messageInfo = $Model->where(array('id'=>$messageID))->find();
        $this->assign('detail', $messageInfo);
        $this->display('Adlist');  
    }

     public function Adlist(){
        $data = I('post.');
        $Model = M('message');
        if (!empty($data)) {
            $content = array(
                'addtime' => time(),
                'title' => $data['title'],
                'content' => $data['content'],
                'admin_id' => 1
            );
            if ($Model->add($content)) {
                $this->success('保存成功!',U('admin/message/lists'));
            }else{
                $this->error("保存失败！",U('admin/message/lists'));
            }
        }
        $this->display('');
    }
   
        
    

    public function ajax_message_del(){
        $messageID = I('post.id');
        $Model = M('message');
        if ($Model->where(array('id'=>$messageID))->delete()) {
            $return = array(
                'state' => true,
            );
        }else{
            $return = array(
                'state' => false,
            );
        }
       exit(json_encode($return));
    }

    public  function update(){  
        $data = I('post.');
        $Model = M('message');
        if (!empty($data)) {
            $id = I('post.id');    
            if(empty($id)){
                $content = array(
                    'addtime' => time(),
                    'title' => $data['title'],
                    'content' => $data['content'],
                    'admin_id' => 1
                );
                if ($Model->add($content)) {
                    $this->success('添加成功!',U('admin/message/lists'));
                }else{
                    $this->error("添加失败！",U('admin/message/lists'));
                }

            }else{
                $re = $Model->where("id=$id")->save(array('title'=>$data['title'],'content'=>$data['content'])); 
                if($re){
                    $this->success('修改成功!',U('admin/message/lists'));            
                }else{
                    $this->error("修改失败！",U('admin/message/lists'));        
                }
                
            }


        }
        //$this->display('');     
    }

    
}


?>