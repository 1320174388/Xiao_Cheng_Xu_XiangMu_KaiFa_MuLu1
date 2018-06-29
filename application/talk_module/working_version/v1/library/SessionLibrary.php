<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  SessionLibrary.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/06/29 17:05
 *  文件描述 :  处理消息推送接口对接函数
 *  历史记录 :  -----------------------
 */
namespace app\talk_module\working_version\v1\library;
use think\Request;

class SessionLibrary
{
    /**
     * 名  称 : checkSignature()
     * 功  能 : 客服信息推送接口对接函数
     * 变  量 : --------------------------------------
     * 输  入 : --------------------------------------
     * 输  出 : --------------------------------------
     * 创  建 : 2018/06/29 16:23
     */
    public function checkSignature()
    {
        // 获取开发者验证请求的数据
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce     = $_GET["nonce"];
        // 获取配置文件的Token值
        $token = config('v1_config.Token');
        // 处理成数组
        $tmpArr = array($token, $timestamp, $nonce);
        // 字典序排序
        sort($tmpArr, SORT_STRING);
        // 拆分成为字符串
        $tmpStr = implode( $tmpArr );
        // 加密
        $tmpStr = sha1( $tmpStr );
        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }
}