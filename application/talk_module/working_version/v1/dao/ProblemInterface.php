<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  ProblemInterface.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/07/02 14:29
 *  文件描述 :  用户提问信息处理接口
 *  历史记录 :  -----------------------
 */
namespace app\talk_module\working_version\v1\dao;

interface ProblemInterface
{
    /**
     * 名  称 : replySelect()
     * 功  能 : 声明：获取单个或所有自动回复数据
     * 输  入 : (Array) $data = [
     *     'peopleName'     => '留言人名称',
     *     'peopleSex'      => '留言人性别',
     *     'leavingTitle'   => '留言标题',
     *     'messageContent' => '留言内容',
     * ];
     * 创  建 : 2018/07/05 09:15
     */
    public function problemCreate($data);
}