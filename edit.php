<?php
include 'koneksi.php';

$id = isset($_GET['id_data']) ? $_GET['id_data'] : null;
if (!$id) {
    header("Location: index.php");
    exit();
}

$data = $koneksi->query("SELECT * FROM data_diri WHERE id_data=$id")->fetch_assoc();
if (!$data) {
    echo "Data tidak ditemukan";
    exit();
}

if (isset($_POST['simpan'])) {
    $nama   = $koneksi->real_escape_string($_POST['nama']);
    $alamat = $koneksi->real_escape_string($_POST['alamat']);
    $jk     = $koneksi->real_escape_string($_POST['jk']);
    $nope   = $koneksi->real_escape_string($_POST['nope']);

    $query = "UPDATE data_diri SET 
                nama='$nama', 
                alamat='$alamat', 
                jk='$jk', 
                nope='$nope' 
              WHERE id_data=$id";

    if ($koneksi->query($query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal update data: " . $koneksi->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Diri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5" style="max-width:500px;">
    <h4 class="mb-4">Edit Data Diri</h4>
    <form method="POST">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" id="nama" name="nama" class="form-control" value="<?= htmlspecialchars($data['nama']) ?>">
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" id="alamat" name="alamat" class="form-control" value="<?= htmlspecialchars($data['alamat']) ?>">
        </div>

        <div class="mb-3">
            <label for="jk" class="form-label">Jenis Kelamin</label>
            <input type="text" id="jk" name="jk" class="form-control" value="<?= htmlspecialchars($data['jk']) ?>">
        </div>

        <div class="mb-3">
            <label for="nope" class="form-label">No Handphone</label>
            <input type="text" id="nope" name="nope" class="form-control" value="<?= htmlspecialchars($data['nope']) ?>">
        </div>

        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>