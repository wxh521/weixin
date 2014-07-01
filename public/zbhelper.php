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
                //天气预报部分
                $type = mb_substr($keyword, -2);
                if ($type == '天气'){
                    $response = $this->_weatherInfo($postObj);
                    echo $response;
                    exit;
                }
                //快递查询部分
                $delivery = array('jingdong'=>'京东', 'dhl'=>'DHL', 'ems'=>'EMS', 'ups'=>'UPS', 'rufengda'=>'如风达', 'shentong'=>'申通', 'shunfeng'=>'顺丰', 'yuantong'=>'圆通', 'tiantian'=>'天天', 'yunda'=>'韵达', 'zhongtong'=>'中通', 'zjs'=>'宅急送');
                $type = mb_ereg_replace('[0-9]+', '', $keyword);
                $whichDelivery = array_search ($type,  $delivery);
                if ($whichDelivery !== false) {
                    $response = $this->_deliveryInfo($whichDelivery, $postObj, $delivery);
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
    
    private function _weatherInfo($postObj) {
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
    
    private function _deliveryInfo($whichDelivery, $postObj, $delivery) {
        $keyword = trim($postObj->Content);
        $delivery_number = mb_ereg_replace($delivery[$whichDelivery], '', $keyword);
        include $_SERVER['DOCUMENT_ROOT'].'/../myfolder/delivery.php';
        $delivery_info = getDeliveryInfo($whichDelivery, $delivery_number);
        $content = '<Articles>';
        if (is_array($delivery_info)) {
            $delivery_info = array_reverse($delivery_info);
            $delivery_info = array_slice($delivery_info, 0, 8);
            if (count($delivery_info)) {
                $content .= '<item><Title><![CDATA['.$delivery[$whichDelivery].'快递]]></Title><Description><![CDATA[]]></Description><PicUrl><![CDATA[]]></PicUrl><Url><![CDATA[]]></Url></item>';
                foreach ($delivery_info as $info) {
                    $time = date('m/d H:i', strtotime($info->{'time'}));
                    $delivery_content = preg_replace ('/<.*?>/i',  '' ,  $info->{'content'} );
                    $content .= '<item><Title><![CDATA['.$time.'     '.$delivery_content.']]></Title><Description><![CDATA[]]></Description><PicUrl><![CDATA[]]></PicUrl><Url><![CDATA[]]></Url></item>';
                }
            } else {
                $content .= '<item><Title><![CDATA[没有查到您的快递信息]]></Title><Description><![CDATA[]]></Description><PicUrl><![CDATA[]]></PicUrl><Url><![CDATA[]]></Url></item>';
            }
        } else {
            $content .= '<item><Title><![CDATA[请输入要查询的快递单号]]></Title><Description><![CDATA[]]></Description><PicUrl><![CDATA[]]></PicUrl><Url><![CDATA[]]></Url></item>';
        }
        $content .= '</Articles>';
        $fromUsername = $postObj->FromUserName;
        $toUsername = $postObj->ToUserName;
        $time = time();
        $msgType = 'news';
        $articleCount = count($delivery_info);
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