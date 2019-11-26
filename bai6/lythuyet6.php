<?php
//vòng lặp switch case

$data='';
switch($data){
    case 'ok': echo 'đây là ok'; break;
    case '3': echo 'đây là số ba'; break;
    case 'hello': echo 'đây là hello'; break;
    case 'data': echo 'đây là data'; break;
    default: echo 'ko tìm thấy case nào phù hợp'; break;
}

include();
include_once();
require();
require_once();
// => đây là các hàm gọi file .php khác vào để thực hiện 1 hành động nào đó
// khi xảy ra lỗi include và include_once báo lỗi nhưng vẫn tiếp tục thực hiện hành động
// khi xảy ra lỗi require và require_once báo lỗi và dừng hành động
?>