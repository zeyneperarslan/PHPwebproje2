<?php
session_start();
if (!isset($_SESSION['kullaniciadi'])) {
    header("Location: index.php");
    exit;
}

require('web.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $malzemeadi = $_POST['malzemeadi'];
    $tur = $_POST['tur'];
    $sayi = $_POST['sayi'];

    $sql = "INSERT INTO malzemeler (malzemeadi, tur, sayi) VALUES ('$malzemeadi', '$tur', '$sayi')";
    
    if (mysqli_query($baglanti, $sql)) {
        $success_message = "Malzeme başarıyla eklendi!";
    } else {
        $error_message = "Hata: " . mysqli_error($baglanti);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Malzeme Ekle</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color:#E6E6FA;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color:#FFF0F5;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
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
        <form method="POST" action="malzemeekle.php">
            <div class="form1">
                <label for="malzemeadi">Malzeme Adı:</label>
                <input type="text" id="malzemeadi" name="malzemeadi" required>
            </div>
            <div class="form1">
                <label for="tur">Malzeme Türü:</label>
                <input type="text" id="tur" name="tur" required>
            </div>
            <div class="form1">
                <label for="sayi">Malzeme Sayısı:</label>
                <input type="text" id="sayi" name="sayi" required>
            </div>
            <button type="submit">Malzemeyi Ekle</button><br/>
            <a href="malzeme.php" class="secenek" >Malzemeleri Listele</a> <br/>
            <a href="index.php" class="secenek" >Anasayfaya Git</a> 
        
        </form>
    </div>
</body>
</html>
