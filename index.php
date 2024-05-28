
<?php
// Oturumu başlat
session_start();
// Eğer kullanıcı adı adlı oturum değişkeni yok ise, giriş sayfasına yönlendir
if (!isset($_SESSION['kullaniciadi'])) {
    header("Location: giris.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>PAPATYA RESİM KULÜBÜ></title>
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
        a {
            display: inline-block;
            margin: 10px 0;
            padding: 10px 20px;
            background-color: #6A5ACD;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        a:hover {
            background-color: #20B2AA;
        }
        .logout {
            margin-top: 20px;
            display: inline-block;
            padding: 10px 20px;
            background-color: #dc3545;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .logout:hover {
            background-color: #c82333;
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
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <br/><h1>PAPATYA RESİM KULÜBÜ</h1>
        <p> <b> Merhaba, Sayın  <?php echo htmlspecialchars($_SESSION['kullaniciadi']); ?> ! </b> </p>
        <a href="uyeekle.php">Üye Ekle</a>
        <a href="uyelistesi.php">Üyeleri Listele</a><br/>
        <a href="etkinlikekle.php">Yeni Etkinlik Ekle</a>
        <a href="etkinlik.php">Etkinlikleri Listele</a><br/>
        <a href="malzemeekle.php">Malzeme Ekle</a>
        <a href="malzeme.php">Malzemeleri Listele</a><br/>
        <a href='cikis.php' class="logout">Çıkış Yap</a>
    </div>
    <<a href="https://github.com/zeyneperarslan/PHPwebproje2" class="github">GİTHUB SAYFASI</a>
</body>
</html>
