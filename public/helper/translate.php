<?php

if (count($_POST)) {
    $youdao_api_key = '490603384';
    $youdao_keyfrom = 'zbfirst';
    $translate_content = urlencode($_POST['translate_content']);
    $youdao_url = 'http://fanyi.youdao.com/openapi.do?keyfrom='.$youdao_keyfrom.'&key='.$youdao_api_key.'&type=data&doctype=json&version=1.1&q='.$translate_content;
    
}
