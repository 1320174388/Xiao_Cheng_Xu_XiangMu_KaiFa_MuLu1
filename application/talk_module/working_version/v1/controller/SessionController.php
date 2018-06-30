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
use app\talk_module\working_version\v1\service\SessionService;

class SessionController extends Controller
{
    /**
     * 名  称 : sessionInit()
     * 功  能 : 客服信息推送接口对接函数
     * 变  量 : --------------------------------------
     * 输  入 : $echoStr => '获取微信服务器发过来的echostr字符串';
     * 输  出 : $echoStr => '字符串' / false
     * 创  建 : 2018/06/29 16:23
     */
    private function valid()
    {
        // 获取传值
        $request = new Request;
        // 获取微信服务器发过来的echostr字符串
        $echoStr = $request->get('echostr');
        // 判断是不是自己需要的数据
        if((new SessionLibrary())->checkSignature()){
            echo $echoStr;
            exit;
        }
        // 返回false
        return false;
    }

    /**
     * 名  称 : sessionValue()
     * 功  能 : 客服推送信息接口数据处理
     * 变  量 : --------------------------------------
     * 输  入 : $postStr => '小程序发送的客服信息内容';
     * 输  出 : --------------------------------------
     * 创  建 : 2018/06/29 16:23
     */
    public function sessionValue()
    {
        // 客服推送接入 第一次接入打开注释
        // $this->valid();
        // 获取客服信息
        $postStr = file_get_contents("php://input");
        // 判断客服信息是否存在
        if (!empty($postStr)) return "success";
        // 处理客服信息,返回XML数据
        (new SessionService())->handlePostStr($postStr);
    }
}