<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start(); 
require('web.php');
if (isset($_POST['kullaniciadi']) and isset($_POST['sifre'])){
extract($_POST);
// sifre metni SHA256 ile şifreleniyor.
$sifre = hash('sha256', $sifre);
$sql = "SELECT * FROM `uyeler` WHERE ";
$sql= $sql . "kullaniciadi='$kullaniciadi' and sifre='$sifre'";
$cevap = mysqli_query($baglanti, $sql);
//eger cevap FALSE ise hata yazdiriyoruz.
if(!$cevap ){
echo '<br>Hata:' . mysqli_error($baglanti);
}
//veritabanindan dönen satır sayısını bul
$say = mysqli_num_rows($cevap); 
if ($say == 1){
    $_SESSION['kullaniciadi'] = $kullaniciadi; }
    else{
    $mesaj = "<h1> Hatalı Kullanıcı adı veya Şifre!</h1>"; }
    }
    if (isset($_SESSION['kullaniciadi'])){ header("Location:index.php");
    }else{
    //oturum yok ise login formu görüntüle
    ?>
    <html>
        <head>
        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #E6E6FA;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1000px;
            margin:  10px auto;
            padding: auto;
            background-color: #FFF0F5;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            color: #F08080;
        }
        h2 {
            color: #000080;
        }

        form {
            margin-top: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            
        }
        input[type="text"], input[type="password"] {
           
            padding: 10px;
            border: 3px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            padding: 10px 15px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .error-message {
            color: #ff0000;
            margin-top: 10px;
        }
        .link {
            display: block;
            margin-top: 20px;
            text-align: center;
        }
        .link a {
            color: #800000;
            text-decoration: none;
        }
        .github {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #6A5ACD;
            color: #fff;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
        }
        .github:hover {
            background-color:
    </style>
    </head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <body>
    <div class="container">
       <br/> <h1>PAPATYA RESİM KULÜBÜ</h1>
       <h2>ÜYE GİRİŞİ</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="form-group">
                <label for="kullaniciadi">Kullanıcı Adı</label>
                <input type="text" id="kullaniciadi" name="kullaniciadi" placeholder="Kullanıcı Adı" required>
            </div>
            <div class="form-group">
                <label for="sifre">Şifre</label>
                <input type="password" id="sifre" name="sifre" placeholder="Şifre" required>
            </div>
            <input type="submit" value="GİRİŞ">
        </form>
        <?php
        if(isset($mesaj)) {
            echo '<div class="error-message">' . $mesaj . '</div>';
        }
        ?>
        <div class="link">
            <a href="uyeekle.php">Üyeliğin hala yok mu?</a>
        </div><br/>
    </div>
    <a href="https://github.com/zeyneperarslan" class="github">GİTHUB SAYFASI</a>
    </body>
    </html>
    <?php }
    ?>
