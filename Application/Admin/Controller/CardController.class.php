<?php 
namespace Admin\Controller;
use Think\Controller;
class CardController extends Controller {
    
    public function category(){
    	$data = M('membercard')->select();
    	$this->assign('card',$data);
    	$this->display();
    	
    }
 	public function card_save(){
 		$id = I('id');
 		$mol = M('membercard')->where("id=$id")->find();
 		$this->assign('csave',$mol);
    	$this->display();
    }
   	public function csave(){
 		$id = I('id');
 		$data = I('post.');
 		$conn = M('membercard')->where("id=$id")->save(array('grade' =>$data['grade'],'description' =>$data['description'],'content' =>$data['content'],'discount' =>$data['discount']));
 		$this->success('修改成功！',U('/Admin/Card/category'));
    }
    public function catelist(){
    	$id = I('id');
    	$where = empty($id) ? 0 : $id;
    	switch ($id){
            case 1:
                $title = '普通会员';
                break;
            case 2:
                $title = '高级会员';
                break;
            case 3:
                $title = 'VIP会员';
                break;
            case 4:
                $title = '尊贵会员';
                break;
            case 5:
                $title = '至尊会员';
                break;
            default:
                $title = '全部';
        }
    	$model = M('user');
    	if($where != 0){
			$count = $model->where("grade=$where")->count();
    		$p = getpage($count,15);
    		$clist = $model->where("grade=$where")->limit($p->firstRow, $p->listRows)->order('id desc')->select();
    	}else{
    		$count = $model->count();
    		$p = getpage($count,15);
    		$clist = $model->limit($p->firstRow, $p->listRows)->order('id desc')->select();
    	}
    	$this->assign('clist', $clist);
        $this->assign('page', $p->show());
        $this->assign('title', $title);
        $this->display();
    }
    	
    	
    	
}

?>