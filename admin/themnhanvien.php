<?php include ('partials/header.php') ?>
<form action="" method="POST">
  <div class="form-group row">
      <label for="txtmanv" class="col-sm-1 col-form-label">Mã nhân viên</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" name="manv" id="manv" placeholder="VD:1,2,3,....">
      </div>
  </div>
  <div class="form-group row">
      <label for="txthoten" class="col-sm-1 col-form-label">Họ và tên</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" id="hoten" name="hoten" placeholder="VD:Nguyễn Văn A">
      </div>
  </div>
  <div class="form-group row">
      <label for="txtchucvu" class="col-sm-1 col-form-label">Chức vụ</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" id="chucvu" name="chucvu" placeholder="VD:Trưởng khoa">
      </div>
  </div>
  <div class="form-group row">
      <label for="txtmayban" class="col-sm-1 col-form-label">Máy bàn</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" id="mayban" name="mayban" placeholder="VD:12345678">
      </div>
  </div>
  <div class="form-group row">
      <label for="txtemail" class="col-sm-1 col-form-label">email</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" id="email" name="email" placeholder="VD:195106xxx@e.tlu.edu.vn">
      </div>
  </div>
  <div class="form-group row">
      <label for="inputPassword" class="col-sm-1 col-form-label">Số di động</label>
      <div class="col-sm-3">
        <input type="tel" class="form-control" id="sdt" name="sdt" placeholder="VD:0985xxxxxx">
      </div>
  </div>
<div class="row mb-3">
  <label for ="txtMaDV" class="col-sm-1 col-form-label" >Tên đơn vị</label>
  <div class="col-sm-3 mt-2">
  <select name="sltMaDV" id="sltMaDV">
      <option value="7">Khoa CNTT</option>
      <option value="8">Khoa Kinh tế</option>
      <option value="9">Khoa Cơ khí</option>
  </select>
  </div>
</div>
<button type="submit" name="submit" class="btn btn-success mb-3">Thêm<i class="far fa-plus-square"></i></button>
</form>
<?php
  //kiểm tra người dùng đã ấn thêm hay chưa
  if(isset($_POST['submit'])){
  //lấy giá trị trên form và lưu vào các biến
  $manv       =$_POST['manv'];
  $tennv      =$_POST['hoten'];
  $chucvu     =$_POST['chucvu'];
  $mayban     =$_POST['mayban'];
  $email      =$_POST['email'];
  $sodidong   =$_POST['sdt'];
  $madv       =$_POST['sltMaDV'];
  //thực hiện quy trình 3 bước
  //Bước 1: Kết nối DBS
  $conn = mysqli_connect('localhost','root','','dhtl');
  if(!$conn){
      die("Không thể kết nối,kiểm tra lại các tham số kết nối");
  }
  //Bước 2 : khai báo truy vấn
  $sql ="INSERT INTO db_nhanvien(manv,tennv,chucvu,mayban,email,sodidong,madv) VALUES('$manv','$tennv','$chucvu','$mayban','$email','$sodidong','$madv')";
  if(mysqli_query($conn,$sql)==TRUE){
    echo "Thêm thành công";
    header("Location:index.php");
  }else{
    echo "Chưa thêm được .....";
  }
  //Bước 3 :Đóng kết nối
  mysqli_close($conn);
  } 
  
?>

<?php include("partials/footer.php") ?>