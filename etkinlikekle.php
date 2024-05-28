<?php
session_start();
if (!isset($_SESSION['kullaniciadi'])) {
    header("Location: anasayfa.php");
    exit;
}

require('web.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $etkinlik_adı = $_POST['etkinlik_adı'];
    $tarih = $_POST['tarih'];
    $yer = $_POST['yer'];
    $konu = $_POST['konu'];

    $sql = "INSERT INTO etkinlikler (etkinlik_adı, tarih, yer,konu) VALUES ('$etkinlik_adı', '$tarih', '$yer' , '$konu')";
    
    if (mysqli_query($baglanti, $sql)) {
        $success_message = "Etkinlik başarıyla eklendi!";
    } else {
        $error_message = "Hata: " . mysqli_error($baglanti);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Etkinlik Ekle</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color:  #E6E6FA;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #FFF0F5;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 , h2 {
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
        .uyarı {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 3px;
        }
        .uyarı1 {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .uyarı2 {
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
        <h2>Etkinlik Detayları</h2>
        <?php
        if (isset($success_message)) {
            echo '<div class="uyarı uyarı1">' . $success_message . '</div>';
        }
        if (isset($error_message)) {
            echo '<div class="uyarı uyarı2">' . $error_message . '</div>';
        }
        ?>
        <form method="POST" action="etkinlikekle.php">
            <div class="form1">
                <label for="etkinlik_adı">Etkinlik Adı:</label>
                <input type="text" id="etkinlik_adı" name="etkinlik_adı" required>
            </div>
            <div class="form1">
                <label for="tarih">Etkinlik Tarihi:</label>
                <input type="date" id="tarih" name="tarih" required>
            </div>
            <div class="form1">
                <label for="yer">Etkinlik Yeri:</label>
                <input type="text" id="yer" name="yer" required>
            </div>
            <div class="form1">
                <label for="konu">Etkinlik İçeriği:</label>
                <input type="text" id="konu" name="konu" required>
            </div>
            
            <button type="submit">Etkinlik Ekle</button><br/>
            <a href="etkinlik.php"class="secenek" >Etkinlikleri Listele</a><br/>
            <a href="anasayfa.php"class="secenek" >Anasayfaya Dön</a><br/>
            <br/>
        </form>
    </div>
</body>
</html>
