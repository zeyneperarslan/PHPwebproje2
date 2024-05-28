<?php
session_start();
if (!isset($_SESSION['kullaniciadi'])) {
    header("Location: index.php");
    exit;
}

require('web.php');

$sql = "SELECT * FROM malzemeler ";
$cevap = mysqli_query($baglanti, $sql);

if (!$cevap) {
    echo '<br>Hata: ' . mysqli_error($baglanti);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Malzeme Listesi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #E6E6FA;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color:#FFF0F5;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 ,h2 {
            text-align: center;
            color:  #000080;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #FFB6C1;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .buton {
            display: inline-block;
            padding: 5px 10px;
            font-size: 14px;
            text-decoration: none;
            color: #fff;
            background-color:#6A5ACD;
            border-radius: 3px;
            text-align: center;
        }
        .buton:hover {
            background-color: #20B2AA;
        }
        .butonuyari {
            background-color: #dc3545;
        }
        .butonuyari:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
    <h1>PAPATYA RESİM KULÜBÜ</h1>
        <h2>Malzeme Listesi</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Malzeme Adı</th>
                <th>Malzeme Türü</th>
                <th>Malzeme Sayısı</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($cevap)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo htmlspecialchars($row['malzemeadi']); ?></td>
                    <td><?php echo htmlspecialchars($row['tur']); ?></td>
                    <td><?php echo htmlspecialchars($row['sayi']); ?></td>
                    <td>
                        <a href="malzemeduzenle.php?id=<?php echo $row['id']; ?>" class="buton">Düzenle</a>
                        <a href="malzemesil.php?id=<?php echo $row['id']; ?>" class="buton butonuyari" onclick="return confirm('Bu malzemeyi silmek istediğinize emin misiniz?');">Sil</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <br>
        <a href="malzemeekle.php" class="buton">Yeni Malzeme Ekle</a>
        <a href="index.php" class="buton">Anasayfaya Dön</a><br/>
    </div>
</body>
</html>
