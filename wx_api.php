<?php
/**
  * 微信公众号IP查询
  * 本地IP库查询：https://mkblog.cn/1951/
**/
define("TOKEN", "wechat"); //taken验证
$wechatObj = new wechatCallbackapiTest();

/*****************/
/** 验证时使用 **/
//$wechatObj->valid();
/** 验证完毕后使用 **/
//$wechatObj->responseMsg();
/*****************/

class wechatCallbackapiTest
{
	public function valid()
    {
        $echoStr = $_GET["echostr"];
        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        }
    }
    public function responseMsg()
    {
		$postStr = file_get_contents('php://input');
		if (!empty($postStr)){
                
              	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $fromUsername = $postObj->FromUserName;
                $toUsername = $postObj->ToUserName;
                $keyword = trim($postObj->Content);
                $time = time();
                $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>"; 
				//引入IP查询库
				require_once('IPQuery.class.php');
				$ip = new IPQuery();
				//判断IP / 域名
				if(preg_match("/((2(5[0-5]|[0-4]\d))|[0-1]?\d{1,2})(\.((2(5[0-5]|[0-4]\d))|[0-1]?\d{1,2})){3}/", $keyword, $matches)) 
                {
              		$msgType = "text";
              		$addr = $ip->query($keyword);
                	$contentStr = "IP：".$keyword."\n地址：".$addr['pos']."\n运营商：".$addr['isp'];
                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStr;
                } else if (preg_match("/^(?=^.{3,255}$)[a-zA-Z0-9][-a-zA-Z0-9]{0,62}(\.[a-zA-Z0-9][-a-zA-Z0-9]{0,62})+$/", $keyword, $matches)){
                	$msgType = "text";
                	$keyword=@gethostbyname($keyword);
              		$addr = $ip->query($keyword);
                	$contentStr = "IP：".$keyword."\n地址：".$addr['pos']."\n运营商：".$addr['isp'];
                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStr;
                }else{
                    $msgType = "text";
                    $contentStr = "目前只支持IP查询,回复IP地址或者域名来查询IP哟~";
                    $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                    echo $resultStr;
                }
        }else{
        	$msgType = "text";
            $contentStr = "233";
            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
            echo $resultStr;
        }
    }
	private function checkSignature()
	{
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];	
        		
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
		sort($tmpArr);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}
}

?>