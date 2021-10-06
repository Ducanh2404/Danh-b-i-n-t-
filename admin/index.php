 <?php 
      session_start();
      if(!isset($_SESSION['login_ok'])){
        header("Location:login.php");
      }
 ?> 
  <?php include ("partials/header.php") ?>
  <div class="row">
    <div class="col-md-12 bg-white">
    <div>
        <a href="themnhanvien.php"><button class="btn btn-success">Thêm</button></a>
    </div>
      <table class="table">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Mã NV</th>
      <th scope="col">Họ và tên</th>
      <th scope="col">Chức vụ</th>
      <th scope="col">Email</th>
      <th scope="col">Số di động</th>
      <th scope="col">Tên đơn vị</th>
    </tr>
  </thead>
  <tbody>
    <?php
          //lấy dữ liệu từ CSDL và để ra bảng (phần lặp lại)
          //bước 1:kết nối tời csdl(mysql)
          $conn = mysqli_connect('localhost','root','','dhtl');
          if(!$conn){
              die("Không thể kết nối,kiểm tra lại các tham số kết nối");
          }
          //bước 2 khai báo câu lệnh thực thi và thực hiện truy vấn
          $sql = "SELECT nv.manv, nv.tennv, nv.chucvu, nv.email, nv.sodidong, dv.tendv FROM db_nhanvien nv, db_donvi dv WHERE nv.madv = dv.madv";
          $result = mysqli_query($conn,$sql);

          //bước 3 xử lý kết quả trả về
          if(mysqli_num_rows($result) > 0){
              $i=1;
              while($row = mysqli_fetch_assoc($result)){
          
      ?>
      
      <tr>
      <th scope="row"><?php echo $i; ?> </th>
      <td><?php echo $row['manv']; ?> </td>
      <td><?php echo $row['tennv']; ?> </td>
      <td><?php echo $row['chucvu']; ?> </td>
      <td><?php echo $row['email']; ?> </td>
      <td><?php echo $row['sodidong']; ?> </td>
      <td><?php echo $row['tendv']; ?> </td>
      <td><a href="suaNhanVien.php?manv=<?php echo $row['manv']; ?>"><i class="fas fa-edit"></i></a></td>
      <td><a href="xoanhanvien.php?manv=<?php echo $row['manv']; ?>"><i class="fas fa-trash"></i></a></td>
      </tr>
      <?php
          $i++;
          }
      }
    ?>
  </tbody>
  </table>
  
    </div>
 
  </div>
  <?php include("partials/footer.php") ?>
  

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

  </body>
</html>