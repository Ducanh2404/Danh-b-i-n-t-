<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'sendEmailv1/Exception.php';
    require 'sendEmailv1/PHPMailer.php';
    require 'sendEmailv1/SMTP.php';

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    //lưu giá trị vào các biến
    $username  = $_POST['username'];
    $email     = $_POST['email'];
    $pass1     = $_POST['pass1'];
    $pass2     = $_POST['pass2'];
    //quy trình 3(4) bước:
    //bước 1 kết nối sql
    $conn=mysqli_connect('localhost','root','','dhtl');
    if(!$conn){
        die("Không thể kết nối,kiểm tra lại các tham số kết nối");
    }
    //bước 2 thực hiến truy vấn
    //2.1 kiểm tra email trùng hay k
    $sql_1= "SELECT * FROM db_nguoidung WHERE email='$email'";
    $result_1=mysqli_query($conn,$sql_1);

    if(mysqli_num_rows($result_1) >0){
        $value='existed';
        header("Location:register.php?response=$value");
    }else{
        //2.2 không trùng email mới lưu
        $pass_hash= password_hash($pass1,PASSWORD_DEFAULT);
        $sql_2="INSERT into db_nguoidung (tendangnhap,email,matkhau) VALUES ('$username','$email','$pass_hash')";
        $result_2=mysqli_query($conn,$sql_2);

        if($result_2>0){
            $value='successfully';
            $mail = new PHPMailer;
            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;// Enable verbose debug output
                $mail->isSMTP();// gửi mail SMTP
                $mail->Host = 'smtp.gmail.com';// Set the SMTP server to send through
                $mail->SMTPAuth = true;// Enable SMTP authentication
                $mail->Username = 'tranducanh2404@gmail.com';// SMTP username
                $mail->Password = 'gjjanuwbzuyxhuac'; // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                $mail->Port = 587; // TCP port to connect to
                $mail->CharSet = 'UTF-8';
                //Recipients
                $mail->setFrom('tranducanh2404@gmail.com', 'Kích hoạt tài khoản');
            
                $mail->addReplyTo('tranducanh2404@gmail@gmail.com', 'Kích hoạt tài khoản');
                  
                $mail->addAddress($email); // Add a recipient
                
                // Attachments
                // $mail->addAttachment('pdf/XTT/'.$data[11].'.pdf', $data[11].'_1.pdf'); // Add attachments
                //$mail->addAttachment('pdf/Giay_bao_mat_sau.pdf'); // Optional name
            
                // Content
                $mail->isHTML(true);   // Set email format to HTML
                $tieude = '[Đăng kí tk] Kích hoạt tài khoản';
                $mail->Subject = $tieude;
                
                // Mail body content 
                $bodyContent = '<p>Thân gửi Tân sinh viên </h1>'.$username; 
                $bodyContent .= '<p>Trường Đại học Thủy lợi xin chúc mừng Em đã trở thành Tân sinh viên ngành <b>Hệ thống thông tin</b> của Khoa Công nghệ thông tin. </p>'; 
                $bodyContent .= '<p>Trong các ngày 08,09/9/2021 Nhà trường đã gửi Giấy báo nhập học tới địa chỉ của Em khi đăng ký xét tuyển trực tuyến. Hiện tại, dịch COVID-19 đang diễn biến phức tạp nên Nhà trường gửi bổ sung Giấy báo nhập học (bản pdf đính kèm) để hoàn tất các thủ tục tại địa phương (nếu cần).</p>'; 
                $bodyContent .= '<p>Mọi thắc mắc xin liên hệ Phòng Đào tạo – Trường Đại học Thủy lợi, Số điện thoại <b>0243.563.1537</b>, Email: <b>tuyensinh@tlu.edu.vn </b></p>'; 
                $bodyContent .= '<p>Một lần nữa, Trường Đại học Thủy lợi xin gửi tới Em và gia đình lời chúc mừng, chúc sức khỏe bình an, hạnh phúc.</p>'; 
                $bodyContent .= '<p>Chú ý: Văn phòng Khoa Công nghệ thông tin sẽ liên hệ trực tiếp bằng điện thoại đến từng em để hướng dẫn đăng ký chương trình Việt-Nhật, Việt-Anh hoặc Aptech.</p>';
                $bodyContent .= '<p><b>Thân mến!</b></p>';
                
                $mail->Body = $bodyContent;
                // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                if($mail->send()){
                    echo 'Thư đã được gửi đi';
                }else{
                    echo 'Lỗi. Thư chưa gửi được';
                }            
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            header("Location:register.php?response=$value"); 
        }
    }
?>