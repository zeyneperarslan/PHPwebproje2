<?php
session_start();
if (!isset($_SESSION['kullaniciadi'])) {
    header("Location: anasayfa.php");
    exit;
}

require('web.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM etkinlikler WHERE id = $id";

    if (mysqli_query($baglanti, $sql)) {
        header("Location: etkinlik.php");
    } else {
        echo 'Hata: ' . mysqli_error($baglanti);
    }
} else {
    header("Location: etkinlik.php");
}
?>
