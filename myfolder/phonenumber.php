<?php
/** 
 * 数据来源http://tcc.taobao.com/cc/json/mobile_tel_segment.htm?tel=手机号
 */
function getPhoneInfo($phone_number) {
    if ($phone_number == '') {
        return '请输入手机号码';
    }
    $phone_url = 'http://tcc.taobao.com/cc/json/mobile_tel_segment.htm?tel='.$phone_number;
    $output = getPage($phone_url);
    $output = iconv('gbk', 'utf-8', $output);

    preg_match("/province:'(.*)'/i", $output, $matches);
    $province = $matches[1];
    preg_match("/catName:'(.*)'/i", $output, $matches);
    $catName = $matches[1];

//    $result_data =  json_decode($output);
    $result_data = $province.$catName;
    return $result_data;
}