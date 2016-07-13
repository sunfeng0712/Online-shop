<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/11
 * Time: 17:15
 */
/**
 * 管理员操作日志
 * @param $log_info 记录信息
 * @param string $log_url 操作url
 */
function adminLog($log_info,$log_url='')
{
    $add['log_time'] = time();
    $add['admin_id'] = session('admin_id');
    $add['log_info'] = $log_info;
    $add['log_ip'] = getIP();
    $add['log_url'] = $log_url;
    M('admin_log')->add($add);
}