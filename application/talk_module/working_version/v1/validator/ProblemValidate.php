<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  ProblemValidate.php
 *  创 建 者 :  Shi Rui
 *  创建日期 :  2018/07/02 18:47
 *  文件描述 :  验证获取数据的逻辑
 *  历史记录 :  -----------------------
 */
namespace app\talk_module\working_version\v1\validator;
class ProblemValidate
{
    /**
     * 名  称 : replysVerification()
     * 功  能 : 处理用户提问信息函数
     * 变  量 : --------------------------------------
     * 输  入 : (Array) $data = [
     *     'peopleName'     => '留言人名称',
     *     'leavingTitle'   => '留言标题',
     *     'messageContent' => '留言内容',
     * ];
     * 输  出 : ['msg'=>'success','data'=>true]
     * 输  出 : ['msg'=>'error','data'=>'错误信息']
     * 创  建 : 2018/07/02 18:47
     */
    public function ProblemVerification($data)
    {
        // 判断是否为空
        if(!$data['peopleName'])     return returnDate('error','留言人名称为空');
        if(!$data['leavingTitle'])   return returnDate('error','留言标题为空');
        if(!$data['messageContent']) return returnDate('error','留言内容为空');

        // 判断名称长度是不是大于10个字符
        if(strlen($data['peopleName']) > 10)
            return returnDate('error','留言人名称太长');
        // 判断标题
        if(strlen($data['peopleName']) > 100)
            return returnDate('error','留言标题太长');
        //  判断内容
        if(strlen($data['messageContent'] > 2000))
            return returnDate('error','内容长度太大');
        // 返回正确格式
        return returnDate('success',true);
    }

    /**
     * 名  称 : ProblemsVerification()
     * 功  能 : 处理用户后期继续提问信息函数
     * 变  量 : --------------------------------------
     * 输  入 : (Array) $data = [
     *     'messageContent'  => '留言内容',
     * ];
     * 输  出 : ['msg'=>'success','data'=>true]
     * 输  出 : ['msg'=>'error','data'=>'错误信息']
     * 创  建 : 2018/07/02 18:47
     */
    public function ProblemsVerification($data)
    {
        // 判断内容是否为空
        if(!$data['messageContent']) return returnDate('error','留言内容为空');

        //  判断内容
        if(strlen($data['messageContent'] > 2000))
            return returnDate('error','内容长度太大');
        // 返回正确格式
        return returnDate('success',true);
    }
}