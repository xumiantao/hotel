<?php 
namespace Admin\Model;
use Think\Model;
class OrderModel extends Model {

    public function get_orderList($where,$status){
        $Model = M('order');
        $count = $Model->where($where)->count();
        $p = getpage($count,15);
        $order_list = $Model->where($where)->order('id')->limit($p->firstRow, $p->listRows)->order('id desc')->select();
        foreach ($order_list as $key=>$value){
            $order_list[$key]['username'] = M('user')->where(array('id'=>$order_list[$key]['user_id']))->getField('username');
            $order_list[$key]['store'] = M('store')->where(array('id'=>$order_list[$key]['store_id']))->getField('name');
            $order_list[$key]['room_type'] = M('room')->where(array('id'=>$order_list[$key]['room_id']))->getField('type');
            $order_list[$key]['addtime'] = date('Y-m-d h:i:s', $order_list[$key]['addtime']);
            switch ($order_list[$key]['room_type']){
                case 1:
                    $order_list[$key]['room_type'] = '单人房';
                    break;
                case 2:
                    $order_list[$key]['room_type'] = '双人房';
                    break;
                case 3:
                    $order_list[$key]['room_type'] = '豪华房';
                    break;
                case 4:
                    $order_list[$key]['room_type'] = '总统房';
                    break;
                default:
                    $order_list[$key]['room_type'] = '暂无数据';
            }
            switch ($order_list[$key]['status']){
                case 1:
                    $order_list[$key]['status'] = '已完成';
                    break;
                case 2:
                    $order_list[$key]['status'] = '已付款';
                    break;
                case 3:
                    $order_list[$key]['status'] = '未付款';
                    break;
                case 4:
                    $order_list[$key]['status'] = '已取消';
                    break;
                default:
                    $order_list[$key]['status'] = '暂无数据';
            }
            
        }
        return $order_list;
    }
    
    
}

?>