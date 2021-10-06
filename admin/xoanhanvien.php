<?php
$conn = mysqli_connect('localhost','root','','dhtl');
if (!$conn){
    die("Kết nối thất bại  .Kiểm tra lại các tham số    khai báo kết nối");
}
if(isset($_REQUEST['manv']) and $_REQUEST['manv']!=""){
$manv=$_GET['manv'];
$sql = "DELETE FROM db_nhanvien WHERE manv='$manv'";
if ($conn->query($sql) === TRUE) {
echo "Xoá thành công!";
} else {
echo "Error updating record: " . $conn->error;
}

$conn->close();
}
header("Location: /dhtl/admin");
?>