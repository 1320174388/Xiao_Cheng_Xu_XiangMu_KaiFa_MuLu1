<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  SessionService.php
 *  创 建 者 :  Shi Guang　Yu
 *  创建日期 :  2018/06/30 09:53
 *  文件描述 :  处理客服信息逻辑
 *  历史记录 :  -----------------------
 */
namespace app\talk_module\working_version\v1\service;

class SessionService
{
    /**
     * 名  称 : handlePostStr()
     * 功  能 : 处理客服信息
     * 变  量 : --------------------------------------
     * 输  入 : $postStr => '小程序发送的客服信息内容';
     * 输  出 : ['msg'=>'success','data'=>'返回的XML数据']
     * 创  建 : 2018/06/29 16:23
     */
    public function handlePostStr($postStr)
    {
        // 处理客服信息
        $postObj = simplexml_load_string(
            $postStr,
            'SimpleXMLElement',
            LIBXML_NOCDATA
        );
        // 打印数据
        $this->file_put_obj_data($postObj);
        // 处理XML数据
        $XmlTpl = "<xml>
                     <ToUserName>
                        <![CDATA[".$postObj->FromUserName."]]>
                     </ToUserName>
                     <FromUserName>
                        <![CDATA[".$postObj->ToUserName."]]>
                     </FromUserName><CreateTime>".time()."</CreateTime>
                     <MsgType>
                        <![CDATA[transfer_customer_service]]>
                     </MsgType>
                   </xml>";
        // 返回数据
        echo $XmlTpl; exit;
    }

    /**
     * 名  称 : file_put_postObj()
     * 功  能 : 打印客服信息
     * 变  量 : --------------------------------------
     * 输  入 : --------------------------------------
     * 输  出 : --------------------------------------
     * 创  建 : 2018/06/29 16:23
     */
    private function file_put_obj_data($data,$strnbsp = '&nbsp;')
    {
        $str = '';
        foreach($data as $k => $v){
            $str .= $strnbsp.$k.'===='.$v.'<br>';
            if(is_array($v)){
                $str .= $this->file_put_obj_data($v,$strnbsp.'&nbsp;');
            }
        }
        file_put_contents('./text/123.html',"<br>".$str);
        return $str;
    }
}