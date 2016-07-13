<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/11
 * Time: 15:17
 */
namespace Admin\Controller;

use Think\Controller;
use Think\Verify;

class AdminController extends Controller
{
   public function __construct()
   {
       parent::__construct();
   }

    /**
     * 后台登录页面
     */
    public function login()
    {
        if(IS_POST)
        {
            $verify = new Verify();
           /* if(!$verify->check(I('post.vertify'),'1'))
            {
                die(json_encode(array('status'=>0,'msg'=>'验证码错误')));
            }*/
            $condition['username'] = I('post.username');
            $condition['password'] = I('post.password');
            if(!empty($condition['username']) && !empty($condition['password']))
            {
                $condition['password'] = encrypt($condition['password']);//加密后的密码
                $admin_info = M('admin')->where($condition)->find();//查询后台登录信息
                if($admin_info && is_array($admin_info))
                {
                    session('admin_id',$admin_info['admin_id']);
                    session('username',$admin_info['user_name']);
                    session('act_list',$admin_info['act_list']);
                    //最后登录时间
                    $last_login_time = M('admin_log')->where("admin_id=".$admin_info['admin_id']." AND log_info="."'后台登录'")->order('log_id desc')->limit(1)->getField('log_time');
                    session('last_login_time',$last_login_time);
                    adminLog('后台登录',__ACTION__);//写入操作日志中
                    $url = session('form_url') ? session('form_url') :U('admin/index/index');
                    exit(json_encode(array('status'=>1,'url'=>$url)));
                }else
                {
                    die(json_encode(array('status'=>0,'msg'=>'账号密码不正确')));
                }
            }else
            {
                exit(json_encode(array('status'=>0,'msg'=>'请填写账号密码')));
            }
        }
          $this->display();
    }
    /**
     * 验证码
     */
    public function vertify()
    {
        $config = array(
            'fontSize' => 30,
            'length' => 4,
            'useCurve' => true,
            'useNoise' => false,
        );
        $Verify = new Verify($config);
        $Verify->entry('1');
    }

}