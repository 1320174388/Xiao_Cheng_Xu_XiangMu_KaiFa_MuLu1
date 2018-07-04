<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  PushInterface.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/06/16 13:09
 *  文件描述 :  获取、添加、修改、删除管理员信息
 *  历史记录 :  -----------------------
 */
namespace app\push_module\working_version\v1\dao;

interface PushInterface{

    /**
     * 名  称 : pushCreate()
     * 功  能 : 将formId保存到数据库
     * 输  入 : (String) $userToken => '用户标识';
     * 输  入 : (String) $formId    => '表单ID';
     * 创  建 : 2018/07/04 13:42
     */
    public function pushCreate($userToken,$formId);

    /**
     * 名  称 : pushSetDel()
     * 功  能 : 获取所有用户的的openId及formId
     * 创  建 : 2018/07/04 18:58
     */
    public function pushSetDel();

}
