<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  ReplysController.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/06/26 09:50
 *  文件描述 :  自动回复信息控制器
 *  历史记录 :  -----------------------
 */
namespace app\talk_module\working_version\v1\controller;
use think\Controller;
use think\Request;
use app\talk_module\working_version\v1\library\ReplysLibrary;
use app\talk_module\working_version\v1\service\ReplysService;

class ReplysController extends Controller
{
    /**
     * 名  称 : replysValue()
     * 功  能 : 获取回复信息接口
     * 变  量 : --------------------------------------
     * 输  入 : $sessionIndex => '回复信息主键';
     * 输  出 : --------------------------------------
     * 创  建 : 2018/06/30 21:26
     */
    public function replysValue(Request $request)
    {
        // 获取回复信息
        $sessionIndex = $request->get('sessionIndex');
        // 引入Service层处理逻辑
        $res = (new ReplysService())->getReplys($sessionIndex);
        // 验证返回数据
        if($res['msg']=='error') return returnResponse(1,'没有这条回复信息');
        // 返回数据
        return returnResponse(0,'请求成功',$res['data']);
    }

    /**
     * 名  称 : replysAdd()
     * 功  能 : 添加自动回复信息接口
     * 变  量 : --------------------------------------
     * 输  入 : --------------------------------------
     * 输  出 : --------------------------------------
     * 创  建 : 2018/06/30 21:26
     */
    public function replysAdd()
    {
        // 添加自动回复信息接口
    }

    /**
     * 名  称 : replysList()
     * 功  能 : 获取所有自动回复信息接口
     * 变  量 : --------------------------------------
     * 输  入 : --------------------------------------
     * 输  出 : --------------------------------------
     * 创  建 : 2018/06/30 21:26
     */
    public function replysList()
    {
        // 获取所有自动回复信息接口
    }

    /**
     * 名  称 : replysEdit()
     * 功  能 : 修改自动回复信息接口
     * 变  量 : --------------------------------------
     * 输  入 : --------------------------------------
     * 输  出 : --------------------------------------
     * 创  建 : 2018/06/30 21:26
     */
    public function replysEdit()
    {
        // 修改自动回复信息接口
    }

    /**
     * 名  称 : replysDel()
     * 功  能 : 删除自动回复信息接口
     * 变  量 : --------------------------------------
     * 输  入 : --------------------------------------
     * 输  出 : --------------------------------------
     * 创  建 : 2018/06/30 21:26
     */
    public function replysDel()
    {
        // 删除自动回复信息接口
    }
}