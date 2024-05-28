<?php
session_start();
if (!isset($_SESSION['kullaniciadi'])) {
    header("Location: anasayfa.php");
    exit;
}

require('web.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM uyeler WHERE id = $id";

    if (mysqli_query($baglanti, $sql)) {
        header("Location: uyelistesi.php");
    } else {
        echo 'Hata: ' . mysqli_error($baglanti);
    }
} else {
    header("Location: uyelistesi.php");
}
?>