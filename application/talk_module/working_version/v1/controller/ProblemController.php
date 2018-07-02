<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  ProblemController.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/07/02 11:43
 *  文件描述 :  用户提问消息处理控制器
 *  历史记录 :  -----------------------
 */
namespace app\talk_module\working_version\v1\controller;
use think\Controller;
use think\Request;
use app\talk_module\working_version\v1\service\ProblemService;

class ProblemController extends Controller
{
    /**
     * 名  称 : problemValue()
     * 功  能 : 处理用户提问信息函数
     * 变  量 : -----------------------------
     * 输  入 : (string) $peopleName     => '留言人名称';
     * 输  入 : (string) $peopleSex      => '留言人性别';
     * 输  入 : (string) $leavingTitle   => '留言标题';
     * 输  入 : (string) $messageContent => '留言内容';
     * 输  出 : {"errNum":0,"retMsg":"提问成功","retData":true}
     * 创  建 : 2018/07/02 11:43
     */
    public function problemValue(Request $request,$data=[])
    {
        // 获取所有传值数据s
        $data['peopleName']     = $request->post('peopleName');
        $data['peopleSex']      = $request->post('peopleSex');
        $data['leavingTitle']   = $request->post('leavingTitle');
        $data['messageContent'] = $request->post('messageContent');
        // 引入service层代码
        $res = (new ProblemService())->postValue($data);
        // 验证数据
        if($res['msg']=='error') returnResponse(1,$res['data']);
        // 返回成功数据
        return returnResponse(1,'提问成功',$res['data']);
    }
}