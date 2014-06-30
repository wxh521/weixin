<?php
/** 
 * 数据来源http://www.aikuaidi.cn
 */
function getDeliveryInfo($delivery_name, $delivery_number) {
    $delivery_info = array();
    if ($delivery_name == '' || $delivery_number == '') {
        return '快递名称与快递单号缺一不可！';
    }
    if ($delivery_name == 'shunfeng') {
        $delivery_url = 'http://www.sf-express.com/sf-service-web/service/bills/'.$delivery_number.'/routes?app=bill&lang=sc&region=cn';
        $output = getPage($delivery_url);
        $result_data =  json_decode($output);
        $data_array= $result_data[0]->{'routes'};
        foreach ($data_array as  $key =>$data) { 
            $delivery_info[$key] = (object) array('time'=>$data->{'scanDateTime'}, 'content'=>$data->{'remark'});
        }
    } else {
        $postdata = array('id'=>$delivery_name, 'order'=>$delivery_number);
        $output = getPage('http://www.aikuaidi.cn/query', 'post', $postdata);
        $result_data =  json_decode($output);
        $delivery_info = $result_data->{'data'};
        if (!count($delivery_info)) {
            $aikuaidi_key = '2e848e76b56940168a7bc735ac771c35';
            $aikuaidi_url = 'http://www.aikuaidi.cn/rest/?key='.$aikuaidi_key.'&order='.$delivery_number.'&id='.$delivery_name.'&ord=desc';
            $output = getPage($aikuaidi_url);
            $result_data =  json_decode($output);
            $delivery_info = $result_data->{'data'};
        }
    }
    return $delivery_info;
}