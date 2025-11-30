<?php require 'config/database.php'; ?>

<h2>Tambah Buku</h2>
<a href="index.php">Kembali</a><br><br>

<form action="" method="POST" enctype="multipart/form-data">

    Judul: <br>
    <input type="text" name="judul"><br><br>

    Penulis: <br>
    <input type="text" name="penulis"><br><br>

    Tahun Terbit: <br>
    <input type="number" name="tahun" min="1900" max="2099"><br><br>

    Kategori: <br>
    <select name="kategori">
        <option value="novel">Novel</option>
        <option value="komik">Komik</option>
        <option value="pelajaran">Pelajaran</option>
        <option value="lainnya">Lainnya</option>
    </select><br><br>

    Cover Buku: <br>
    <input type="file" name="cover"><br><br>

    <button type="submit" name="submit">Simpan</button>

</form>

<?php
if (isset($_POST['submit'])) {

    $judul   = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tahun   = $_POST['tahun'];
    $kategori = $_POST['kategori'];

    // handle cover
    $fileName = $_FILES['cover']['name'];
    $tmpName  = $_FILES['cover']['tmp_name'];

    $newName = time() . "_" . $fileName;
    move_uploaded_file($tmpName, "uploads/" . $newName);

    $sql = "INSERT INTO books (judul, penulis, tahun_terbit, kategori, cover)
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$judul, $penulis, $tahun, $kategori, $newName]);

    header("Location: index.php");
}
?>


