<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bootstrap Project 2019</title>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/all.css"/>
<link rel="stylesheet" href="css/style.css"/>
<script src="js/jquery-3.3.1.js"></script>
<script src="js/bootstrap.js"></script>
</head>
<body>
<?php
//đọc file json
$data_json = file_get_contents('data.json');
//chuyển sang mảng
$arr_json = json_decode($data_json, true);
//kiểm tra form
if(isset($_POST['sbm'])){
    $book = $_POST['book'];
    $file = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $error = $_FILES['file']['error'];
    if($error > 0){
        echo 'File upload bị lỗi.';
    }else{
        move_uploaded_file($tmp_name, 'upload/'.$file);
    }
    //update json
    $arr_json[$book]=$file; //gán $file cho $value với $key là $book của json
    $data_en_json=json_encode($arr_json,JSON_UNESCAPED_UNICODE);
    //đặt vào json
    file_put_contents('data.json',$data_en_json);
}

?>
<div id="header" class="fixed-top">
	<div class="container">
		<div class="row">
        	<div id="logo" class="col-lg-5 col-md-5 col-sm-12">
            	<a href="index.php">vietpro academy</a>
            </div>
            <div id="menu" class="col-lg-7 col-md-7 col-sm-12"><a data-toggle="modal" data-target="#myModal" href="#">+ Thêm sách vào thư viện</a></div>
        </div>
	</div>
</div>
<div id="body">
	<div id="main" class="container">  	
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            THƯ VIỆN SÁCH ONLINE
                            <small>Một ứng dụng nhỏ trong lộ trình khóa học Full Stack PHP.</small>
                        </h2>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <th width="10%">#</th>
                                    <th width="60%">TÊN SÁCH</th>
                                    <th width="15%" class="text-center">ĐỌC THỬ</th>
                                    <th width="15%" class="text-center">TẢI VỀ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=1;
                                foreach ($arr_json as $book => $file) {
                                ?>
                                <tr class="active">
                                    <th scope="row"><?php echo $i++;?></th>
                                    <td><?php echo $book; ?></td>
                                    <td class="text-center"><a href="#"><i class="fas fa-eye"></i></a></td>
                                    <td class="text-center"><a href="#"><i class="fa fa-download"></i></a></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="footer">
	<div class="container">
    	<p class="text-center">© 2019 <a href="https:vietpro.edu.vn" target="_blank">Vietpro Academy</a>. <b>Version:</b> 4.0</p>
    </div>
</div>




<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Thêm sách vào thư viện</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        
       <form action="#" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="name">Tên sách:</label>
            <input type="text" class="form-control" id="name" name="book">
          </div>
          <div class="form-group">
            <label for="fileupload">Tải sách lên:</label>
            <input type="file" class="form-control-file border" id="fileupload" name="file">
          </div>
          <button id="add-book" type="submit" class="btn btn-primary" name="sbm">Thêm sách</button>
        </form> 
        
      </div>

    </div>
  </div>
</div>


<?php
/*// Get the contents of the JSON file 
$strJsonFileContents = file_get_contents("data.json");
// Convert to array 
$array = json_decode($strJsonFileContents, true);
var_dump($array); // show contents*/
?>



</body>
</html>
