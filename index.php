<?php require 'config/database.php'; ?>

<h2>Daftar Buku</h2>
<a href="create.php">Tambah Buku</a>
<br><br>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Judul</th>
        <th>Penulis</th>
        <th>Tahun Terbit</th>
        <th>Kategori</th>
        <th>Cover</th>
        <th>Aksi</th>
    </tr>

<?php
$stmt = $pdo->query("SELECT * FROM books");
while ($row = $stmt->fetch()) :
?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['judul'] ?></td>
        <td><?= $row['penulis'] ?></td>
        <td><?= $row['tahun_terbit'] ?></td>
        <td><?= $row['kategori'] ?></td>

        <td>
            <?php if (!empty($row['cover'])): ?>
                <img src="uploads/<?= $row['cover'] ?>" width="80">
            <?php endif; ?>
        </td>

        <td>
            <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
            <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus?')">Delete</a>
        </td>
    </tr>
<?php endwhile; ?>

</table>

