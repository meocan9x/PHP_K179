<?php
$file=$_GET['file'];
//b1: mở file
$file_path='upload/'.$file;
//thông báo tải file:
// header("Content-Disposition: attachment; filename=$file"); //tải xuống
//b3: trình duyệt sẽ trả về định dạng files
header("Content-Type: application/pdf");
//b4: đọc file
readfile($file_path);
?>