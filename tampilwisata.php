<?php
function curl($url){
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

// alamat localhost untuk file getwisata.php, ambil hasil export json
$send = curl("http://localhost/rekayasaweb_g211220087/praktikum2/getwisata.php");

//mengubah JSON menjadi array
$data = json_decode($send, TRUE); 

// cek apakah data tersdia
if ($data && is_array($data)) {
    //membuat table Html
    echo "<table border='1cellpading='10'";
    echo "<tr>
    <th>ID WISATA</th>
    <th>KOTA</th>
    <th>LANDMARK</th>
    <th>TARIF</th>
   </tr>";
   //Looping untuk menampilkan setiap baris wisata
   foreach($data as $row){
    echo "<tr>";
    echo "<td>{$row['id_wisata']}</td>";
    echo "<td>{$row['kota']}</td>";
    echo "<td>{$row['landmark']}</td>";
    echo "<td>{$row['tarif']}</td>";
    echo "</tr>";
   }

   echo "</table>";
} else {
    echo "Tidak ada data yang dapat ditampilkan.";
}
?>