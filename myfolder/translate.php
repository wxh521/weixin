<?php
/** 
 * 数据来源有道词典API
 */
function getTranslateInfo ($translate_content = '') {
    if (!$translate_content) {
        return '请输入要翻译的文本';
    }
    $youdao_api_key = '490603384';
    $youdao_keyfrom = 'zbfirst';
    $translate_content = urlencode($translate_content);
    $youdao_url = 'http://fanyi.youdao.com/openapi.do?keyfrom='.$youdao_keyfrom.'&key='.$youdao_api_key.'&type=data&doctype=json&version=1.1&q='.$translate_content;
    $output = getPage($youdao_url);
    $result_data =  json_decode($output);
    return $result_data;
}
