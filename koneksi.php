<?php
$server = "localhost";
$unser = "root";
$password = "";
$nama_db = "wina_xipplg4";

$koneksi = mysqli_connect("localhost","root","","wina_xipplg4");

if( !$koneksi){
    die("Gagal terhubung dengan database:" .mysqli_connect_error());
}

?>