<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  PushController.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/07/04 11:45
 *  文件描述 :  推送信息控制器
 *  历史记录 :  -----------------------
 */
namespace app\push_module\working_version\v1\controller;
use think\Controller;
use think\Request;
use app\push_module\working_version\v1\service\PushService;

class PushController extends Controller
{
    /**
     * 名  称 : pushInit()
     * 功  能 : 收集formId保存到数据库
     * 变  量 : --------------------------------------
     * 输  入 : (String) $userToken => '用户标识';
     * 输  入 : (String) $formId    => '表单ID';
     * 输  出 : {"errNum":0,"retMsg":"收集成功","retData":true}
     * 创  建 : 2018/07/04 13:42
     */
    public function pushInit(Request $request)
    {
        // 获取数据
        $userToken = $request->post('userToken');
        $formId    = $request->post('formId');
        // 引入Service层代码
        $res = (new PushService())->appFormId($userToken,$formId);
        // 验证数据是否写入成功
        if($res['msg']=='error') return returnResponse(1,'写入失败');
        // 返回数据
        return returnResponse(0,'写入成功',true);
    }
}