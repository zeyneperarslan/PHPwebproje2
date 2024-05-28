<?php
session_start();
if (isset($_POST['kullaniciadi']) && isset($_POST['sifre']) && isset($_POST['isim']) && isset($_POST['soyisim']) && isset($_POST['telefon']) && isset($_POST['email']) && isset($_POST['adres'])) {
    header("Location: anasayfa.php");
    exit;
}

require('web.php');

$sql = "SELECT * FROM uyeler ";
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
    <title>Üye Listesi</title>
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
            background-color: #FFF0F5;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 , h2 {
            text-align: center;
            color: #000080;
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
            background-color:#FFB6C1;
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
            background-color: #6A5ACD;
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
        <h2>ÜYELER</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>İsim</th>
                <th>Soyisim</th>
                <th>Telefon Numarası</th>
                <th>Email</th>
                <th>Adres</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($cevap)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo htmlspecialchars($row['isim']); ?></td>
                    <td><?php echo htmlspecialchars($row['soyisim']); ?></td>
                    <td><?php echo htmlspecialchars($row['telefon']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['adres']); ?></td>
                    <td>
                        <a href="uyeduzenle.php?id=<?php echo $row['id']; ?>" class="buton">Bilgileri Güncelle</a>
                        <a href="uyesil.php?id=<?php echo $row['id']; ?>" class="buton butonuyari" onclick="return confirm('Üyeyi silmek istediğinden emin misin?');">Sil</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <br>
        <a href="uyeekle.php"  class="buton">Yeni Üye Ekle</a><br/><br/>
        <a href="anasayfa.php" class="buton">Anasayfaya Dön</a><br/>
    </div>
</body>
</html>
