<?php
/** 
 * 数据来源http://www.eboic.com/api/bet/
 */
function getLotteryInfo($lottery_name) {
    if ($lottery_name == '') {
        return '彩票名称不能为空！';
    }
    $lottery_url = 'http://f.eboic.com/?c='.$lottery_name;
    $output = getPage($lottery_url);
    $result_data = json_decode($output);
    return $result_data;
}