<?php

require('web.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['kullaniciadi']) && isset($_POST['sifre']) && isset($_POST['isim']) && isset($_POST['soyisim']) && isset($_POST['telefon']) && isset($_POST['email']) && isset($_POST['adres'])) {
        $kullaniciadi = $_POST['kullaniciadi'];
        $sifre = hash('sha256', $_POST['sifre']);
        $isim = $_POST['isim'];
        $soyisim = $_POST['soyisim'];
        $telefon = $_POST['telefon'];
        $email = $_POST['email'];
        $adres = $_POST['adres'];

        $sql = "INSERT INTO uyeler (kullaniciadi,sifre,isim,soyisim,telefon,email,adres) VALUES ('$kullaniciadi','$sifre', '$isim','$soyisim','$telefon','$email','$adres')";

        if (mysqli_query($baglanti, $sql)) {
            $success_message = "Üyelik başarıyla oluşturuldu!";
        } else {
            $error_message = "Hata: " . mysqli_error($baglanti);
        }
    }
}
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Üyelik Oluştur</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #E6E6FA;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #FFF0F5;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 , h2{
            text-align: center;
            color: #000080;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        .form1 {
            margin-bottom: 15px;
        }
        label {
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], input[type="date"], textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
            color: 
        }
        textarea {
            resize: vertical;
        }
        button {
            padding: 10px 15px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        .uyari {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 3px;
        }
        .uyari1 {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .uyari2 {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .secenek {
            display: inline-block;
            padding: 5px 10px;
            font-size: 14px;
            text-decoration: none;
            color: #fff;
            background-color: #6A5ACD;
            border-radius: 3px;
        
        }
        .secenek:hover {
            background-color: #20B2AA;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>PAPATYA RESİM KULÜBÜ</h1>
        <?php
        if (isset($success_message)) {
            echo '<div class="uyari uyari1">' . $success_message . '</div>';
        }
        if (isset($error_message)) {
            echo '<div class="uyari uyari2">' . $error_message . '</div>';
        }
        ?>
        <form action="uyeekle.php" method="POST">
            
            <div class="form1">
                <label for="isim">İsim:</label>
                <input type="text" id="isim" name="isim" required>
            </div>
            <div class="form1">
                <label for="soyisim">Soyisim:</label>
                <input type="text" id="soyisim" name="soyisim" required>
            </div>
            <div class="form1">
                <label for="telefon">Telefon Numarası:</label>
                <input type="text" id="telefon" name="telefon" required>
            </div>
            <div class="form1">
                <label for="email">Mail Adresi:</label>
                <input type="text" id="email" name="email" required>
            </div>
            <div class="form1">
                <label for="adres">Adres:</label>
                <input type="text" id="adres" name="adres" required>
            </div>
            <div class="form1">
                <label for="kullaniciadi">Kullanıcı Adı:</label>
                <input type="text" id="kullaniciadi" name="kullaniciadi" required>
            </div>
            <div class="form1">
                <label for="sifre">Şifre:</label><br/>
                <input type="password" id="sifre" name="sifre" required>
            </div>
            
            <button type="submit">Üyelik Oluştur</button><br/>
            <a href="giris.php" class="secenek">Siteye Giriş Yap</a><br/>
         <a href="uyelistesi.php" class="secenek">Üyeleri Listele</a><br/>
            
        </form>
    </div>
</body>
</html>
