<?php

include $_SERVER['DOCUMENT_ROOT'].'/../myfolder/init.php';
include $_SERVER['DOCUMENT_ROOT'].'/../myfolder/function.php';

define("TOKEN", "zbhelper");
define("ACCESS_TOKEN", "A-4viwsZ8BuSZZ_7gbA59cbJlJ21jQyRZztG87yR9onH-l9Qt_YJUEq3PWF4JUD_QiWvtFxgBQF4Rm8bPXewig");
$wxObj = new weixinLifeHelper();
$wxObj->responseMsg();

class weixinLifeHelper {
    
    public function valid() {
        $echoStr = $_GET["echostr"];
        if($this->checkSignature()){
            echo $echoStr;
            exit;
        }
    }

    public function responseMsg() {
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
        if (!empty($postStr)){
                $keyword = trim($postObj->Content);
                mb_internal_encoding("UTF-8");
                $type = mb_substr($keyword, -2);
                if ($type == '天气'){
                    $response = $this->_weather($postObj);
                    echo $response;
                    exit;
                }
        }
        
        $fromUsername = $postObj->FromUserName;
        $toUsername = $postObj->ToUserName;
        $time = time();
        $textTpl =  "<xml>
                     <ToUserName><![CDATA[%s]]></ToUserName>
                     <FromUserName><![CDATA[%s]]></FromUserName>
                     <CreateTime>%s</CreateTime>
                     <MsgType><![CDATA[text]]></MsgType>
                     <Content><![CDATA[您输入的功能未识别]]></Content>
                     </xml>";
        $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time);
        echo $resultStr;
        exit;
    }
    
    private function _weather($postObj) {
        $keyword = trim($postObj->Content);
        $cityName = mb_substr($keyword, 0, -2);
        include $_SERVER['DOCUMENT_ROOT'].'/../myfolder/weather.php';
        $weathers = getWeatherInfo($cityName);
        $content = '<Articles>';
        foreach ($weathers as $weather) {
            $content .= '<item><Title>'.$weather['Title'].'</Title><Description>'.$weather['Description'].'</Description><PicUrl>'.$weather['PicUrl'].'</PicUrl><Url>'.$weather['Url'].'</Url></item>';
        }
        $content .= '</Articles>';
        $fromUsername = $postObj->FromUserName;
        $toUsername = $postObj->ToUserName;
        $time = time();
        $msgType = 'news';
        $articleCount = count($weathers);
        $textTpl = "<xml>
                    <ToUserName><![CDATA[%s]]></ToUserName>
                    <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[%s]]></MsgType>
                    <ArticleCount>%s</ArticleCount>
                    $content
                    </xml>";
        $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $articleCount);
        return $resultStr;
    }
		
    private function checkSignature() {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];	
        		
        $token = TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
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