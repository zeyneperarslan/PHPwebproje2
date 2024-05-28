<?php
session_start();
if (!isset($_SESSION['kullaniciadi'])) {
    header("Location: anasayfa.php");
    exit;
}

require('web.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM etkinlikler WHERE id = $id";
    $result = mysqli_query($baglanti, $sql);
    $event = mysqli_fetch_assoc($result);
} else {
    header("Location: etkinlik.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $etkinlik_adı = $_POST['etkinlik_adı'];
    $tarih = $_POST['tarih'];
    $yer = $_POST['yer'];
    $konu= $_POST['konu'];

    $sql = "UPDATE etkinlikler SET etkinlik_adı = '$etkinlik_adı',tarih = '$tarih', yer = '$yer', konu = '$konu' WHERE id = $id";
    
    if (mysqli_query($baglanti, $sql)) {
        header("Location: etkinlik.php");
    } else {
        echo 'Hata: ' . mysqli_error($baglanti);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Etkinlik Düzenle</title>
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
            background-color:  #FFF0F5;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1  {
            text-align: center;
            color: #000080;
        }
        h2 {
            text-align: center;
            color: #000080;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        .form1{
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
        <h2>Etkinlik Detayları</h2>
        <form method="POST" action="etkinlikduzenle.php?id=<?php echo $id; ?>">
            <div class="form-group">
                <label for="etkinlik_adı">Etkinlik Adı:</label>
                <input type="text" id="etkinlik_adı" name="etkinlik_adı" value="<?php echo htmlspecialchars($event['etkinlik_adı']); ?>" required>
            </div>
            <div class="form1">
                <label for="tarih">Etkinlik Tarihi:</label>
                <input type="date" id="tarih" name="tarih" value="<?php echo $event['tarih']; ?>" required>
            </div>
            <div class="form1">
                <label for="yer">Etkinlik Yeri:</label>
                <input type="text" id="yer" name="yer" value="<?php echo $event['yer']; ?>" required>
            </div>
            <div class="form1">
                <label for="konu">Etkinlik Konusu:</label>
                <input type="text" id="konu" name="konu" value="<?php echo $event['konu']; ?>" required>
            </div>
            <button type="submit">Kaydet</button>
        </form>
    </div>
</body>
</html>
