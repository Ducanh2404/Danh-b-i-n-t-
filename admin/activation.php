<?php 
    session_start();
    $conn=mysqli_connect('localhost','root','','dhtl');
    if(!$conn){
        die("Không thể kết nối,kiểm tra lại các tham số kết nối");
    }
    if(isset($_GET['email']))
    //truy vấn lấy dữ liệu user có email
    $email=$_GET['email'];
    echo $_GET['activation'];
    $act=$_GET['activation'];

    $sql1= "SELECT * from db_nguoidung where email='$email'";
    $result1=mysqli_query($conn,$sql1);
    if(mysqli_num_rows($result1)==1)
        {
            $row= mysqli_fetch_assoc($result1);
            if($row['activation']==$act)
            {
                $sql2="UPDATE db_nguoidung SET user_level ='1' where email='$email' ";
                mysqli_query($conn,$sql2);
                echo "done";
            }
        }
?>