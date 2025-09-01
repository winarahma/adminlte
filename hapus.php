 <?php
 include 'koneksi.php';
 if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $koneksi->query("DELETE FROM data_diri WHERE id_data =$id");

    header("location: index.php");
    exit();
 } else {
    header("location: index.php");
    exit();
 }
 ?>
