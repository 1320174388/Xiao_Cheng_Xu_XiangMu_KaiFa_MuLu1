<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  SessionController.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/06/26 09:50
 *  文件描述 :  客户会话控制器
 *  历史记录 :  -----------------------
 */
namespace app\talk_module\working_version\v1\controller;
use think\Controller;
use think\Request;
use app\talk_module\working_version\v1\library\SessionLibrary;

class SessionController extends Controller
{
    /**
     * 名  称 : sessionInit()
     * 功  能 : 客服信息推送接口对接函数
     * 变  量 : --------------------------------------
     * 输  入 : --------------------------------------
     * 输  出 : --------------------------------------
     * 创  建 : 2018/06/29 16:23
     */
    private function valid()
    {
        echo (new Request)->get('echostr');
        exit;
        // 获取微信服务器发过来的echostr字符串
        $echoStr = (new Request)->get('echostr');
        // 判断是不是自己需要的数据
        if((new SessionLibrary())->checkSignature()){
            echo $echoStr;
            exit;
        }
    }

    /**
     * 名  称 : sessionValue()
     * 功  能 : 客服推送信息接口数据处理
     * 变  量 : --------------------------------------
     * 输  入 : --------------------------------------
     * 输  出 : --------------------------------------
     * 创  建 : 2018/06/29 16:23
     */
    public function sessionValue()
    {
        $this->valid();
        return 'false';
    }
}