<?php
        session_start();
        $email      = $_POST['email'];
        $pass       = $_POST['pass'];
    // kết nối sql 
    $conn=(mysqli_connect('localhost','root','','dhtl'));
    if(!$conn){
        die("Kết nối thất bại");
    }
    //kiểm tra email đã tồn tại hay chưa
    $sql_1="SELECT * from db_nguoidung where email='$email'";
    $result_1=mysqli_query($conn,$sql_1);

    if(mysqli_num_rows($result_1)>0){
        $row=mysqli_fetch_assoc($result_1);
        $pass_saved=$row['matkhau'];

        if(password_verify($pass,$pass_saved)){
            // nếu đúng mật khẩu => chuyển sang trang admin
            $_SESSION['login_ok'] = $email;
            header("Location:index.php");
        }else{
            $response='failed_password';
            header("Location:login.php?response=$response");
        }
    }
    else{
        $response='failed_email';
        header("Location:login.php?response=$response");
    }
?>