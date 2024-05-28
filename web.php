<?php
               $server = 'sql111.infinityfree.com';
               $user = 'if0_36633270';
               $password = '3TuHdMWIcw2LIcO';
               $database = 'if0_36633270_resimkulup';
               $baglanti = mysqli_connect($server,$user,$password,$database);
if (!$baglanti) {
echo "MySQL sunucu ile baglanti kurulamadi! </br>"; echo "HATA: " . mysqli_connect_error();
exit;
}
?>
