<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/13
 * Time: 11:33
 */
namespace Admin\Controller;
use Think\Controller;

class BaseController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->admin_check_role();
    }
    public function admin_check_role()
    {
        $this->assign('action',ACTION_NAME);
        if(
            in_array(ACTION_NAME,array('login,logout,vertify'))
            ||
            in_array(CONTROLLER_NAME,array('Ueditor','Uploadify'))
        )
        {

        }else
        {
            if(session('admin_id') > 0 ){
                $this->check_priv();//检查管理员菜单操作权限
            }else{
                $this->error('请先登陆',U('Admin/Admin/login'),1);
            }
        }
    }
    //检查管理员权限
    public function check_priv()
    {
        $ctl = CONTROLLER_NAME;
        $act = ACTION_NAME;
        $act_list = session('act_list');
        $no_check = array('login','logout','vertify');
        if($ctl == "Index" && $act == 'index'){
            return true;
        }elseif(strpos('ajax',$act) || in_array($act,$no_check) || $act_list == 'all'){
            return true;
        }else{
            $mod_id = M('system_module')->where("ctl='$ctl' and act='$act'")->getField('mod_id');
            $act_list = explode(',', $act_list);
            if($mod_id){
                if(!in_array($mod_id, $act_list)){
                    $this->error('您的账号没有此菜单操作权限,超级管理员可分配权限',U('Admin/Index/index'));
                    exit;
                }else{
                    return true;
                }
            }else{
                $this->error('请系统管理员先在菜单管理页添加该菜单',U('Admin/System/menu'));
                exit;
            }
        }
    }
}