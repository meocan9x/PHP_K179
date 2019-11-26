<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="lythuyet.php?ten=Lê%20Văn%20Thành&tuoi=34&address=Hà%20Nội">Lê Văn Thành</a><br>
    <a href="lythuyet.php?ten=Nùi%20Thị%20Dun&tuoi=56&address=Quảng%20Trị">Nùi Thị Dun</a><br>
    <a href="lythuyet.php?ten=Saitou%20Hajime&tuoi=12&address=Sakai,%20Osaka">Saitou Hajime</a><br>
    <?php
        //phương thức GET
        //$_GET['tham_so'];
        //truyền tham số lên url: index.php?tham_so1=gia_tri1&tham_so2=gia_tri2&tham_so3=gia_tri3
        //hàm isset($bien); kiểm tra sự tồn tại của biến và trả về 2 giá trị true hoặc false

        /*
        if(isset($_GET['sbm'])){
            $email=$_GET['email'];
            $pass=$_GET['pass'];
            echo $email.'</br>'.$pass;
        }
        */
        //phương thức GET: ko cần form mà truyền trực tiếp vào url
        if(isset($_GET['ten'])&&isset($_GET['tuoi'])&&isset($_GET['address'])){
            echo $_GET['ten'].'</br>'.$_GET['tuoi'].'</br>'.$_GET['address'];
        }
    ?>

    <br>
    <br>
    <br>

    <?php
        //mảng: vòng lặp foreach
        //có 2 cách khai báo
        //$array=array(gia_tri1,gia_tri2,gia_tri3,.......);
        //$array=[gia_tri1,gia_tri2,gia_tri3,.......];

        //vd:
        $array=[1,2,'ba','tứ',true,5.1,'bàn','ghế'];
        echo '<pre>';
        var_dump($array);
        echo '<br/>'.'OR'.'<br/>';
        print_r($array);
        echo '<pre/>';
        echo '<br/>'.$array[4].'<br/>'; //kết quả ra "1" (vì là true)

        //gán $bien thanh $key, những giá trị không được gán key sẽ được đánh tự động từ 0 tới vô cùng
        $array=['một'=>1,2,'ba','tứ'=>'tứ',true,5.1,'bàn','ghế'];
        print_r($array);
        echo '<pre/>';
        /*kết quả:
                    Array
            (
                [một] => 1
                [0] => 2
                [1] => ba
                [tứ] => tứ
                [2] => 1
                [3] => 5.1
                [4] => bàn
                [5] => ghế
            )
        */

        foreach ($array as $key => $value) {
            echo $key.'<br/>'; //kết quả in ra $key
        }
        /* kết quả:
        một
        0
        1
        tứ
        2
        3
        4
        5
        */
        foreach ($array as $key) {
            echo $key.'<br/>'; //kết quả in ra $value
        }
        /* kq:
            1
            2
            ba
            tứ
            1
            5.1
            bàn
            ghế
        */
        foreach ($array as $value) {
            echo $value.'<br/>'; //kết quả in ra tất cả $value
        }
        foreach ($array as $value) {
            echo $key.'<br/>'; //kết quả in ra giá trị cuối cùng
        }
        /*kq:
            ghế
            ghế
            ghế
            ghế
            ghế
            ghế
            ghế
            ghế
        */
    ?>

<br>
<br>
<br>

    <?php
        //json
        //đọc file json
        $data_json=file_get_contents('data.json');
        //chuyển file json về dạng mảng
        $result_json=json_decode($data_json, true);
        foreach ($result_json as $key => $value) {
            echo $value.'<br/>';
        }
        //chuyển mảng vào json: dữ liệu cũ bị thay thế bằng dữ liệu mới
        $data_en_json=json_encode($result_json,JSON_UNESCAPED_UNICODE);
        //đặt vào json
        file_put_contents('data.json',$data_en_json);
    ?>
</body>
<!-- <form action="" method="GET">
        <input type="email" name="email">
        <input type="password" name="pass">
        <input type="submit" name="sbm">
    </form> -->

</html>