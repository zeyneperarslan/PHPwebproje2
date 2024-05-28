<?php
session_start();
if (!isset($_SESSION['kullaniciadi'])) {
    header("Location: index.php");
    exit;
}

require('web.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM uyeler  WHERE id = $id";
    $result = mysqli_query($baglanti, $sql);
    $event = mysqli_fetch_assoc($result);
} else {
    header("Location: uyelistesi.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isim= $_POST['isim'];
    $soyisim= $_POST['soyisim'];
    $telefon = $_POST['telefon'];
    $email = $_POST['email'];
    $adres = $_POST['adres'];

    $sql = "UPDATE uyeler SET isim = '$isim',soyisim = '$soyisim', telefon = '$telefon',email = '$email',adres= '$adres' WHERE id = $id";
    
    if (mysqli_query($baglanti, $sql)) {
        header("Location: uyelistesi.php");
    } else {
        echo 'Hata: ' . mysqli_error($baglanti);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Üye Bilgileri Güncelle</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color:#E6E6FA; ;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color:  #FFF0F5;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 ,h2{
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
    </style>
</head>
<body>
    <div class="container">
        <h1>PAPATYA RESİM KURSU</h1>
        <h2>Üye Bilgileri</h2>
        <form method="POST" action="uyeduzenle.php?id=<?php echo $id; ?>">
            <div class="form1">
                <label for="isim">İsim:</label>
                <input type="text" id="isim" name="isim" value="<?php echo htmlspecialchars($event['isim']); ?>" required>
            </div>
            <div class="form1">
                <label for="soyisim">Soyisim:</label>
                <input type="text" id="soyisim" name="soyisim" value="<?php echo $event['soyisim']; ?>" required>
            </div>
            <div class="form1">
                <label for="telefon">Telefon Numarası:</label>
                <input type="text" id="telefon" name="telefon" value="<?php echo $event['telefon']; ?>" required>
            </div>
            <div class="form1">
                <label for="email">Email Adresi:</label>
                <input type="text" id="email" name="email" value="<?php echo $event['email']; ?>" required>
            </div>
            <div class="form1">
                <label for="adres">Adres:</label>
                <input type="text" id="adres" name="adres" value="<?php echo $event['adres']; ?>" required>
            </div>
            <button type="submit">Güncelle</button>
        </form>
    </div>
</body>
</html>
