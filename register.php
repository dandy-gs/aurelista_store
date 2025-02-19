<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();
if (isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: ./index.html");
    die();
}

//Load Composer's autoloader
require './vendor/autoload.php';

include './config.php';
$msg = "";

if (isset($_POST['submit'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $sandi = mysqli_real_escape_string($conn, md5($_POST['sandi']));
    $konfirmasi_sandi = mysqli_real_escape_string($conn, md5($_POST['konfirmasi_sandi']));
    $kode = mysqli_real_escape_string($conn, md5(rand()));

    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE email='{$email}'")) > 0) {
        $msg = "<div class='alert alert-danger'>{$email} - Email ini telah digunakan.</div>";
    } else {
        if ($sandi === $konfirmasi_sandi) {
            $sql = "INSERT INTO users (nama, email, sandi, kode) VALUES ('{$nama}', '{$email}', '{$sandi}', '{$kode}')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "<div style='display: none;'>";
                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'eztrazade@gmail.com';                     //SMTP username
                    $mail->Password   = 'qnhiptqehbwelfmi';                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    //Recipients
                    $mail->setFrom('eztrazade@gmail.com');
                    $mail->addAddress($email);

                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'no reply';
                    $mail->Body    = 'Berikut link verifikasi <b><a href="http://localhost/aurellista/?verification=' . $kode . '">http://localhost/login/?verification=' . $kode . '</a></b>';

                    $mail->send();
                    echo 'Pesan telah terkirim ke alamat email anda';
                } catch (Exception $e) {
                    echo "Pesan gagal dikirim, pastikan alamat email benar. Mailer Error: {$mail->ErrorInfo}";
                }
                echo "</div>";
                $msg = "<div class='alert alert-info'>Kami telah mengirim link verifikasi pada email anda.</div>";
            } else {
                $msg = "<div class='alert alert-danger'>Ada sesuatu yang salah.</div>";
            }
        } else {
            $msg = "<div class='alert alert-danger'>Password dan Konfirmasi Password tidak sama</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Register Aurellista</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Login Form" />
    <!-- //Meta tag Keywords -->

    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!--/Style-CSS -->
    <link rel="stylesheet" href="./admin/css/style.css" type="text/css" media="all" />
    <!--//Style-CSS -->

    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>

</head>

<body>

    <!-- form section start -->
    <section class="w3l-mockup-form">
        <div class="container">
            <!-- /form -->
            <div class="workinghny-form-grid">
                <div class="main-mockup">
                    <div class="alert-close">
                        <span class="fa fa-close"></span>
                    </div>
                    <div class="w3l_form align-self">
                        <div class="left_grid_info">
                            <img src="images/image2.svg" alt="">
                        </div>
                    </div>
                    <div class="content-wthree">
                        <h2>Register Now</h2>
                        <p>Daftar akunmun disini </p>
                        <?php echo $msg; ?>
                        <form action="" method="post">
                            <input type="text" class="nama" name="nama" placeholder="Masukkan Namamu" value="<?php if (isset($_POST['submit'])) {
                                                                                                                    echo $nama;
                                                                                                                } ?>" required>
                            <input type="email" class="email" name="email" placeholder="Masukkan Alamat Emailmu" value="<?php if (isset($_POST['submit'])) {
                                                                                                                            echo $email;
                                                                                                                        } ?>" required>
                            <input type="password" class="sandi" name="sandi" placeholder="Masukkan Passwordmu" required>
                            <input type="password" class="konfirmasi_sandi" name="konfirmasi_sandi" placeholder="Masukkan kembali Passwordmu" required>
                            <button name="submit" class="btn" type="submit">Daftar</button>
                        </form>
                        <div class="social-icons">
                            <p>Sudah Punya Akun! <a href="./login.php">Masuk</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //form -->
        </div>
    </section>
    <!-- //form section start -->

    <script src="./admin/js/jquery.min.js"></script>
    <script>
        $(document).ready(function(c) {
            $('.alert-close').on('click', function(c) {
                $('.main-mockup').fadeOut('slow', function(c) {
                    $('.main-mockup').remove();
                });
            });
        });
    </script>

</body>

</html>