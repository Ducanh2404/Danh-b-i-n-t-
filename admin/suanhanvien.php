 <?php include("partials/header.php") ?>
 <?php
    $conn=(mysqli_connect('localhost','root','','dhtl'));
    if(!$conn){
        die("Kết nối thất bại");
    }
?>
<main>
    <?php
    $manv = $_GET['manv'];
    $query = mysqli_query($conn, "select * from `db_nhanvien` where manv='$manv'");
    $row = mysqli_fetch_assoc($query);
    ?>
    <div class="container-fluid !direction !spacing">
        <form method="POST" class="form">
            <h2>Sửa thành viên</h2>
            <label>Họ và tên: </label><input type="text" value="<?php echo $row['tennv']; ?>" name="tennv"><br>
            <label>Chức vụ: </label> <input type="text" value="<?php echo $row['chucvu']; ?>" name="chucvu"><br>
            <label>Email:   </label> <input type="text" value="<?php echo $row['email']; ?>" name="email"><br>
            <label>Phone:   </label>  <input type="text" value="<?php echo $row['sodidong']; ?>" name="phone"><br>
            <input type="submit" value="sửa" name="update_user">
            <?php

            if (isset($_POST['update_user'])) {
                $manv = $_GET['manv'];
                $tennv = $_POST['tennv'];
                $chucvu = $_POST['chucvu'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                // Create connection
                $conn = new mysqli("localhost", "root", "", "dhtl");
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "UPDATE `db_nhanvien` SET tennv='$tennv',chucvu = '$chucvu', email='$email', sodidong='$phone' WHERE manv='$manv'";

                if ($conn->query($sql) === TRUE) {
                    echo "Record updated successfully";
                } else {
                    echo "Error updating record: " . $conn->error;
                }

                $conn->close();
                header("Location:index.php");
            }
            ?>

        </form>
    </div>

</main>
 <?php include("partials/footer.php")?>