<?php
/** 
 * 数据来源百度气象
 */
function getWeatherInfo($cityName) {
    if (!$cityName) {
        return array(array('Title' =>'<![CDATA[发送城市+天气，例如"大连天气"]]>', 'Description' =>'<![CDATA[]]>', 'PicUrl' =>'<![CDATA[]]>', 'Url' =>'<![CDATA[]]>'));
    }
    $weatherUrl = 'http://api.map.baidu.com/telematics/v3/weather?location='.urlencode($cityName).'&output=json&ak=0PhtDXNA0LuEtMGKufS2dZ5p';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $weatherUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    $result = json_decode($output, true);
    if ($result['error'] != 0){
        return array(array('Title'=>'<![CDATA[没有查询到你输入的天气信息]]>', 'Description' =>'<![CDATA[]]>', 'PicUrl' =>'<![CDATA[]]>', 'Url' =>'<![CDATA[]]>'));
    }
    $curHour = (int)date('H', time());
    $weather = $result['results'][0];
    $weatherArray[] = array('Title' =>'<![CDATA['.$weather['currentCity'].'天气预报]]>', 'Description' =>'<![CDATA[]]>', 'PicUrl' =>'<![CDATA[]]>', 'Url' =>'<![CDATA[]]>');
    $weatherDataCount = count($weather['weather_data']);
    $isFirst = true;
    foreach ($weather['weather_data'] as $value) {
        if (!$isFirst) {
            $weatherPic = $value['dayPictureUrl'];
        } else {
            $weatherPic = (($curHour >= 6) && ($curHour < 18)) ? '<![CDATA['.$value['dayPictureUrl'].']]>' : '<![CDATA['.$value['nightPictureUrl'].']]>';
        }
        
        $weatherArray[] = array('Title'=>'<![CDATA['.$value['date']."\n".$value['weather']." ".$value['wind']." ".$value['temperature'].']]>',
                                'Description'=>'<![CDATA[]]>', 
                                'PicUrl'=>$weatherPic, 
                                'Url'=>'<![CDATA[]]>');
        $isFirst = false;
    }
    return $weatherArray;
}