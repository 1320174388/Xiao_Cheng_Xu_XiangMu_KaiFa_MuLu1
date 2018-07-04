<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  PushServer.php
 *  创 建 者 :  Qi Yun Hai
 *  创建日期 :  2018/07/04 16:40
 *  文件描述 :  批量发送模板消息逻辑
 *  历史记录 :  -----------------------
 */
namespace app\push_module\working_version\v1\service;
use app\push_module\working_version\v1\dao\PushDao;
class PushService
{
    /**
     * 名  称 : appFormId()
     * 功  能 : 将formId保存到数据库
     * 变  量 : --------------------------------------
     * 输  入 : (String) $userToken => '用户标识';
     * 输  入 : (String) $formId    => '表单ID';
     * 输  出 : ['msg'=>'success','data'=>true]
     * 创  建 : 2018/07/04 13:42
     */
    public function appFormId($userToken,$formId)
    {
        // 引入PushDao层
        $push = (new PushDao())->pushCreate($userToken,$formId);
        // 验证
        if($push['msg'=='error']) return returnData('error');
        // 返回数据格式
        return returnData('success',$push['data']);
    }
}