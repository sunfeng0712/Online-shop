<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/11
 * Time: 17:27
 */
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 后台首页
     */
    public function index()
    {
        $this->display();
    }
    public function welcome()
    {
        $this->display();
    }
}