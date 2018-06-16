<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  RightController.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/06/15 18:22
 *  文件描述 :  用户登录控制器
 *  历史记录 :  -----------------------
 */
namespace app\right_module\working_version\v3\controller;
use think\Controller;
use think\Request;
use app\right_module\working_version\v3\service\RightService;

class RightController extends Controller
{

    /**
     * 名  称 : applyList()
     * 功  能 : 获取管理员申请列表数据
     * 变  量 : --------------------------------------
     * 输  入 : --------------------------------------
     * 输  出 : {"errNum":0,"retMsg":"登录成功","retData":{"token":"用户标识"}}
     * 输  出 : {"errNum":1,"retMsg":"请检查Code是否失效","retData":false}
     * 输  出 : {"errNum":1,"retMsg":"登录失败","retData":false}
     * 创  建 : 2018/06/16 21:18
     */
    public function applyList()
    {
        // 引入逻辑代码，获取管理员信息
        $res = (new RightService())->applyDataList();
    }

    /**
     * 名  称 : applyInit()
     * 功  能 : 执行用户申请管理员操作
     * 变  量 : --------------------------------------
     * 输  入 : (string) $token => '用户标识';
     * 输  入 : (string) $name  => '用户名称';
     * 输  入 : (string) $phone => '用户电话';
     * 输  出 : {"errNum":0,"retMsg":"登录成功","retData":{"token":"用户标识"}}
     * 输  出 : {"errNum":1,"retMsg":"请检查Code是否失效","retData":false}
     * 输  出 : {"errNum":1,"retMsg":"登录失败","retData":false}
     * 创  建 : 2018/06/16 09:43
     */
    public function applyInit(Request $request)
    {
        // 获取前端提交的用户申请数据
        if($request->post('userToken')){
            $token = $request->post('userToken');
        }else{
            $token = '';
        }
        $name  = $request->post('applyName');
        $phone = $request->post('applyPhone');

        // 引入逻辑代码，执行用户申请操作
        $res = (new RightService())->rightApply($token,$name,$phone);

        // 判断用户是否申请成功
        if($res['msg']=='error'){
            return returnResponse(1,'已申请管理员');
        }
        if($res['msg']=='error'){
            return returnResponse(2,'申请失败');
        }

        // 返回接口响应数据
        return returnResponse(0,'申请成功',$res['data']);
    }

    /**
     * 名  称 : rightInit()
     * 功  能 : 执行用户申请管理员操作
     * 变  量 : --------------------------------------
     * 输  入 : (string) $token => '用户标识';
     * 输  入 : (string) $name  => '用户名称';
     * 输  入 : (string) $phone => '用户电话';
     * 输  出 : {"errNum":0,"retMsg":"登录成功","retData":{"token":"用户标识"}}
     * 输  出 : {"errNum":1,"retMsg":"请检查Code是否失效","retData":false}
     * 输  出 : {"errNum":1,"retMsg":"登录失败","retData":false}
     * 创  建 : 2018/06/16 09:43
     */
}