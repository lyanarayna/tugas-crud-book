<?php 
require 'config/database.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM books WHERE id = ?");
$stmt->execute([$id]);
$data = $stmt->fetch();
?>

<h2>Edit Buku</h2>
<a href="index.php">Kembali</a><br><br>

<form action="" method="POST" enctype="multipart/form-data">

    Judul: <br>
    <input type="text" name="judul" value="<?= $data['judul'] ?>"><br><br>

    Penulis: <br>
    <input type="text" name="penulis" value="<?= $data['penulis'] ?>"><br><br>

    Tahun Terbit: <br>
    <input type="number" name="tahun" value="<?= $data['tahun_terbit'] ?>"><br><br>

    Kategori: <br>
    <select name="kategori">
        <option value="novel"    <?= $data['kategori']=="novel"?"selected":"" ?>>Novel</option>
        <option value="komik"    <?= $data['kategori']=="komik"?"selected":"" ?>>Komik</option>
        <option value="pelajaran"<?= $data['kategori']=="pelajaran"?"selected":"" ?>>Pelajaran</option>
        <option value="lainnya"  <?= $data['kategori']=="lainnya"?"selected":"" ?>>Lainnya</option>
    </select><br><br>

    Cover (biarkan kosong jika tidak ganti): <br>
    <input type="file" name="cover"><br>
    <img src="uploads/<?= $data['cover'] ?>" width="80"><br><br>

    <button type="submit" name="update">Update</button>

</form>

<?php
if (isset($_POST['update'])) {

    $judul   = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tahun   = $_POST['tahun'];
    $kategori= $_POST['kategori'];

    // upload cover baru (jika ada)
    if (!empty($_FILES['cover']['name'])) {
        $fileName = $_FILES['cover']['name'];
        $tmpName  = $_FILES['cover']['tmp_name'];

        $newName = time() . "_" . $fileName;
        move_uploaded_file($tmpName, "uploads/" . $newName);

        $coverPath = $newName;
    } else {
        $coverPath = $data['cover'];
    }

    $sql = "UPDATE books
            SET judul=?, penulis=?, tahun_terbit=?, kategori=?, cover=?
            WHERE id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$judul, $penulis, $tahun, $kategori, $coverPath, $id]);

    header("Location: index.php");
}
?>


