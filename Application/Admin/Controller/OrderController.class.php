<?php
namespace Admin\Controller;
use Think\Controller;
class OrderController extends Controller {
    
    /**
     * 订单列表
     * Programmer : manty
     * Date: 12-11  16:00
     */
    public function lists(){
        $orderModel = D('Admin/Order');
        $status = I('get.status');
        $where = empty($status) ? 1 : array('status'=>$status);
        $order_list = $orderModel->get_orderList($where,$status);
        switch ($status){
            case 1:
                $title = '已完成';
                break;
            case 2:
                $title = '已付款';
                break;
            case 3:
                $title = '未付款';
                break;
            case 4:
                $title = '已取消';
                break;
            default:
                $title = '全部';
        }
        
        $this->assign('order_list', $order_list);
        $this->assign('title', $title);
        $this->display('list');
    }
    
    /**
     * 删除订单
     * Programmer : manty
     * Date: 12-11  16:00
     */
    public function ajax_order_delete(){
        $order_id = I('post.id');
        $Model = M('order');
        if ($Model->where(array('id'=>$order_id))->delete()){
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
    
}

?>