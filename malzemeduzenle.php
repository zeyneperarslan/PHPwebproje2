<?php
session_start();
if (!isset($_SESSION['kullaniciadi'])) {
    header("Location: index.php");
    exit;
}

require('web.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM malzemeler WHERE id = $id";
    $result = mysqli_query($baglanti, $sql);
    $event = mysqli_fetch_assoc($result);
} else {
    header("Location: malzeme.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $malzemeadi = $_POST['malzemeadi'];
    $tur = $_POST['tur'];
    $sayi = $_POST['sayi'];

    $sql = "UPDATE malzemeler SET malzemeadi = '$malzemeadi', tur = '$tur', sayi = '$sayi' WHERE id = $id";
    
    if (mysqli_query($baglanti, $sql)) {
        header("Location: malzeme.php");
        exit;
    } else {
        echo 'Hata: ' . mysqli_error($baglanti);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Malzemeyi Düzenle</title>
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
            background-color:#FFF0F5;
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
        <h1>PAPATYA RESİM KULÜBÜ</h1>
        <h2>Malzeme Bilgileri</h2>
        <form method="POST" action="malzemeduzenle.php?id=<?php echo $id; ?>">
            <div class="form-group">
                <label for="malzemeadi">Malzeme Adı:</label>
                <input type="text" id="malzemeadi" name="malzemeadi" value="<?php echo htmlspecialchars($event['malzemeadi']); ?>" required>
            </div>
            <div class="form1">
                <label for="tur">Malzeme Türü:</label>
                <input type="text" id="tur" name="tur" value="<?php echo $event['tur']; ?>" required>
            </div>
            <div class="form1">
                <label for="sayi">Malzeme Sayısı:</label>
                <input type="text" id="sayi" name="sayi" value="<?php echo $event['sayi']; ?>" required>
            </div>
            <button type="submit">Kaydet</button>
        </form>
    </div>
</body>
</html>
